<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Car;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        // dd($request->all());
        Mail::send('emails.contact-message', [
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ], function($mail) use($request) {
            $mail->from($request->email, $request->name);
            $mail->to('info@bekoautos.co.uk')->subject('Contact');
        });

        return redirect()->route('contact')->with('successContact', 'Thank you for your message!');
    }

    public function sendMailForSpecificCar(Request $request, Car $car)
    {
        // dd($request->all());
        Mail::send('emails.contact-message-with-car', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment,
            'car' => $car->id
        ], function($mail) use($request) {
            $mail->from($request->email, $request->name);
            $mail->to('info@bekoautos.co.uk')->subject('Car message');
        });

        return redirect()->route('details', $car->id)->with('successDetailsContact', 'Thank you for your message!');
    }
}
