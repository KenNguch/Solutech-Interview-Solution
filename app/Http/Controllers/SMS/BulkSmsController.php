<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Twilio\Rest\Client;

class BulkSmsController extends Controller
{
    public function sendSms(Request $request)
    {
        // Your Account SID and Auth Token from twilio.com/console
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required'
        ]);

        if ($validator->passes()) {

            $numbers_in_arrays = explode(',', $request->input('numbers'));

            $message = $request->input('message');
            $count = 0;

            foreach ($numbers_in_arrays as $number) {
                $count++;

                $client->messages->create(
                    $number,
                    [
                        'from' => env('TWILIO_FROM'),
                        'body' => $message,
                    ]
                );
            }


            return response()->json('the following message ' . $message . ' was sent to ' . $number, Response::HTTP_CREATED);

        } else {
            return back()->withErrors($validator);
        }
    }
}
