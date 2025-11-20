<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Milon\Barcode\DNS2D;

class QRCodeService
{
    public function generateEmptyQRCode(string $content = '', ?string $deviceId = null): string
    {
        if (! $deviceId) {
            $deviceId = (string) Str::orderedUuid();
        }
        $filename = 'devices/qrcodes/'.$deviceId.'.png';

        // If no specific content is provided, use the public device detail route
        if (empty($content)) {
            $content = route('devices.details', $deviceId);
        }

        // Generate QR code with the public device detail route
        $qr = new DNS2D;
        $qrCodePng = $qr->getBarcodePNG($content, 'QRCODE');
        $path = Storage::disk('public')->path($filename);
        Storage::disk('public')->put($filename, base64_decode($qrCodePng));

        return $filename;
    }

    public function generateMultipleEmptyQRCodes(int $count, string $baseContent = ''): array
    {
        $qrData = [];

        for ($i = 0; $i < $count; $i++) {
            $deviceId = (string) Str::orderedUuid();
            $content = route('devices.publicDetail', $deviceId); // Create the public route URL with the device ID
            $filename = $this->generateEmptyQRCode($content, $deviceId);
            $qrData[] = [
                'filename' => $filename,
                'deviceId' => $deviceId,
                'content' => $content,
            ];
        }

        return $qrData;
    }

    public function getQRCodeUrl(string $filename): string
    {
        return Storage::disk('public')->url($filename);
    }
}
