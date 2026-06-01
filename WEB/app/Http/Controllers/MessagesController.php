<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //
    public function storeMessage(Request $request) 
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);
        $message= new Message();
        $message->name= $request->input('name');
        $message->email= $request->input('email');
        $message->phone= $request->input('phone');
        $message->message= $request->input('message');
        $message->save();
        return redirect()->back()->with('success', 'message sent successfully');
    }


    public function showMessages()
    {
        $messages= Message::all();
        return view('auth.messages.show')->with('messages', $messages);
    }

    public function testPHPConnection()
    {
        return view('auth.messages.create');
    }


    public function approveMessage($id)
    {
        $message= Message::find($id);
        $message->status= 'approved';
        $message->save();
        return redirect()->back()->with('success', 'message approved successfully');
    }

    public function deleteMessage($id)
    {
        $message= Message::find($id);
        $message->delete();
        return redirect()->back()->with('success', 'message deleted successfully');
    }
}
