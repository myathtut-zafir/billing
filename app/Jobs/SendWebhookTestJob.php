<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendWebhookTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private mixed $n8nWebhookUrl;
    private mixed $data;
    private mixed $count;


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
        $response = Http::post($this->n8nWebhookUrl, $this->data);

        Log::info('Job starting...', [
            'pid' => "test",
        ]);
    }
}
