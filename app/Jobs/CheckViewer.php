<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Viewer;
use Illuminate\Support\Facades\Auth;

class CheckViewer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $viewer;
    protected $data;
    protected $id;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $id)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $id = $this->id;
        $response = Http::get('https://api.ipify.org');
        $address = Http::get('http://ip-api.com/php/' . $response);
        $address = unserialize($address);
        Viewer::create([
            'account_id' => Auth::id()?Auth::id():NULL,
            'post_id'=> $id,
            'country' => $address['country'],
            'device' => $data['device'],
            'platform' => $data['platform']
        ]);
    }
}
