<?php

namespace App\Http\Controllers;

use App\Mail\mailSend;
use App\Models\Admins;
use App\Models\Application;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Prompts\Table;

class AdminController extends Controller
{
    //
    public function login(Request $request){
        //used for registering admin
        // $admin = new Admins();
        // $admin->fullname = $request->fullname;
        // $admin->email = $request->email;
        // $admin->phone = $request->phone;
        // $admin->password = Hash::make($request->password);
        // $admin->save();
        // return redirect('login')->with('success','Admin saved successfully');
        $request->validate([
            "email"=>'required',
            "password"=>'required'
        ]);
        $password = ($request->password);
        $req = Admins::where('email',$request->email)->count();
        if($req <=0){
         return redirect('login')->with('message','Email address not registered!');
        }else{
            $admins = DB::table('admins')->select('password')->where('email', $request->email)->get();
            foreach($admins as $ad){
                if($password === $ad->password){
                    $res = session()->get('res',[]);
                    $res = DB::table('admins')->where('email', $request->email)->get();
                    
                    session()->put('res',$res);
                    // print_r(session('res')); 
                    return redirect('index'); 
                    
                }else{
                   return redirect('login')->with('message','Wrong password!!.');
                }
                
            }
           
        }
    }
//     AUTH_TOKEN=$(curl -k https://flightdeck.cplane.cloud/identity/token --request POST --header "Authorization: Bearer sp-fSyXYQpihYZZsHtB_tpDXw")

// # Verify the token
// echo "Token: $AUTH_TOKEN"

// # Make the second curl request with properly formatted JSON data
// curl -X POST -H 'Content-Type: application/json' -H "Authorization: Bearer $AUTH_TOKEN" -d "{\"input\": [{\"name\": \"dan\"}]}" https://carrier.cplane.cloud/apps/hello-world/latest/hello

public function reset(Request $request){
 $c = Admins::where('email',$request->email)->count();
 if($c <=0){
    return redirect('login')->with('message','Email address not found.Please enter a valid email address');
 }else{
    $reset ='reset password';
    $url = 'https://bursary-ms.vercel.app/rest/'.$request->email;
    $name = 'Kindly use the link privided below to reset your password'  .$url;
    Mail::to($request->email)->send(new mailSend($name));
    return redirect('login')->with('message','reset email sent successfully');
 }
}

public function applications(){
    if(!session('res')){
        return redirect('login');
    }else{
        $data = DB::table('applications')->orderBy('id','DESC')->get();
        return view('applications',compact('data'));
    }
}
public function applicants(){
    if(!session('res')){
        return redirect('login');
    }else{
        $data = DB::table('students')->orderBy('id','DESC')->get();
        return view('applicants',compact('data'));
    }
}
public function delete(Request $request,$id){
    $query = Student::findOrFail($id);
    $query->delete();
    return back()->with('message','The student record was deleted successfuly');
}
public function delete_application(Request $request,$id){
    $query = Application::findOrFail($id);
    $query->delete();
    return back()->with('message','The application record was deleted successfuly');
}
public function approve_application(Request $request,$id){
    $res = DB::select("SELECT status FROM applications WHERE id = '".$id."'");
    foreach($res as $data){
        if($data->status == 'Approved'){
            return back()->with('message','The application status is already approved. You cant approve it again.');
        }else{
    DB::update("UPDATE applications SET status ='Approved' WHERE id = '".$id."'");

    $re = DB::select("SELECT student_fullname FROM applications WHERE id = '".$id."'");
    foreach($re as $data){
        $query = DB::select("SELECT parent_email FROM parents WHERE student_fullname ='".$data->student_fullname."'");
        foreach($query as $value){
            $name = "Congratulations!!!!. You have been selected for the bursary award.\n Kindly visit our offices for the bursary cheques allocation.";
            Mail::to($value->parent_email)->send(new mailSend($name));
        }
    }
    return back()->with('message','The application status approved successfuly and email has been sent to parent');
}}
  }
}
