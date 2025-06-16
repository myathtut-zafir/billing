<?php

namespace App\Http\Controllers;



use App\Jobs\SendWebhookJob;
use App\Jobs\SendWebhookTestJob;
use App\Models\N8n;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class SubmitController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

//        $n8nWebhookUrl = 'http://localhost:5678/webhook-test/01c440ef-08a0-49bf-aa23-f494d0989a0f';
        $n8nWebhookUrl = 'https://activepieces.stg.getcars.dev/api/v1/webhooks/EpZnk4YxmiMHNoSSnHYhv';

        $response=Http::post($n8nWebhookUrl, [
            'user_name' => $data['name'],
            'user_email' => $data['email'],
            'message' => $data['message'],
            // Add whatever data you want to send
        ]);

        return $response->json();
    }
    public function save(Request $request)
    {

        $data = $request;
//    Log::info('testing',[json_encode($data)]);
                N8n::create([
            'data' => json_encode($data),
        ]);



//        N8n::create([
//            'name' => $data['user_name'],
//            'email' => $data['user_email'],
//            'message' => $data['message'],
//        ]);

        return response()->json(['status' => 'success']);
    }
    public function lhdnSubmit(Request $request)
    {


//        $n8nWebhookUrl = 'http://localhost:5678/webhook-test/5ed8e535-2b4b-4451-ae5e-39761aa404e6';
        $n8nWebhookUrl = 'http://localhost:4000/api/v1/webhooks/o0PcguQ0Ayskr2zby2zAK';
//        $data = $request->all();
//
//        $data = $request->all();

        // Get the raw request body JSON string
        $requestBodyString = $request->getContent();


        // Parse JSON string to associative array (equivalent to JSON.parse())
        $requestBodyJSON = json_decode($requestBodyString, true);

        // Convert back to JSON string (equivalent to JSON.stringify())
        $requestBodyString = json_encode($requestBodyJSON);

        // Convert to Base64 (equivalent to Crypto.enc.Base64.stringify(Crypto.enc.Utf8.parse()))
        $documentBase64 = base64_encode($requestBodyString);
        // Generate SHA256 hash (equivalent to Crypto.SHA256())
//        $documentHashWordArr = hash('sha256', $requestBodyString, true); // raw binary output

        // Convert hash to hexadecimal string (equivalent to .toString(Crypto.enc.Hex))
        $documentHash = hash('sha256', $requestBodyString);// hex output directly
        $data = [
            'document' => $documentBase64,
            'documentHash' => $documentHash,
            "format"=> "JSON",
            "codeNumber"=> "INV_199651",
        ];
        dd($data);
        $throttle = Redis::throttle('saving:e-invoice-data-for-composing-'.Str::random(4))
            ->block(10)
            ->allow(10)
            ->every(10);
//        $response=Http::post($n8nWebhookUrl, $data);
        for ($i = 0; $i <= 20; $i++) {

            $throttle->then(fn () => SendWebhookTestJob::dispatch($n8nWebhookUrl, $data,$i),
            );
//            SendWebhookJob::dispatch($n8nWebhookUrl, $data,$i);
        }
//        SendWebhookJob::dispatch(
//            $n8nWebhookUrl,
//            $data
//        );

        return $response->json();
    }
    public function tokenResponse(Request $request)
    {

        $data = $request->all();
        Log::info('token',[$data]);

        return response()->json(['status' => 'success']);
    }
    public function dataResponse(Request $request)
    {

        $data = $request->all();
        Log::info('data',[$data]);

        return response()->json(['status' => 'success']);
    }
    public function dataSendFailResponse(Request $request)
    {

        $data = $request->all();
        Log::info('data_fail',[$data]);

        return response()->json(['status' => 'success']);
    }
    public function rejectResponse(Request $request)
    {

        $data = $request->all();
        Log::info('reject',[$data]);

        return response()->json(['status' => 'success']);
    }

}
