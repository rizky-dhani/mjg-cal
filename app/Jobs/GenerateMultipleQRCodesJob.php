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

        foreach ($this->devices as $index => $device) {
            try {
                // Generate QR code and path
                $qr = new DNS2D;
                $content = route('devices.publicDetail', $device['deviceId']);

                $qrCodePng = $qr->getBarcodePNG($content, 'QRCODE');
                $path = 'qrcodes/'.$device['deviceId'].'.png';

                Storage::disk('public')->put($path, base64_decode($qrCodePng));

                // Generate unique device number with template MJG-CAL- followed by 6 digits zero-padded
                $sequenceNumber = $index + 1;
                $deviceNumber = 'MJG-CAL-' . str_pad($sequenceNumber, 6, '0', STR_PAD_LEFT);

                // Ensure uniqueness by checking against existing device numbers in the database
                $originalDeviceNumber = $deviceNumber;
                $counter = 0;

                while (DB::table('devices')->where('device_number', $deviceNumber)->exists()) {
                    $counter++;
                    $deviceNumber = $originalDeviceNumber . '-' . $counter;
                }

                // Prepare device data for insertion
                $devicesToInsert[] = [
                    'deviceId' => $device['deviceId'],
                    'device_number' => $deviceNumber,
                    'barcode' => $path,
                    'result' => 'Fit For Use', // Default result based on the example
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
