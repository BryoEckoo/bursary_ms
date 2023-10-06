<?php

namespace App\Http\Controllers;

use App\Mail\mailSend;
use App\Models\Admins;
use App\Models\Application;
use App\Models\Student;
use FPDF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    $name = 'Kindly use the link privided below to reset your password \n' .$url;
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
  public function reports(){
    if(!session('res')){
        return redirect('login');
    }else{
        // $data = DB::select("SELECT created_at FROM stude")
        return view('reports');
    }
  }
  public function print(Request $request){
    $re = DB::select("SELECT created_at FROM students");
    foreach($re as $data){
        $datetime = $data->created_at;
        // $carbonDate = Carbon::parse($datetime);
        $year = date("Y", strtotime($datetime));
        $array = str_split($year,4);
        foreach ($array as $subArray) {
            if ($subArray == $request->year) {
                $res = Student::all();
           $counter = 0; 
    
        $pdf = new FPDF('P','mm',array(150,250));
        $pdf->AddPage();

        // Set font and text color
        $imagePath = public_path('images/logo.png'); // Replace with the actual image path
        $pdf->Image($imagePath, 65,10,-300); 
        // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

  $pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
  $pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
  $pdf->setFont('Arial','B',10);
  $pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
  $pdf->cell(120, 6, "info@nandicounty.go.ke", 0, 1, 'C');

  $pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(10, 6,"", 0,0, 'C');

  $pdf->cell(50, 6,"County: Nandi County", 0,0, 'C');

  $pdf->cell(50, 6,"Year Selected: ".$request->year, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');
  
$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(28, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Date Updated", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
foreach($res as $data){
        // Add content to the PDF
        $counter++;
        $pdf->cell(1, 4,"", 0,0, '');
        $pdf->cell(7, 6,$counter, 1,0, '');
        // $pdf->cell(30, 6,$data->id, 1,0, '');
        $pdf->cell(35, 6,$data->student_fullname, 1,0, '');
        $pdf->cell(28, 6,$data->school_name, 1,0, '');
        $pdf->cell(32, 6,$data->school_level, 1,0, '');
        $pdf->cell(30, 6,$data->updated_at, 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                    // Check if we have printed 10 rows, then start a new page
       
 }
 if ($pdf->GetY() >= 200) {
    $pdf->AddPage();
}
        // Output the PDF (you can choose to save it to a file or send it as a response)
        $pdf->Output();
        // $pdf->Output("NandiCountyBursary.pdf",'D'); //'D' indicated download

        // exit();
                break; // If found, you can break out of the loop to stop further iterations.
            }else{
                return back()->with('message','The year is not available in the records.');
            }
        }
        // if($request->year != $year){
        //     return back()->with('message','The year is not available in the records.');
        // }
//         else{
//             $res = Student::all();
//     $counter = 0; 
    
//         $pdf = new FPDF('P','mm',array(150,250));
//         $pdf->AddPage();

//         // Set font and text color
//         $imagePath = public_path('images/logo.png'); // Replace with the actual image path
//         $pdf->Image($imagePath, 65,10,-300); 
//         // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

//   $pdf->cell(50, 20,"", 0,1, '');
// $pdf->setFont('Arial','B',12);
//   $pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
//   $pdf->setFont('Arial','B',10);
//   $pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
//   $pdf->cell(120, 6, "info@nandicounty.go.ke", 0, 1, 'C');

//   $pdf->setFont('Arial','B',9);

// $pdf->cell(50, 3,"", 0,1, '');

// $pdf->cell(10, 6,"", 0,0, 'C');

//   $pdf->cell(50, 6,"County: Nandi County", 0,0, 'C');

//   $pdf->cell(50, 6,"Year Selected: ".$request->year, 0,1, 'C');

// $pdf->cell(50, 1,"", 0,1, '');
  
// $pdf->setFont('Arial','B',8);
// $pdf->cell(1, 4,"", 0,0, '');
// $pdf->cell(7, 6,"S/N", 1,0, '');
// $pdf->cell(35, 6,"Student Name", 1,0, '');
// $pdf->cell(28, 6,"School Name", 1,0, '');
// $pdf->cell(32, 6,"School Level", 1,0, '');
// $pdf->cell(30, 6,"Date Updated", 1,1, '');
// // $pdf->cell(40, 6,"Month Updated", 1,1, '');
// $pdf->setFont('Arial','',11);


// $pdf->setFont('Arial','',8);
// foreach($res as $data){
//         // Add content to the PDF
//         $counter++;
//         $pdf->cell(1, 4,"", 0,0, '');
//         $pdf->cell(7, 6,$counter, 1,0, '');
//         // $pdf->cell(30, 6,$data->id, 1,0, '');
//         $pdf->cell(35, 6,$data->student_fullname, 1,0, '');
//         $pdf->cell(28, 6,$data->school_name, 1,0, '');
//         $pdf->cell(32, 6,$data->school_level, 1,0, '');
//         $pdf->cell(30, 6,$data->updated_at, 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
//                     // Check if we have printed 10 rows, then start a new page
       
//  }
//  if ($pdf->GetY() >= 200) {
//     $pdf->AddPage();
// }
//         // Output the PDF (you can choose to save it to a file or send it as a response)
//         $pdf->Output();
//         // $pdf->Output("NandiCountyBursary.pdf",'D'); //'D' indicated download

//         // exit();
//         }
    }
  }
}
