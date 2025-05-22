<?php

namespace App\Http\Controllers;



use App\Models\N8n;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
    public function save(Request $request)
    {

        $data = $request->all();
    Log::info('dd',[$data]);
        N8n::create([
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'message' => $data['message'],
        ]);

        return response()->json(['status' => 'success']);
    }
}
