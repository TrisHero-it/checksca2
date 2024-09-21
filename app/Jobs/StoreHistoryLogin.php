<?php

namespace App\Jobs;

use App\Models\HistoryLogin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StoreHistoryLogin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public $id,
        public $user
    )
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = \Illuminate\Support\Facades\Http::get('https://api.ipify.org');
        $address = \Illuminate\Support\Facades\Http::get('http://ip-api.com/php/' . $response);
        $address = unserialize($address);
        HistoryLogin::create([
            'ip'=> $address['query'],
            'browser' => $this->user,
            'account_id' => $this->id,
        ]);
    }
}
