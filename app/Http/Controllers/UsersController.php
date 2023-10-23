<?php

namespace App\Http\Controllers;

use App\Mail\mailSend;
use App\Models\Admins;
use App\Models\Application;

use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Safaricom\Mpesa\Facade\Mpesa;
use Twilio\Base\BaseClient;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

// use Spatie\FlareClient\Http\Client;


class UsersController extends Controller
{
    //
    public function Login(){
        return view('login');
    }
    public function stu_details(Request $request){
        $data = session()->get('data',[]);
        $request->validate([
            "first_name"=>'required',
            "second_name"=>'required',
            "age"=>'required',
            "gender"=>'required',
            "family_status"=>'required',
            "parent_guardian_name"=>'required',
            "phone"=>'required|unique:parents,phone',
            "occupation"=>'required',
            "email"=>'required',
            "id_no"=>'required',
            "county"=>'required',
            "ward"=>'required',
            "location"=>'required',
            "sub_location"=>'required'
        ],);

        $data=[
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location
        ];
        session()->put('data', $data);
        // print_r($data['first_name']);
        if($data['first_name'] != ''){
        return view('students.institution',compact('data'));
        }else{
            echo "please fill the fields";
        }
    }
    public function previous(Request $request){
        return view('students.index');
    }
    public function index(){
        if(!session('res')){
            return redirect('login');
        }
        $today = date('Y/m/d');
        $staff = Admins::all()->count();
        $student = Student::all()->count();
        $application = Application::where('today_date',$today)->count();
        $apps = DB::table('applications')->orderBy('id','ASC')->limit(7)->get();
        foreach($apps as $data){
            $stues = DB::select("SELECT * FROM students WHERE student_fullname ='".$data->student_fullname."'");
        }
        return view('dashboard',compact('staff','student','application','apps','stues'));
    }
    public function burs_details(Request $request){
        $request->validate([
            "school_type"=>'required',
            "reg_no"=>'required',
            "school_name"=>'required',
            "bank_name"=>'required',
            "account_no"=>'required'
        ],);
        $data=[
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name,
            "bank_name"=>$request->bank_name,
            "account_no"=>$request->account_no
        ];
        session()->put('data',$data);
        return view('students.bursary',compact('data'));
    }
    public function back(Request $request){
        $data = session()->get('data',[]);
        $data=[
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name
        ];
        session()->put('data',$data);
        return view('students.institution',compact('data'));
    }
    public function b_bursary(){
        return view('students.institution');
    }
    public function summary(Request $request){
        $phoneNumber = preg_replace('/[^0-9]/', '', $request->phone);
    
    // Check if the phone number starts with "0" (indicating a Kenyan number)
    if (substr($phoneNumber, 0, 1) === '0') {
        // Remove the leading "0" to get the truncated number
        $phoneNumber = substr($phoneNumber, 1);
    }
        $request->validate([
            "bursary_name"=>'required',
            "bursary_type"=>'required',
            "disburser"=>'required'
        ],);
        $data=[
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$phoneNumber,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name,
            "bursary_name"=>$request->bursary_name,
            "bursary_type"=>$request->bursary_type,
            "disburser"=>$request->disburser,
            "bank_name"=>$request->bank_name,
            "account_no"=>$request->account_no
        ];
        session()->put('data',$data);
        return view('students.summary',compact('data'));
    }
    public function bursary_b(Request $request){
        $data = [
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name,
            "bursary_name"=>$request->bursary_name,
            "bursary_type"=>$request->bursary_type,
            "disburser"=>$request->disburser,
            "bank_name"=>$request->bank_name,
            "account_no"=>$request->account_no
        ];
        return view('students.bursary',compact('data'));
    }
    public function edit_student(){
        return view('students.index');
    }
    public function edit_school(Request $request){
        $data = [
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name,
            "bursary_name"=>$request->bursary_name,
            "bursary_type"=>$request->bursary_type,
            "disburser"=>$request->disburser
        ];
        return view('students.institution',compact('data'));
    }
    public function edit_bursary(Request $request){
        $data = [
            "first_name"=>$request->first_name,
            "second_name"=>$request->second_name,
            "fullname"=>$request->first_name. " ".$request->second_name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "family_status"=>$request->family_status,
            "parent_guardian_name"=>$request->parent_guardian_name,
            "phone"=>$request->phone,
            "occupation"=>$request->occupation,
            "email"=>$request->email,
            "id_no"=>$request->id_no,
            "county"=>$request->county,
            "ward"=>$request->ward,
            "location"=>$request->location,
            "sub_location"=>$request->sub_location,
            "school_type"=>$request->school_type,
            "reg_no"=>$request->reg_no,
            "school_name"=>$request->school_name,
            "bursary_name"=>$request->bursary_name,
            "bursary_type"=>$request->bursary_type,
            "disburser"=>$request->disburser
        ];
        return view('students.bursary',compact('data'));
    }
    public function submit_app(Request $request){
        // if($request->first_name == ""){
        //     return redirect('/summary')->with('message', "Empty fields are not allowed");
        // }else{}
        // $request->validate([
        //     "first_name"=>'required'
        // ],[
        //     "first_name.required"=>"Empty fields are not allowed",
        // ]);
        // date_default_timezone_set('Africa/Nairobi');
        $counts = Student::where('phone',$request->phone)->count();
        if($counts <= 0){
        $app_ref ='BUR' .random_int(1000,9999);
        $students = new Student();
        // $students->app_ref = $app_ref;
        $students->firstname = $request->first_name;
        $students->secondname = $request->second_name;
        $students->student_fullname = $request->fullname;
        $students->age = $request->age;
        $students->gender = $request->gender;
        $students->parent_guardian_name = $request->parent_guardian_name;
        $students->phone = $request->phone;
        $students->family_status = $request->family_status;
        $students->occupation = $request->occupation;
        $students->parent_email = $request->email;
        $students->parent_id_no = $request->id_no;
        $students->county = $request->county;
        $students->ward = $request->ward;
        $students->location = $request->location;
        $students->sub_location = $request->sub_location;
        $students->school_level = $request->school_type;
        $students->adm_upi_reg_no = $request->reg_no;
        $students->school_name = $request->school_name;
        $students->year = date('Y');
        $students->save();
            
        //save parent details
        $parents =new Parents();
        $parents->parent_guardian_name = $request->parent_guardian_name;
        $parents->student_fullname = $request->fullname;
        $parents->phone = $request->phone;
        $parents->parent_email = $request->email;
        $parents->parent_id_no = $request->id_no;
        $parents->occupation = $request->occupation;
        $parents->save();

        //save application
        $application = new Application();
        $application->reference_number = $app_ref;
        $application->student_fullname = $request->fullname;
        $application->adm_upi_reg_no = $request->reg_no;
        $application->school_type = $request->school_type;
        $application->school_name = $request->school_name;
        $application->bank_name = $request->bank_name;
        $application->account_no = $request->account_no;
        $application->location = $request->location;
        $application->status = "Pending...";
        $application->today_date = date('Y/m/d');
        $application->save();

        
        // Session()->flush();
        $name = "Thank you for applying for the bursary. Kindly use this reference number '".$app_ref."'  to track your application";
        Mail::to($request->email)->send(new mailSend($name));
        // echo "Basic Email Sent. Check your inbox.";
        

        //send sms
        
    // $message = "You have successfully applied for the bursary.
    // Use this ".$app_ref." reference number to track your application.";
    // $toPhoneNumber ='254'.$request->input('phone');


    // $twilioSid = env('TWILIO_SID');
    // $twilioToken = env('TWILIO_AUTH_TOKEN');
    // $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

    // $client = new Client( $twilioSid , $twilioToken);

    // $client->messages->create($toPhoneNumber, ['from' => 'Bursary system', 'body' => $message]);

    session()->forget('data');
        return redirect('/')->with('success','Students details recorded and application made successfully.You will receive an email confirmation shortly.');
        }else{
            return redirect('/')->with('message','The student is already registered.Just request for a bursary here');
        }
    }
    public function mail(){    
        // $data = array('name'=>"Dan Ndong");
   
        // Mail::send(['text'=>'sendMail'], $data, function($message) {
        //    $message->to('danndong080@gmail.com', 'Tutorials Point')->subject
        //       ('Laravel Basic Testing Mail');
        //    $message->from('bursaryTest@gmail.com','dante');
        // });
        // echo "Basic Email Sent. Check your inbox.";
        // return redirect('sendMail');
        $name = "Congratulations You have been selected to receive a bursary of worth 10,000 for your child Dan. Please do visiy our offices to receive your cheque                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ";
        Mail::to('danndong080@gmail.com')->send(new mailSend($name));
        echo "Basic Email Sent. Check your inbox.";
    }
    public function track(){
        return view('students.track_application');
    }
    public function check(Request $request){
        $request->validate([
            "ref_no"=>'required'
        ]);
        $value = Application::where('reference_number',$request->ref_no)->count();
        if($value !=0||$value > 0){
            $data = DB::select("SELECT * FROM applications WHERE reference_number ='".$request->ref_no."'");
            return view('students.track_process',compact('data','value'));
        }else{
            return redirect('/track_process')->with('message','The reference number is invalid');
        }
    }
    public function request(){
        return view('students.request');
    }
    public function req_search(Request $request){
        $request->validate([
            'email'=>'required',
        ]);
        $data = Student::where('parent_email',$request->email)->orWhere('phone',$request->email)->count();
        if($data >0 ){
            $value = DB::select("SELECT * FROM students WHERE parent_email = '".$request->email."' OR phone = '".$request->email."'");
            foreach($value as $item){
                $app_ref ='BUR' .random_int(1000,9999);
               
            $dat = DB::select("SELECT * FROM applications WHERE student_fullname = '".$item->student_fullname."'");
            foreach($dat as $result){
                //save application
                

                $application = new Application();
                $application->reference_number = $app_ref;
                $application->student_fullname = $item->student_fullname;
                $application->adm_upi_reg_no = $item->adm_upi_reg_no;
                $application->school_type = $result->school_type;
                $application->school_name = $result->school_name;
                $application->bank_name = $result->bank_name;
                $application->account_no = $result->account_no;
                $application->location = $item->location;
                $application->status = "Pending...";
                $application->save();
            }
        $name = "Thank you for applying for the bursary. Kindly use this reference number '".$app_ref."'  to track your application";
    Mail::to($item->parent_email)->send(new mailSend($name));
    }
    
            return back()->with('success','Students details recorded and application made successfully.You will receive an email confirmation shortly.');
        }else{
            return back()->with('message','The email address or phone number is not registered');
        }
    }
    public function push(Request $request)
    {
        $mpesa = new Mpesa();

        $phone = '254726585782'; // Replace with the customer's phone number
        $amount = 1; // Replace with the amount to be paid
        $accountReference = 'YourReference'; // Replace with your reference

        // Generate a unique transaction ID
        $transactionId = substr(md5(time()), 0, 10);

        // Initiate STK push
        $response = $mpesa::stkPush($amount, $phone, $accountReference, $transactionId);

        // Handle the response (check for success or error)
        if ($response['ResponseCode'] === '0') {
            return 'STK Push initiated successfully.';
        } else {
            return 'Error: ' . $response['ResponseDescription'];
        }
    }
    public function logout(){
        session()->forget('res');
        return redirect('login');
    }

    //student new
    public function student_index(){
        if(session('res')){
        foreach(session('res') as $data)
        $vals = DB::select("SELECT * FROM parents WHERE parent_email ='".$data->email."'");
        foreach($vals as $data){
            $value = DB::select("SELECT * FROM applications WHERE student_fullname ='".$data->student_fullname."' ORDER BY id DESC LIMIT 1");
        // print_r($value);
            return view('students.dashboard',compact('value'));
        }
    }else{
        return redirect('/');
    }
    }
    public function student_application(){
        if(!session('res')){
            return redirect('/');
        }else{
        return view('students.application');
        }
    }
    public function submit_application(Request $request){
        $app_ref ='BUR' .random_int(1000,9999);
        $request->validate([
            "fullname"=>'required',
            "age"=>'required',
            "gender"=>'required',
            "parent_guardian_name"=>'required',
            "phone"=>'required|numeric|digits:10',
            "occupation"=>'required',
            "family_status"=>'required',
            "email"=>'required',
            "id_no"=>'required|numeric|digits:8',
            "county"=>'required',
            "ward"=>'required',
            "location"=>'required',
            "sub_location"=>'required',
            "school_type"=>'required',
            "reg_no"=>'required',
            "school_name"=>'required',
            "bank_name"=>'required',
            "account_no"=>'required',
            "fee_structure"=>'required',
        ]);
        // $counts = DB::table('applications')->where('student_fullname', $request->fullname)->where('year', '!=', $request->year)->count();
        // $counts = Application::where('student_fullname', $request->fullname)->where('year', '==', $request->year)->count();
 $count =DB::select("SELECT * FROM applications WHERE student_fullname = '".$request->fullname."' AND year = '".$request->year."'");
         // $counts = Application::where('student_fullname',$request->fullname)->andWhere('year','!=',$request->year)->count();
        if($count > 0){
            return back()->with('message','You Already made an application. You can only make one application per year.');
    }else{
        $stu = Student::where('student_fullname',$request->fullname)->count();
        if($stu <=0){
       
        $students = new Student();
        // $students->app_ref = $app_ref;
        $students->student_fullname = $request->fullname;
        $students->age = $request->age;
        $students->gender = $request->gender;
        $students->parent_guardian_name = $request->parent_guardian_name;
        $students->phone = $request->phone;
        $students->family_status = $request->family_status;
        $students->occupation = $request->occupation;
        $students->parent_email = $request->email;
        $students->parent_id_no = $request->id_no;
        $students->county = $request->county;
        $students->ward = $request->ward;
        $students->location = $request->location;
        $students->sub_location = $request->sub_location;
        $students->school_level = $request->school_type;
        $students->adm_upi_reg_no = $request->reg_no;
        $students->school_name = $request->school_name;
        $students->year = date('Y');
        $students->save();
            
        //save parent details
        $parents =new Parents();
        $parents->parent_guardian_name = $request->parent_guardian_name;
        $parents->student_fullname = $request->fullname;
        $parents->phone = $request->phone;
        $parents->parent_email = $request->email;
        $parents->parent_id_no = $request->id_no;
        $parents->occupation = $request->occupation;
        $parents->save();

        //save application
        $application = new Application();
        $application->reference_number = $app_ref;
        $application->student_fullname = $request->fullname;
        $application->adm_upi_reg_no = $request->reg_no;
        $application->school_type = $request->school_type;
        $application->school_name = $request->school_name;
        $application->bank_name = $request->bank_name;
        $application->account_no = $request->account_no;
        $application->location = $request->location;
        $application->status = "Pending...";
        $application->today_date = date('Y/m/d');
        $application->year = $request->year;
        $application->save();

        
        // Session()->flush();
        $name = "Thank you for applying for the bursary. Kindly use this reference number '".$app_ref."'  to track your application";
        Mail::to($request->email)->send(new mailSend($name));
        return back()->with('success','Students details recorded and application made successfully.You will receive an email confirmation shortly.');
        }else{
            //save application
        $application = new Application();
        $application->reference_number = $app_ref;
        $application->student_fullname = $request->fullname;
        $application->adm_upi_reg_no = $request->reg_no;
        $application->school_type = $request->school_type;
        $application->school_name = $request->school_name;
        $application->bank_name = $request->bank_name;
        $application->account_no = $request->account_no;
        $application->location = $request->location;
        $application->status = "Pending...";
        $application->today_date = date('Y/m/d');
        $application->year = $request->year;
        $application->save();

        
        // Session()->flush();
        $name = "Thank you for applying for the bursary. Kindly use this reference number '".$app_ref."'  to track your application";
        Mail::to($request->email)->send(new mailSend($name));
        return back()->with('success','Students details recorded and application made successfully.You will receive an email confirmation shortly.');
        }
        }
    }
    public function student_request(){
        if(!session('res')){
            return redirect('/');
        }else{
        return view('students.bursary_request');
        }
    }
    public function stu_app(){
        if(!session('res')){
            return redirect('/');
        }else{
            foreach(session('res') as $datas)
            $vals = DB::select("SELECT * FROM parents WHERE parent_email ='".$datas->email."'");
            foreach($vals as $dat){
                $data = DB::select("SELECT * FROM applications WHERE student_fullname ='".$dat->student_fullname."'");
           
                return view('students.my_applications',compact('data'));
            }
        }
    }
    public function stu_login(){
        // if(!session('res')){
            return view('students/login');
        // }else{
        // return redirect('students/index');
        // }
    }
    public function req_login(Request $request){
        $request->validate([
            "email"=>'required',
            "password"=>'required'
        ]);
        $password = ($request->password);
        $req = User::where('email',$request->email)->count();
        if($req <=0){
         return redirect('students/login')->with('message','Email address not registered!');
        }else{
            $users = DB::table('users')->select('password')->where('email', $request->email)->get();
            foreach($users as $ad){
                if($password === $ad->password){
                    $res = session()->get('res',[]);
                    $res = DB::table('users')->where('email', $request->email)->get();
                    
                    session()->put('res',$res);
                    // print_r(session('res')); 
                    return redirect('students/index'); 
                    
                }else{
                   return redirect('students/login')->with('message','Wrong password!!.');
                }
                
            }
           
        }
    }
    public function stu_register(){
        // if(!session('res')){
            return view('students.register');
        // }else{
        // return redirect('students/index');
        // }
    }
    public function req_register(Request $request){
        $request->validate([
            "email"=>'required',
            "password"=>'required',
            "re_password"=>'required'
        ]);
        $check = User::where('email',$request->email)->count();
        if($check >0){
            return back()->with('message','The email address is already taken');
        }elseif($request->re_password != $request->password){
            return back()->with('message','The re-password doesnt match with password');
            }elseif($check <=0 && $request->re_password == $request->password){
                $user = new User();
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();
                return redirect('students/login');
            }else{
            return back()->with('message','Something went wrong please try again.');
            }
        }
        public function stu_logout(){
            session()->forget('res');
            return redirect('/');
        }
        public function edit(Request $request, $reference_number){
            // $apps = new Application();
            // $apps->adm_upi_reg_no = $request->upi_reg;
            // $apps->student_fullname = $request->name;
            // $apps->school_type = $request->school_type;
            // $apps->school_name = $request->school_name;
            // $apps->location = $request->location;
            // $apps->bank_name = $request->bank;
            // $apps->account_no = $request->account_no;
            // $apps->update();
            $today = date('Y-m-d H:m:s');
             DB::update("UPDATE applications SET adm_upi_reg_no = '".$request->upi_reg."',student_fullname = '".$request->name."',school_type = '".$request->school_type."',
            school_name = '".$request->school_name."',location = '".$request->location."',bank_name = '".$request->bank."',account_no = '".$request->account."',updated_at='".$today."' WHERE reference_number = '".$reference_number."'");
            return back()->with('success','Application updated successfully');
        }
}
