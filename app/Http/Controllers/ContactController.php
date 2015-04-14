<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SendContactRequest;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{

    public function index()
    {
        return view('pages.contact');
    }

    /**
     * @param SendContactRequest $request
     * @return string
     */
    public function contact(SendContactRequest $request)
    {
        Mail::send('emails.contact', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'mail'=> $request->get('message')
        ], function($message)
        {
            $message->subject("New mail from IngredientDaddy");
            $message->from('noreply@ingredientdaddy.com', 'IngredientDaddy');
            $message->to(env('ADMIN_EMAIL', 'contact@ingredientdaddy.com'));
        });

        return redirect('contact')->with([
            'flash_message' => 'Your message has been sent!',
            'flash_message_type' => 'alert-success'
        ]);
    }

}
