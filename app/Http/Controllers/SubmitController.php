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

        $response = Http::post($n8nWebhookUrl, [
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
        $n8nWebhookUrl = 'https://n8n.stg.getcars.dev/webhook-test/52777248-7651-472f-a56d-aed8da54c6d1';
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
            "data" => [
                'document' => $documentBase64,
                'documentHash' => $documentHash,
                "format" => "JSON",
                "codeNumber" => "1750399695-FSMY202500043-2025/05"
            ],
            "last_invoice_id" => 1,
            "is_retry" => false,
            "token" => "eyJhbGciOiJSUzI1NiIsImtpZCI6Ijk2RjNBNjU2OEFEQzY0MzZDNjVBNDg1MUQ5REM0NTlFQTlCM0I1NTRSUzI1NiIsIng1dCI6Imx2T21Wb3JjWkRiR1draFIyZHhGbnFtenRWUSIsInR5cCI6ImF0K2p3dCJ9.eyJpc3MiOiJodHRwczovL3ByZXByb2QtaWRlbnRpdHkubXlpbnZvaXMuaGFzaWwuZ292Lm15IiwibmJmIjoxNzUwNDAwMTA4LCJpYXQiOjE3NTA0MDAxMDgsImV4cCI6MTc1MDQwMzcwOCwiYXVkIjpbIkludm9pY2luZ0FQSSIsImh0dHBzOi8vcHJlcHJvZC1pZGVudGl0eS5teWludm9pcy5oYXNpbC5nb3YubXkvcmVzb3VyY2VzIl0sInNjb3BlIjpbIkludm9pY2luZ0FQSSJdLCJjbGllbnRfaWQiOiJhZTU5N2QzYS1lYzkwLTQ2NWYtOWVjMy05MDMxNzczOTg5OTIiLCJJc1RheFJlcHJlcyI6IjEiLCJJc0ludGVybWVkaWFyeSI6IjAiLCJJbnRlcm1lZElkIjoiMCIsIkludGVybWVkVElOIjoiIiwiSW50ZXJtZWRST0IiOiIiLCJJbnRlcm1lZEVuZm9yY2VkIjoiMiIsIm5hbWUiOiJDMjY3OTA2ODcwMDA6YWU1OTdkM2EtZWM5MC00NjVmLTllYzMtOTAzMTc3Mzk4OTkyIiwiU1NJZCI6Ijg5Y2I0MDk3LTU4Y2UtMTAxMC0wYzNlLWMxZjBiNTgxZmRiNyIsInByZWZlcnJlZF91c2VybmFtZSI6IkZNUyBuOG4gYW5kIFVDRCBXb3JrYXRvIiwiVGF4SWQiOiI4MjA3MCIsIlRheHBheWVyVElOIjoiQzI2NzkwNjg3MDAwIiwiUHJvZklkIjoiMTA3ODc0IiwiSXNUYXhBZG1pbiI6IjAiLCJJc1N5c3RlbSI6IjEifQ.DDhS-PVcKJ9Nr5mHrX_f09dp5O6txfW6TwsrU-HWCVEu7Mha50pY6C4Bd_uHqcr7_h5v25VQELaUUHsVAOJ7zGXCWa6-7IpNWSIUlzXjoGJOPyQikJuyOpjxJ02pPnKhra5_oRl88oLynYo6UevOoRyYLFgNpOQ_izWiw2-1CwswdK5AN5FohEjVlBuuz6p_WG706iJSIGtONzDNZFvs0KCEmqUjkhCxah0tlJgcbFdMKs31bFRS9XT-Gsp1JexcqpjsA8aJ34IQ__eBihWo5iHhAHh3kJ_XnDPssbQvVrMQO_EYVGzSTegXiwCNIX92mdxqW6pAar9BRcS4b6TOmg",
        ];

//        $throttle = Redis::throttle('saving:e-invoice-data-for-composing-'.Str::random(4))
//            ->block(10)
//            ->allow(10)
//            ->every(10);
////        $response=Http::post($n8nWebhookUrl, $data);
//        for ($i = 0; $i <= 20; $i++) {
//
//            $throttle->then(fn () => SendWebhookTestJob::dispatch($n8nWebhookUrl, $data,$i),
//            );
////            SendWebhookJob::dispatch($n8nWebhookUrl, $data,$i);
//        }
//        SendWebhookJob::dispatch(
//            $n8nWebhookUrl,
//            $data
//        );
        Http::post($n8nWebhookUrl, $data);

        return $data;
    }

    public function tokenResponse(Request $request)
    {

        $data = $request->all();
        Log::info('token', [$data]);

        return response()->json(['status' => 'success']);
    }

    public function dataResponse(Request $request)
    {

        $data = $request->all();
        Log::info('data', [$data]);

        return response()->json(['status' => 'success']);
    }

    public function dataSendFailResponse(Request $request)
    {

        $data = $request->all();
        Log::info('data_fail', [$data]);

        return response()->json(['status' => 'success']);
    }

    public function rejectResponse(Request $request)
    {

        $data = $request->all();
        Log::info('reject', [$data]);

        return response()->json(['status' => 'success']);
    }

    public function fireMail(Request $request)
    {

        $data = $request->all();
        Log::info('mail', [$data]);

        return response()->json(['status' => 'success']);
    }

}
