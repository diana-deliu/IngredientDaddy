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
        $text = "From: " . $request->get('name') . "\n";
        $text .= "E-mail: " . $request->get('email') . "\n";
        $text .= "Phone number: " . $request->get('phone') . "\n\n";
        $text .= "Message: " . $request->get('message') . "\n";

        Mail::raw($text, function($message)
        {
            $message->subject("New mail from IngredientDaddy");
            $message->from('noreply@ingredientdaddy.com', 'IngredientDaddy');
            $message->to(env('ADMIN_EMAIL', 'contact@ingredientdaddy.com'));
        });

        return redirect('contact')->with([
            'flash_message' => 'Your message has been sent successfully!',
            'flash_message_type' => 'alert-success'
        ]);
    }

}
