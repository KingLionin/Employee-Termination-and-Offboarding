<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function receiveMessage(Request $request)
    {
        // Validate and process the data received from the manager's portal
        $data = $request->validate([
            'status' => 'required|in:request,approved,denied',
            'sender_id' => 'required|exists:users,id',
            'employee_id' => 'required|exists:employees,id',
            'message_content' => 'required|string',
            'offboarding_reason' => 'required|string',
            'documents' => 'nullable|string',
            // Add any other validation rules for your data
        ]);

        // Create a new message
        $message = Message::create($data);

        // Retrieve all messages from the database
        $messages = Message::all();

        // You can add additional logic here if needed
        return response()->json(['message' => 'Message received successfully'], 201);
    }
}
