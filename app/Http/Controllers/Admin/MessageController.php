<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.message',compact('messages'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Message $message, $id)
    {
        $messages = Message::find($id);
        return view('admin.message_edit',compact('messages'));
    }

    public function update(Message $message, $id)
    {
        //
    }

    public function destroy($id)
    {
        $messages = Message::find($id);
        $messages->delete();

        return redirect()->route('admin_message')->with('info','Message Delete');

    }
}
