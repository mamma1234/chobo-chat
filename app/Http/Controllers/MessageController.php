<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);

        $message = Message::create($validated);

        // Log::debug($message);

        MessageSent::dispatch($message);

        return response()->json([
            'message' => $message->load('from', 'to')
        ], 201);
    }

    public function index()
    {
        $messages = Message::where(function($query) {
            $query->where('from', request('from'));
            $query->where('to', request('to'));
        })->orWhere(function($query) {
            $query->where('from', request('to'));
            $query->where('to', request('from'));
        })->get();

        return response()->json([
            'messages' => $messages->load('from', 'to')
        ], 200);
    }

}
