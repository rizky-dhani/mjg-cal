<div class="container mx-auto px-4 py-8 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden w-full max-w-4xl">
        <div class="flex flex-col md:flex-row">
            <!-- Left Column - Barcode Image -->
            <div class="md:w-1/2 p-6 sm:p-8">
                <div class="bg-white rounded-lg shadow p-6 h-full flex flex-col">
                    <div class="flex flex-col items-center justify-center flex-1">
                        @if($device->deviceId)
                            <!-- This is a placeholder - you might want to use a barcode generation library -->
                            <img src="{{ asset('storage/'.$device->barcode) }}" alt="Device Barcode" class="mx-auto max-w-full h-auto rounded border border-gray-200 p-2">
                        @else
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 sm:p-8 text-center w-full">
                                <p class="text-sm text-gray-400 mt-2">No barcode available</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Device Details -->
            <div class="md:w-1/2 p-6 sm:p-8">
                <div class="bg-white rounded-lg shadow p-6 h-full flex flex-col">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-6">
                        <div class="w-full sm:w-auto mb-2 sm:mb-0">
                            <span class="sm:hidden px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium inline-block text-center mx-auto mb-3">
                                {{ $device->status }}
                            </span>
                            <p class="text-2xl text-black font-bold mt-1">{{ $device->deviceName->name ?? 'N/A' }}</p>
                        </div>
                        <span class="hidden sm:inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium self-start">
                            {{ $device->status }}
                        </span>
                    </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Device Number</h3>
                        <p class="mt-1 text-gray-900">{{ $device->device_number ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Brand</h3>
                        <p class="mt-1 text-gray-900">{{ $device->brand->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Type/Model</h3>
                        <p class="mt-1 text-gray-900">{{ $device->type->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Serial Number</h3>
                        <p class="mt-1 text-gray-900">{{ $device->serial_number ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Location</h3>
                        <p class="mt-1 text-gray-900">{{ $device->location->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Procurement Year</h3>
                        <p class="mt-1 text-gray-900">{{ $device->procurement_year ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Person In Charge</h3>
                        <p class="mt-1 text-gray-900">{{ $device->pic->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Customer</h3>
                        <p class="mt-1 text-gray-900">{{ $device->customer->name ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Calibration Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex flex-col">
                            <h4 class="text-sm font-medium text-gray-500">Calibrated Date</h4>
                            <p class="mt-1 text-gray-900">{{ $device->calibration_date ? \Carbon\Carbon::parse($device->calibration_date)->format('d M Y') : 'N/A' }}</p>
                        </div>

                        <div class="flex flex-col">
                            <h4 class="text-sm font-medium text-gray-500">Next Calibration Date</h4>
                            <p class="mt-1 text-gray-900">{{ $device->next_calibration_date ? \Carbon\Carbon::parse($device->next_calibration_date)->format('d M Y') : 'N/A' }}</p>
                        </div>

                        <div class="flex flex-col">
                            <h4 class="text-sm font-medium text-gray-500">Certificate Number</h4>
                            <p class="mt-1 text-gray-900">{{ $device->cert_number ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500">Notes</h3>
                    <p class="mt-1 text-gray-900">{{ $device->notes ?? 'No notes available' }}</p>
                </div>
            </div> <!-- Close device details card -->
        </div> <!-- Close right column -->
    </div> <!-- Close left column -->
</div> <!-- Close main flex container -->
</div> <!-- Close main wrapper -->
