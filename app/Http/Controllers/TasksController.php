<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;
use App\Models\followups;
use App\Models\User;
use App\Models\facilities;
use App\Models\aggreport;
use App\Models\ndrmatch;
use App\Models\aggreportissues;
use App\Models\aggreportactivities;
use App\Models\indicators;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=="Admin"){
            $tasks = tasks::orderBy('status', 'DESC')->paginate(50);
        }else{
            $tasks = tasks::where('assigned_to',Auth::user()->id)->orderBy('status', 'DESC')->paginate(50);
        }

        $users = User::select('id','name')->get();

        return view('tasks', compact('tasks','users'));
    }

    public function getUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        tasks::updateOrCreate(['id'=>$request->id],[
            'title' => $request->title,
            'date' => $request->date,
            'category' => $request->category,
            'activities' => $request->activities,
            'status' => $request->status,
            'assigned_to'=>$request->assigned_to,
            'member'=>$request->assigned_to
        ]);

        $tasks = tasks::paginate(50);
        if($request->phone_number!=""){

            $recipients = $request->phone_number;
            if(substr($recipients,0,1)=="0"){
                $recipients="234".ltrim($recipients,'0');
            }
            // SEND SMS
            // 2 Jan 2008 6:30 PM   sendtime - date format for scheduling
            if(\Cookie::get('sessionidd')){
                $sessionid = \Cookie::get('sessionidd');
            }else{
                $session = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=gcictng@gmail.com&subacct=CRMAPP&subacctpwd=@@prayer22");
                $sessionid = ltrim(substr($session,3),' ');
            }

            $body = $request->title;


            $message = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=".$sessionid."&message=".urlencode($body)."&sender=CHURCH&sendto=".$recipients."&msgtype=0");
        }
        return redirect()->back()->with(['tasks'=>$tasks]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tasks::findOrFail($id)->delete();
        $message = 'The task has been deleted!';
        return redirect()->route('tasks')->with(['message'=>$message]);
    }

    public function deletefollowup($id,$member)
    {
        followups::findOrFail($id)->delete();
        $message = 'The followup activity has been deleted!';
        return redirect()->route('member',['id'=>$member])->with(['message'=>$message]);
    }

    public function completetask($id)
    {
        $task = tasks::where('id',$id)->first();
        $task->status = 'Completed';
        $task->save();

        $message = 'The task has been updated!';
        return redirect()->route('tasks')->with(['message'=>$message]);
    }

    public function inprogresstask($id)
    {
        $task = tasks::where('id',$id)->first();
        $task->status = 'In Progress';
        $task->save();

        $message = 'The task has been updated!';
        return redirect()->route('tasks')->with(['message'=>$message]);
    }

    public function newfollowup(Request $request)
    {
        followups::updateOrCreate(['id'=>$request->id],[
            'title' => $request->title,
            'member' => $request->member,
            'date' => $request->date,
            'type' => $request->type,
            'discussion' => $request->discussion,
            'nextaction' => $request->nextaction,
            'nextactiondate' => $request->nextactiondate,
            'status' => $request->status,
            'assigned_to'=>$request->assigned_to
        ]);

        tasks::updateOrCreate(['id'=>$request->id],[
            'title' => $request->title,
            'date' => $request->nextactiondate,
            'category' => $request->type,
            'activities' => $request->nextaction,
            'status' => $request->status,
            'assigned_to'=>$request->assigned_to,
            'member'=>$request->member
        ]);


        $tasks = tasks::paginate(50);
        $followups = followups::paginate(50);


        return redirect()->back()->with(['tasks'=>$tasks,'followups'=>$followups]);

    }

    // API LINKS

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user by their email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password is correct
        if ($user && password_verify($request->password, $user->password)) {
            // Generate a new token
            $token = $user->createToken('mobile')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }


    protected function registerUser(request $request)
    {

        if($request->email==""){

            $email = "admin@nigeriaqualtb.com";
            $password = Hash::make("prayer22");
        }else{
            $email = $request->email;
            $password = Hash::make($request->password);

        }

        User::create([
            'name' => $request->name,
            'email' => $email,
            'phone_number'=>$request->phone_number,
            'password' => $password,

            'state' => $request->state,
            'facility' => $request->facility,

            'role'=>$request->role,
            'status'=>$request->status

        ]);
        return response()->json(['message' => "Your registration was successful, proceed to login"]);
    }

    public function getCsrfToken()
    {
        $token = csrf_token();

        return Response::json(['csrfToken' => $token]);
    }

    public function newAPIAggReport(Request $request)
    {
        Log::warning("User ID: ".$request->user()->id);
        // Extract 'from', 'to', 'entered_by', 'status', 'state' from request data
        $thisReportData = $request->except(['facility','from', 'to', 'entered_by', 'status','data','isSynced']);
        // Format 'from' and 'to' dates
        $thisReportData['from'] = date('Y-m-d', strtotime($request->from));
        $thisReportData['to'] = date('Y-m-d', strtotime($request->to));
        // Set additional properties
        $thisReportData['entered_by'] = $request->user()->id;
        $thisReportData['status'] = 'Open';
        // $state = facilities::select('state')->where('id',$request->facility)->first()->state;
        $facility = facilities::select('id')->where('facility_name', $request->facility)->first();

        // Loop through 'data' to dynamically assign values to columns
        $data = $request->data;
        foreach ($data as $key => $value) {
            // Ensure the key corresponds to a valid column in the AggReport table
            Log::warning('Working on Column: '.$key);

            if (Schema::hasColumn('aggreports', $key)) {

                $thisReportData[$key] = $value;
            }
        }
        if ($facility) {
            $thisReportData['facility'] = $facility->id;
        } else {
            $thisReportData['facility'] = 2;
            // Handle the case when no facility is found
            // return response()->json([
            //     'message' => 'Facility not found.',
            // ], 404);
        }

        // Log::info('Facility Query Result', ['facility' => $facility]);



        // Update or create the record
        $thisReport = AggReport::updateOrCreate(['appid' => $request->appid], $thisReportData);

        // Save the changes
        $thisReport->save();

        // Return response with message and ID
        return response()->json([
            'message' => 'Aggregate Report Saved Successfully!',
            'id' => $thisReport->id
        ]);
    }

    public function getStates()
    {
        // Retrieve distinct states from the facilities table
        $states = facilities::select('state')->distinct()->get();

        // Format data as label and value pairs
        $formattedStates = $states->map(function ($state) {
            return [
                'label' => $state->state, // Assuming your state model has a 'name' attribute
                'value' => $state->state,   // Assuming 'id' is the unique identifier for states
            ];
        });

        return response()->json($formattedStates);
    }

    public function getFacilities()
    {
        // Retrieve distinct states from the facilities table
        $facilities = facilities::select('id', 'facility_name','state')
        ->groupBy('id','facility_name','state')
        ->get();

        // Format data as label and value pairs
        $formattedFacilities = $facilities->map(function ($facility) {
            return [
                'label' => $facility->facility_name, // Assuming your state model has a 'name' attribute
                'value' => $facility->id,
                'state' => $facility->state
            ];
        });

        return response()->json($formattedFacilities);
    }

    public function adminComments()
    {
        // Retrieve distinct states from the facilities table
        $comments = aggreportissues::select('comments', 'appid','aggreport_id')
        ->where('appid','!=','')
        ->get();

        // Format data as label and value pairs
        $formattedComments = $comments->map(function ($com) {
            return [
                'comments' => $com->comments, // Assuming your state model has a 'name' attribute
                'appid' => $com->appid,
                'reportId' => $com->aggreport_id
            ];
        });

        return response()->json($formattedComments);
    }


    // Helping NMRS Ministry
    public function ndrMatchStatus($pepfarid, $fdatimcode){
        // Retrieve distinct states from the facilities table
        if($pepfarid=="na"){
            $ndrmatch = ndrmatch::select('facility_datim_code', 'pepfar_id','match_outcome','recapture_date','otherinfo','baseline_replaced')->where('facility_datim_code',$fdatimcode)->get();
        }else{
            $ndrmatch = ndrmatch::select('facility_datim_code', 'pepfar_id','match_outcome','recapture_date','otherinfo','baseline_replaced')->where('pepfar_id',$pepfarid)->where('facility_datim_code',$fdatimcode)->get();

        }

        // Format data as label and value pairs
        $formattedNDRRecord = $ndrmatch->map(function ($ndrmatch) {
            return [
                'facility_datim_code' => $ndrmatch->facility_datim_code, // Assuming your state model has a 'name' attribute
                'pepfar_id' => $ndrmatch->pepfar_id,
                'match_outcome' => $ndrmatch->match_outcome,
                'recapture_date' => $ndrmatch->recapture_date,
                'baseline_replaced' =>$ndrmatch->baseline_replaced,
                'otherinfo' => $ndrmatch->otherinfo,
            ];
        });

        return response()->json($formattedNDRRecord);
    }



    public function newAPIAggReportIssue(request $request)
    {

        Log::warning('This is appid: '.$request->appid);
        $aggreportId = aggreport::select('id')->where('appid',$request->appid)->first()->id;

        $thisReportId = aggreportissues::updateOrCreate(['aggreport_id'=>$aggreportId,'indicator_no'=>$request->indicatorNo],[
        'aggreport_id'=>$aggreportId,
        'indicator_no'=>$request->indicatorNo,
        'issues'=>$request->issues,
        'entered_by'=>$request->user()->id,
        'appid'=>$request->appid
        // 'created_at'=>strtotime($request->date)
        ])->id;

         // Return response with message and ID
         return response()->json([
            'message' => 'Aggregate Report Issue Saved Successfully!',
            'id' => $thisReportId
        ]);

    }

    public function addAppQI(request $request)
    {
        aggreportactivities::updateOrCreate(['issue_id'=>$request->issueId],
        [
            'issue_id'=>$request->issueId,
            'activities'=>$request->activities,
            'dated'=>$request->dateDone,
            'entered_by'=>$request->user()->id,
         ]);

         return response()->json([
            'message' => 'Quality Improvent Activity Synced to the Server Successfully!'
        ]);

    }

    public function getIndicators()
    {
        $indicators = indicators::select('indicator','ncode','ntext','dcode','dtext')->get();
        return response()->json($indicators);
    }

}
