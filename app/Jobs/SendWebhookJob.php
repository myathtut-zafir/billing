<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private mixed $n8nWebhookUrl;
    private mixed $data;
    private int $count;

    /**
     * Create a new job instance.
     */
    public function __construct($n8nWebhookUrl, $data, $count)
    {
        $this->n8nWebhookUrl = $n8nWebhookUrl;
        $this->data = $data;
        $this->count = $count;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Job starting...', [
            'pid' => "test",
        ]);
//        $authToken = 'eyJhbGciOiJSUzI1NiIsImtpZCI6Ijk2RjNBNjU2OEFEQzY0MzZDNjVBNDg1MUQ5REM0NTlFQTlCM0I1NTRSUzI1NiIsIng1dCI6Imx2T21Wb3JjWkRiR1draFIyZHhGbnFtenRWUSIsInR5cCI6ImF0K2p3dCJ9.eyJpc3MiOiJodHRwczovL3ByZXByb2QtaWRlbnRpdHkubXlpbnZvaXMuaGFzaWwuZ292Lm15IiwibmJmIjoxNzQ5NjE2NzYwLCJpYXQiOjE3NDk2MTY3NjAsImV4cCI6MTc0OTYyMDM2MCwiYXVkIjpbIkludm9pY2luZ0FQSSIsImh0dHBzOi8vcHJlcHJvZC1pZGVudGl0eS5teWludm9pcy5oYXNpbC5nb3YubXkvcmVzb3VyY2VzIl0sInNjb3BlIjpbIkludm9pY2luZ0FQSSJdLCJjbGllbnRfaWQiOiJhZTU5N2QzYS1lYzkwLTQ2NWYtOWVjMy05MDMxNzczOTg5OTIiLCJJc1RheFJlcHJlcyI6IjEiLCJJc0ludGVybWVkaWFyeSI6IjAiLCJJbnRlcm1lZElkIjoiMCIsIkludGVybWVkVElOIjoiIiwiSW50ZXJtZWRST0IiOiIiLCJJbnRlcm1lZEVuZm9yY2VkIjoiMiIsIm5hbWUiOiJDMjY3OTA2ODcwMDA6YWU1OTdkM2EtZWM5MC00NjVmLTllYzMtOTAzMTc3Mzk4OTkyIiwiU1NJZCI6IjJiMzVlOWE2LTI1YTItNDI4ZC02ZWRkLTkxN2YxZTViNmQyZCIsInByZWZlcnJlZF91c2VybmFtZSI6IkZNUyBuOG4gYW5kIFVDRCBXb3JrYXRvIiwiVGF4SWQiOiI4MjA3MCIsIlRheHBheWVyVElOIjoiQzI2NzkwNjg3MDAwIiwiUHJvZklkIjoiMTA3ODc0IiwiSXNUYXhBZG1pbiI6IjAiLCJJc1N5c3RlbSI6IjEifQ.kvUIrOZi9aoy3m1w8IrnrsrN81pC8A4kBRsfwsoqUVXNF5T-sP_rw4ilSh9vCHC5HdcvpP8JwZm1Oi-qXiVH2Jm_sI5blBL4LoYaYJaZcdGWMz7fTHCSnwmG-IUR9aiAQ1CpNXFHdV7S3F7R2W14cdx_lm-oaJSgDCW5X0azGtVDTPhxscjqQTnrvhIGfi_FOpLXKlN9oOzcfEj8ge6H-erkGiiHl5Iq0d7bvG6_0WogYWk-P1R5Rm9NQ3FU28WM0T60qejwM-giT2aYKAm5hmTy185W_3X-q5lJJZEPpFR6ahn1RaNyaBieAUJvZDZmzO02afZXJGbEre6UDe8hig';
//
//        $response = Http::withHeaders([
//            'Authorization' => 'Bearer ' . $authToken,
//            'Accept' => 'application/json', // It's good practice to specify what you accept
//        ])->get("https://preprod-api.myinvois.hasil.gov.my/api/v1.0/documents/Q0HGEDQD7H012XSTEJ0FECXJ10/details");
//        Log::info('Job starting...', [
//            'pid' => $response->json(),
//        ]);

//        Log::info('Job starting...', [
//            'pid' => getmypid(), // Get the current Process ID
//        ]);
//        Log::info('Job starting...', ["count" => $this->count]);
//        if ($this->count == 20) {
//            $this->data['delete'] = true;
//            Log::info('Job starting...', $this->data);
//
//        } else {
//            $response = Http::post($this->n8nWebhookUrl, $this->data);
//        }

//        Log::info('job',[
//            'response' => $response->json(),
//        ]);
    }
}
