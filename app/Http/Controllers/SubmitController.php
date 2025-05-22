<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubmitController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $n8nWebhookUrl = 'https://myathtut.app.n8n.cloud/webhook-test/b38e65e3-f4a4-467d-b827-4cfde6ba30e8';

        Http::post($n8nWebhookUrl, [
            'user_name' => $data['name'],
            'user_email' => $data['email'],
            'message' => $data['message'],
            // Add whatever data you want to send
        ]);

        return response()->json(['status' => 'success']);
    }
}
