<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $password_s =Hash::make($request->password);
    
        $req = Admins::where('email',$request->email)->count();
        if($req <=0){
         return redirect('login')->with('message','Email address not registered!');
        }else{
            $query = DB::select("SELECT password FROM admins WHERE email = '".$request->email."'");
            // Decode the JSON string into a PHP array
           
           foreach($query as $t){
            echo $t->password;
            if($t->password == $password_s){
                echo "yess";
            }else{}
            echo $password_s;
           }
// $data = json_decode($query, true);

// Access and echo the 'password' value
// if (!empty($data) && is_array($data)) {
//     $password = $data[0]['password'];
//     if($password == $password_s){
//         echo "yess";
//         return redirect('index');
//     }
//     echo $password; // Echoes the password value
// } else {
//     echo "Invalid JSON or empty data.";
// }
            // if($password == $query){
// echo $query;
// print_r($query);
            // }
            // 
        }
    }
}
