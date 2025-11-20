<?php

namespace App\Livewire\Public;

use App\Models\Device;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeviceDetail extends Component
{
    public Device $device;

    public function mount($deviceId)
    {
        // $this->device = Device::with(['deviceName', 'brand', 'type', 'pic', 'customer'])->findOrFail($deviceId);
        $this->device = Device::where('deviceId', $deviceId)->firstOrFail();
    }

    #[Title('Device Detail')]
    #[Layout('components.layouts.public')]
    public function render()
    {
        return view('livewire.public.device-detail', [
            'device' => $this->device,
        ]);
    }
}
