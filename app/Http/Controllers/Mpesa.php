<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Client;
use Twilio\Base\BaseClient;
// use Twilio\Http\Client;
// use Twilio\Rest\Client;
class Mpesa extends Controller
{
    //
    public function push(Request $request)
    {
        // $mpesa = new Mpesa();

        // $phone = '254726585782'; // Replace with the customer's phone number
        // $amount = 1; // Replace with the amount to be paid
        // $accountReference = 'YourReference'; // Replace with your reference

        // // Generate a unique transaction ID
        // $transactionId = substr(md5(time()), 0, 10);

        // // Initiate STK push
        // $response = $mpesa->stkPush($amount, $phone, $accountReference, $transactionId);

        // // Handle the response (check for success or error)
        // if ($response['ResponseCode'] === '0') {
        //     return 'STK Push initiated successfully.';
        // } else {
        //     return 'Error: ' . $response['ResponseDescription'];
        // }

        $message = "You have successfully applied for the bursary";
    $toPhoneNumber ='254'.$request->input('phone');

    // TWILIO_SID=AC437a44a5e6e89a4a174115facfaeeafb
    // TWILIO_AUTH_TOKEN=5eab30adf5248aeab798433960ae2868
    // TWILIO_PHONE_NUMBER=+17124300592
    $twilioSid = 'AC437a44a5e6e89a4a174115facfaeeafb';
    $twilioToken = '5eab30adf5248aeab798433960ae2868';
    $twilioPhoneNumber = +17124300592;

    $client = new BaseClient( $twilioSid , $twilioToken);

    $client->messages->create('254726585782', ['from' => 'Bursary system', 'body' => $message]);

    echo "success";
    }

}
