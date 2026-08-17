<?php

namespace App\Jobs;

use App\Services\OneSignalService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOneSignalEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emails;
    public $subject;
    public $view;
    public $data;
    public $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct($emails, $subject, $view, $data = [], $filePath = null) {

        $this->emails = $emails;
        $this->subject = $subject;
        $this->view = $view;
        $this->data = $data;
        $this->filePath = $filePath;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $html = view($this->view, $this->data)->render();
        OneSignalService::sendEmail($this->emails, $this->subject, $html, $this->data, $this->filePath);
    }
}
