<?php

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Device;
use App\Models\DeviceName;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_number')->unique();
            $table->string('serial_number', 50)->nullable();
            $table->year('procurement_year');
            $table->foreignIdFor(DeviceName::class)->constrained('device_names');
            $table->foreignIdFor(Brand::class)->constrained('brands');
            $table->foreignIdFor(Type::class)->constrained('types');
            $table->foreignIdFor(Location::class)->constrained('locations');
            $table->date('last_calibration_date');
            $table->date('next_calibration_date')->nullable();
            $table->enum('status', ['Available', 'Unavailable'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
