<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\housefellowhips;
use App\Models\ministries;
use App\Models\attendance;
use App\Models\tasks;
use App\Models\followups;
use App\Models\programmes;
use App\Models\settings;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $attendance = attendance::where('activity','Sunday Service')->offset(0)->take(10)->get();

        $midweek = attendance::select('men')->offset(0)->take(10)->get();

        $uprogrammes = programmes::where('category','Upcoming')->select('id','title','from','to','ministry')->paginate(5);
        

        $dates = "'".$attendance[0]->date."','".$attendance[1]->date."','".$attendance[2]->date."','".$attendance[3]->date."','".$attendance[4]->date."','".$attendance[5]->date."','".$attendance[6]->date."','".$attendance[7]->date."','".$attendance[8]->date."','".$attendance[9]->date."'";
        
        $totals = $attendance[0]->total.",".$attendance[1]->total.",".$attendance[2]->total.",".$attendance[3]->total.",".$attendance[4]->total.",".$attendance[5]->total.",".$attendance[6]->total.",".$attendance[7]->total.",".$attendance[8]->total.",".$attendance[9]->total;

        $midweek = $midweek[0]->men.",".$midweek[1]->men.",".$midweek[2]->men.",".$midweek[3]->men.",".$midweek[4]->men.",".$midweek[5]->men.",".$midweek[6]->men.",".$midweek[7]->men.",".$midweek[8]->men.",".$midweek[9]->men;
        // sleep(5);
        return view('home', compact('dates','midweek','totals','uprogrammes'));
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


    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
  
    public function members()
    {
      $members = User::orderBy('');
      $users = User::select('name','id')->get();
      return view('members', compact('members','users'));
    }

    public function membersSearch(request $request)
    {
      $members = User::where('name', $request->keyword)->orWhere('name', 'like', '%' . $request->keyword . '%')->get();
      $users = User::select('name','id')->get();
      return view('members', compact('members','users'));
    }

    public function member($id)
    {
      $member = User::where('id',$id)->first();
      $users = User::select('id','name','phone_number')->get();
      $tasks = tasks::where('assigned_to',$id)->get();
      $followups = followups::where('member',$id)->get();

      return view('member', compact('member','users','tasks','followups'));
    }

    public function addNew()
    {
      $users = User::select('name','id')->get();
      $house_fellowships = housefellowhips::select('name','id')->get();
      $ministries = ministries::select('name','id')->get();
      return view('add-new', compact('users','ministries','house_fellowships'));

    }

    protected function create(request $request)
    {

        if($request->email==""){

            $email = "crmadmin@crmfct.org";
            $password = Hash::make("prayer22");
        }else{
            $email = $request->email;
            $password = Hash::make($request->password);
            
        }

        User::updateOrCreate(['id'=>$request->id],[
            'name' => $request->name,
            'email' => $email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'age_group'=>$request->age_group,
            'phone_number'=>$request->phone_number,
            'password' => $password,
            'about' => $request->about,
            'address' => $request->address,
            'location' => $request->location,
            'house_fellowship' => $request->house_fellowship,
            'invited_by' => $request->invited_by,
            'assigned_to' => $request->assigned_to,
            'ministry' => $request->ministry,
            'role'=>$request->role,
            'status'=>$request->status
            
        ]);
        $members = User::all();
        $users = User::select('name','id')->get();
        return view('members', compact('members','users'));

    }

    public function editMember($id)
    {
      $user = User::where('id',$id)->first();
      $users = User::select('id','name')->get();
      $house_fellowships = housefellowhips::select('name','id')->get();
      $ministries = ministries::select('name','id')->get();
      return view('edit-member', compact('user','users','ministries','house_fellowships'));

    }

    public function deleteMember($id)
    {
      $user = User::where('id',$id)->delete();      
      $message = 'The member has been deleted!';
      return redirect()->route('members')->with(['message'=>$message]);

    }

    public function communications()
    {
      ini_set('allow_url_fopen',1);

      $response = null;
      // system("ping -c 1 google.com", $response);
      if(!checkdnsrr('google.com'))
      {
          return redirect()->back()->with(['message'=>'Please connect your internect before going to communications page <a href="/communications">Retry</a>']);
      }else{

      

        $session = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=gcictng@gmail.com&subacct=CRMAPP&subacctpwd=@@prayer22");
        $sessionid = ltrim(substr($session,3),' ');

        \Cookie::queue('sessionidd', $sessionid, 30);

        $cbal = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=querybalance&sessionid=".$sessionid);

        $creditbalance = ltrim(substr($cbal,3),' ');

        $members = User::select('name','status','ministry','phone_number')->get();
        $allnumbers = "";
        $lastrecord = end($members);
        $lastkey = key($lastrecord);

        foreach($members as $key => $mnumber){
          $number = $mnumber->phone_number;
          if($number=="")
            continue;

          if(substr($number,0,1)=="0")
            $number="234".ltrim($number,'0');

          $allnumbers.=$number.",";
          /*
          if($key !== $lastkey){
            $allnumbers.=$number.",";
          }else{
            $allnumbers.=$number;
          }
          */

        }
        $allnumbers = substr($allnumbers,0,-1);
        return view('communications', compact('members','allnumbers','creditbalance'));
      }
    }

    public function sendSMS(request $request){
      ini_set('allow_url_fopen',1);

      // 2 Jan 2008 6:30 PM   sendtime - date format for scheduling 
      if(\Cookie::get('sessionidd')){
        $sessionid = \Cookie::get('sessionidd');
      }else{
        $session = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=gcictng@gmail.com&subacct=CRMAPP&subacctpwd=@@prayer22");
        $sessionid = ltrim(substr($session,3),' ');
      }

      $sessionid = \Cookie::get('sessionidd');
      $recipients = $request->recipients;
      $body = $request->body;
      

      $message = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=".$sessionid."&message=".urlencode($body)."&sender=CHURCH&sendto=".$recipients."&msgtype=0");
      

      // v20ylRY3Gp6jYEAvpaDtOQQTqwoCqc1n4CUG3IBboIMTciDeVk	  -  Token for smartsms solutions

      $members = User::select('name','status','ministry','phone_number')->get();
      $allnumbers = "";
      $lastrecord = end($members);
      $lastkey = key($lastrecord);

      foreach($members as $key => $mnumber){
        $number = $mnumber->phone_number;
        if($number=="")
          continue;

        if(substr($number,0,1)=="0")
          $number="234".ltrim($number,'0');

        $allnumbers.=$number.",";
        /*
        if($key !== $lastkey){
          $allnumbers.=$number.",";
        }else{
          $allnumbers.=$number;
        }
        */

      }
      // GET CREDIT BALANCE
      $cbal = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=querybalance&sessionid=".$sessionid);

      $creditbalance = ltrim(substr($cbal,3),' ');

      $allnumbers = substr($allnumbers,0,-1);
      return view('communications', compact('members','allnumbers','message','creditbalance'));

      
    }

    public function sentSMS(request $request){
      ini_set('allow_url_fopen',1);
      if(\Cookie::get('sessionidd')){
        $sessionid = \Cookie::get('sessionidd');
      }else{
        $session = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=gcictng@gmail.com&subacct=CRMAPP&subacctpwd=@@prayer22");
        $sessionid = ltrim(substr($session,3),' ');
      }

      $sentmessages = $this->getUrl("http://www.smslive247.com/http/index.aspx?cmd=getsentmsgs&sessionid=".$sessionid."&pagesize=200&pagenumber=1&begindate=".urlencode('06 Sep 2021')."&enddate=".urlencode('08 Sep 2021')."&sender=CHURCH");
      error_log("All SENT: ".$sentmessages);
      return view('sentmessages', compact('sentmessages'));
    }

    public function settings(request $request){
      $validateData = $request->validate([
          'logo'=>'image|mimes:jpg,png,jpeg,gif,svg',
          'background'=>'image|mimes:jpg,png,jpeg,gif,svg'
      ]);
      
      if(!empty($request->file('logo'))){
       
          $logo = time().'.'.$request->logo->extension();
        
          $request->logo->move(\public_path('images'),$logo);
      }else{
          $logo = $request->oldlogo;
      }

      if(!empty($request->file('background'))){
          
          $background = time().'.'.$request->background->extension();
          
          $request->background->move(\public_path('images'),$background);
      }else{
          $background = $request->oldbackground;
      }
      

      settings::updateOrCreate(['id'=>$request->id],[
          'ministry_name' => $request->ministry_name,
          'motto' => $request->motto,
          'logo' => $logo,
          'address' => $request->address,
          'background' => $background,
          'mode'=>$request->mode
          
      ]);
      $message = "The settings has been updated!";
      return redirect()->back()->with(['message'=>$message]);
    }

    public function help()
    {
      
      return view('help');

    }

    public function security()
    {
      
      return view('security');

    }



}
