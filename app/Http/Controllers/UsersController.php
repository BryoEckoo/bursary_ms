<?php

namespace App\Http\Controllers;

use App\Mail\mailSend;
use App\Models\Application;

use App\Models\Parents;
use App\Models\Student;
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
        return view('index');
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
        date_default_timezone_set('Africa/Nairobi');
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
        if($data >=1){
            // $value = DB::select("SELECT * FROM students WHERE parent_email = '".$request->email."' OR phone = '".$request->email."'");
            // foreach($value as $item){
            //     // echo $item->student_fullname;
            //     $students = new Student();
            //     // $students->app_ref = $app_ref;
            //     $students->firstname = $item->firstname;
            //     $students->secondname = $item->secondname;
            //     $students->student_fullname = $item->student_fullname;
            //     $students->age = $item->age;
            //     $students->gender = $item->gender;
            //     $students->parent_guardian_name = $item->parent_guardian_name;
            //     $students->phone = $item->phone;
            //     $students->family_status = $item->family_status;
            //     $students->occupation = $item->occupation;
            //     $students->parent_email = $item->parent_email;
            //     $students->parent_id_no = $item->parent_id_no;
            //     $students->county = $item->county;
            //     $students->ward = $item->ward;
            //     $students->location = $item->location;
            //     $students->school_level = $item->school_level;
            //     $students->adm_upi_reg_no = $item->adm_upi_reg_no;
            //     $students->school_name = $item->school_name;
            //     $students->save();
            // }  

            // $data = DB::select("SELECT * FROM parents WHERE parent_email = '".$request->email."' OR phone = '".$request->email."'");
            // foreach($data as $request){
            //     //save parent details
            //     $parents =new Parents();
            //     $parents->parent_guardian_name = $request->parent_guardian_name;
            //     $parents->student_fullname = $request->student_fullname;
            //     $parents->phone = $request->phone;
            //     $parents->parent_email = $request->parent_email;
            //     $parents->parent_id_no = $request->parent_id_no;
            //     $parents->occupation = $request->occupation;
            //     $parents->save();
            // }
            $value = DB::select("SELECT * FROM students WHERE parent_email = '".$request->email."' OR phone = '".$request->email."'");
            foreach($value as $item){
                $data = DB::select("SELECT * FROM parents WHERE parent_email = '".$request->email."' OR phone = '".$request->email."'");
            foreach($data as $req){
            $dat = DB::select("SELECT * FROM applications WHERE student_fullname = '".$req->student_fullname."'");
            foreach($dat as $request){
                //save application
                $app_ref ='BUR' .random_int(1000,9999);

                $application = new Application();
                $application->reference_number = $app_ref;
                $application->student_fullname = $item->student_fullname;
                $application->adm_upi_reg_no = $item->adm_upi_reg_no;
                $application->school_type = $request->school_type;
                $application->school_name = $request->school_name;
                $application->bank_name = $request->bank_name;
                $application->account_no = $request->account_no;
                $application->location = $item->location;
                $application->status = "Pending...";
                $application->save();
            }
        }
        $name = "Thank you for applying for the bursary. Kindly use this reference number '".$app_ref."'  to track your application";
    Mail::to($item->parent_email)->send(new mailSend($name));
    }
    
            return redirect('/')->with('success','Students details recorded and application made successfully.You will receive an email confirmation shortly.');
        }else{
            return redirect('request_bursary')->with('message','The email address or phone number is not registered');
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
}
