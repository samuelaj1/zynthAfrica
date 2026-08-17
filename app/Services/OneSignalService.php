<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    public static function sendEmail($emails, $subject, $htmlBody, $data = [], $filePath = null)
    {
        $url = 'https://onesignal.com/api/v1/notifications';

        if ($filePath) {
            $downloadUrl = asset('storage/' . $filePath);
            $htmlBody .= '
            <div style="
                    margin-top:30px;
                    text-align:center;
                    width:100%;
                ">
                <a
                    href="' . $downloadUrl . '"
                    style="
                        background:#272363;
                        color:#ffffff;
                        padding:12px 20px;
                        text-decoration:none;
                        border-radius:5px;
                        display:inline-block;
                    "
                >
                    Download Attachment
                </a>
            </div>
        ';
        }

        $fields = [
            'app_id' => config('custom.one_signal_app_id'),
            'include_email_tokens' => is_array($emails) ? $emails : [$emails],
            'email_subject' => $subject,
            'email_body' => $htmlBody,
            'data' => $data
        ];

        try {
            $apiKey = config('custom.one_signal_rest_api_key');
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post($url, $fields);

            Log::info(
                'OneSignal Email Response', [
                    'status' => $response->status(),
                    'body' => $response->json()
                ]
            );

            return $response->json();

        } catch (\Exception $e) {

            Log::error(
                'OneSignal Email Error',
                [
                    'message' => $e->getMessage()
                ]
            );

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];

        }
    }
}
