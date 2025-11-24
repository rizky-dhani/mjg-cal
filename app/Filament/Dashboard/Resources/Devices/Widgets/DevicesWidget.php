<?php

namespace App\Filament\Dashboard\Resources\Devices\Widgets;

use App\Models\Device;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DevicesWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Count total devices
        $totalDevices = Device::count();

        // Count filled devices - where all non-exception fields are not null
        $filledDevices = Device::whereNotNull('device_name_id')
            ->whereNotNull('device_number')
            ->whereNotNull('brand_id')
            ->whereNotNull('type_id')
            ->whereNotNull('serial_number')
            ->whereNotNull('location_id')
            ->whereNotNull('procurement_year')
            ->whereNotNull('pic_id')
            ->whereNotNull('customer_id')
            ->whereNotNull('calibration_date')
            ->whereNotNull('next_calibration_date')
            ->whereNotNull('cert_number')
            ->count();

        // Count empty devices - where all non-exception fields are null
        $emptyDevices = Device::whereNull('device_name_id')
            ->whereNull('brand_id')
            ->whereNull('type_id')
            ->whereNull('serial_number')
            ->whereNull('location_id')
            ->whereNull('procurement_year')
            ->whereNull('pic_id')
            ->whereNull('customer_id')
            ->whereNull('calibration_date')
            ->whereNull('next_calibration_date')
            ->whereNull('cert_number')
            ->count();

        return [
            Stat::make('Total Devices', $totalDevices)
                ->description('Device(s)')
                ->color('primary')
                ->url(\App\Filament\Dashboard\Resources\Devices\DeviceResource::getUrl('index')),

            Stat::make('Filled Devices', $filledDevices)
                ->description('Device(s)')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->url(\App\Filament\Dashboard\Resources\Devices\DeviceResource::getUrl('index', [
                    'tableFilters' => [
                        'filled' => '1',
                    ],
                ])),

            Stat::make('Empty Devices', $emptyDevices)
                ->description('Device(s)')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger')
                ->url(\App\Filament\Dashboard\Resources\Devices\DeviceResource::getUrl('index', [
                    'tableFilters' => [
                        'empty' => '1',
                    ],
                ])),
        ];
    }
}