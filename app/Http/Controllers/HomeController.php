<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use App\Models\tasks;
use App\Models\followups;
use App\Models\programmes;
use App\Models\settings;
use App\Models\dscaptures;
use App\Models\drcaptures;

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
        return view('home');
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
      return view('add-newds', compact('dscapture'));
    }


    public function addNewds()
    {
      
      return view('add-newds');

    }

    public function newds(request $request)
    {
     
        dscaptures::updateOrCreate(['id'=>$request->id],
          $request->all());
     

      return view('add-newds')->with(['message'=>'DS Capture Saved Successfully!']);

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

    public function editMember($id)
    {
      $users = User::all();
     
      return view('edit-member', compact('users'));

    }

    public function deleteMember($id)
    {
      $user = User::where('id',$id)->delete();      
      $message = 'The User has been deleted!';
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
