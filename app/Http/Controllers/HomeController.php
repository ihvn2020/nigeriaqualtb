<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use App\Models\tasks;
use App\Models\settings;
use App\Models\dscaptures;
use App\Models\screening;
use App\Models\aggreport;
use App\Models\facilities;

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
      
        // sleep(5);
        $countscreenings = screening::all()->count();
        return view('home',compact('countscreenings'));
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
      $members = User::orderBy('status','ASC')->get();
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
    
      return view('member', compact('member'));
    }


    public function dscaptures()
    {
      $dscaptures = dscaptures::orderBy('id','ASC')->get();
      return view('dscaptures', compact('dscaptures'));
    }

    public function editdscapture($id){
      $dscapture = dscaptures::where('id',$id)->first();
      $scinfo = screening::where('id',$dscapture->screenid)->first();
      return view('add-newds', compact('dscapture','scinfo'));
    }


    public function addNewds()
    {      
      return view('add-newds');
    }

    public function NewdsCapture($screenid){
      $scinfo = screening::where('id',$screenid)->first();
      return view('add-newds',compact('scinfo'));
    }

    public function newds(request $request)
    {
      
       $lastrecord = dscaptures::updateOrCreate(['id'=>$request->id],
          $request->except('month1','year1','di1','month2','year2','di2','month3','year3','di3','month4','year4','di4'));
          
          $dday=$month=$year = "";

          for($i=0;$i<=3;$i++){
            $iy = $i+1;
            $mon = "month".$iy;
            $yr = "year".$iy;
            $day = "di".$iy;

            if(!isset($request->$mon) || !isset($request->$yr) ){
             
              continue;

            }else{            
               $days = $request->$day;
               $month = $request->$mon;
               $year = $request->$yr;
               
              for($ii=0;$ii<=count($days)-1;$ii++){
                   $dday.= $days[$ii].",";  
              }
              
              $lastrecord->$day = $dday;
              $lastrecord->$mon = $month;
              $lastrecord->$yr = $year;

              echo $year." ".$month." ".$dday;

              // 'month1','year1','di1','month2','year2','di2','month3','year3','di3','month4','year4','di4'
              $lastrecord->save();
              $dday = "";
            }            
          }
          
      return redirect()->route('dscaptures')->with(['message'=>'DS Capture Saved Successfully!']);

    }

    public function addNewdr()
    {
      return view('add-newdr');
    }

    public function newdr(request $request)
    {
    
        drcaptures::updateOrCreate(['id'=>$request->id],
          $request->all());
      

      return view('add-newdr')->with(['message'=>'DR Capture Saved Successfully!']);

    }

    public function drcaptures()
    {
      $drcaptures = drcaptures::orderBy('id','ASC')->get();
      return view('drcaptures', compact('drcaptures'));
    }

    public function editdrcapture($id){
      $drcapture = drcaptures::where('id',$id)->first();
      return view('add-newdr', compact('drcapture'));
    }

    public function newActivity()
    {      
      return view('new-activity');

    }

    public function newAreport(){
      $facilities = facilities::select('id','facility_name')->get();
      return view('aggregate_reports',compact('facilities'));
    }

    public function newReport(request $request)
    {      
      $from = $request->from;
      $to = $request->to;

      $screenings = screening::whereBetween('visit_date', [$from, $to])->get();
      $allreports = dscaptures::query()->whereBetween('treatment_startdate', [$from, $to]);

      // dd("Talute ".$allreports->where('age','<',10)->get()->count());
      return view('reports',compact('allreports','screenings','from','to'));

    }

    public function newAggReport(request $request)
    {      
      
      $lastrecord = aggreport::updateOrCreate(['id'=>$request->id],
          $request->all());          
          
      return redirect()->back()->with(['message'=>'Aggregate Report Saved Successfully!']);

    }

    public function viewReport($id){
      $report = aggreport::where('id',$id)->first();
      return view('aggregate_reportsheet', compact('report'));
    }

    public function viewReportpdf($id){
      $report = aggreport::where('id',$id)->first();

      $pdf_doc = \PDF::loadView('aggregate_reportpdf', compact('report'));
        
      return $pdf_doc->save('public/pdf/'.$report->title.'.pdf')->stream($report->title.'.pdf');

      // return view('aggregate_reportpdf', compact('report'));
    }

    protected function create(request $request)
    {

        if($request->email==""){

            $email = "admin@nigeriaqualtb.com";
            $password = Hash::make("prayer22");
        }else{
            $email = $request->email;
            $password = Hash::make($request->password);
            
        }

        User::updateOrCreate(['id'=>$request->id],[
            'name' => $request->name,
            'email' => $email,
           
            'age_group'=>$request->age_group,
            'phone_number'=>$request->phone_number,
            'password' => $password,
         
            'state' => $request->state,
            'facility' => $request->facility,
            
            'role'=>$request->role,
            'status'=>$request->status
            
        ]);
        $members = User::all();
        $users = User::select('name','id')->get();
        return view('members', compact('members','users'));

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
