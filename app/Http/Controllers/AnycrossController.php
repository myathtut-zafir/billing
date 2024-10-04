<?php

namespace App\Http\Controllers;

class AnycrossController extends Controller
{
    public function __invoke()
    {
        $json = file_get_contents(__DIR__ . '/../TestData/testing.json');


// Webhook URL from your Lark bot setup
        $webhook_url = "https://open.larksuite.com/anycross/trigger/callback/YWRmNGExZWI0ODkyYTZmOWQyZDY3ZDhjOTdlNTIxNmMw";

// The message you want to send
        $message = [

               "receive_id"=> "ou_7d8a6e6df7621556ce0d21922b676706ccs",
    "content"=> "{\"text\":\" test content\"}",
    "msg_type"=> "text"

        ];


        $messageThree = [
            "msg_type" => "text",
            "content" => [
                "text" => "This is a notification from my PHP application."
            ]
        ];



// Convert message array to JSON format
//        $json_data = json_decode((string)$messageThree);

// Initialize cURL session
        $ch = curl_init($webhook_url);

// Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $messageTwo);

// Execute cURL request
        $response = curl_exec($ch);

// Close cURL session
        curl_close($ch);

// Handle the response if necessary
        if ($response === false) {
            echo "Error sending notification.";
        } else {
            echo "Notification sent successfully!";
        }


    }
}
