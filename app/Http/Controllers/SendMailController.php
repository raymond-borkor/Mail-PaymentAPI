<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
// use App\Models\SendMail as ModelsSendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|string|email',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'message' => $request['message']
        ];

        Mail::to($request['email'])->send(new SendMail($request));

        return response([
            'message' => 'Mail Sent'
        ], 200);
    }
}
