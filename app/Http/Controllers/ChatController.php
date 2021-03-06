<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendMsgEvent;

class ChatController extends Controller
{
    public function getChatView()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $message = $request->get('message');
        if ($message) {
            broadcast(new SendMsgEvent($message))->toOthers();
            return response()->json(['result' => 'ok'], 200);
        }
    }
}
