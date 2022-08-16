<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Setting $sett)
    {
        $data['sett'] = $sett->select('email' , 'phone')->first();
        return view("web.contact.index")->with($data);
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);

        

        Message::create($data);
        $request->session()->flash('Message' , 'Send Message Success');
        return redirect(url('/contact'));
    }
}
