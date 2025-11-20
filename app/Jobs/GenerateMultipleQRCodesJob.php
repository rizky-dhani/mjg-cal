<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS2D;

class GenerateMultipleQRCodesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $devices;

    /**
     * Create a new job instance.
     */
    public function __construct($devices)
    {
        $this->devices = $devices;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $devicesToInsert = [];

        foreach ($this->devices as $device) {
            try {
                // Generate QR code and path
                $qr = new DNS2D;
                $content = route('devices.publicDetail', $device['deviceId']);

                $qrCodePng = $qr->getBarcodePNG($content, 'QRCODE');
                $path = 'qrcodes/'.$device['deviceId'].'.png';

                Storage::disk('public')->put($path, base64_decode($qrCodePng));

                // Prepare device data for insertion
                $devicesToInsert[] = [
                    'deviceId' => $device['deviceId'],
                    'barcode' => $path,
                    'result' => 'Laik Pakai', // Default result based on the example
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            } catch (\Exception $e) {
                // In a production environment, you might want to log this error
                // \Log::error('Error generating QR code', ['error' => $e->getMessage()]);
            }
        }

        // Insert the devices into the database if we have any to insert
        if (! empty($devicesToInsert)) {
            DB::table('devices')->insert($devicesToInsert);
        }
    }
}
