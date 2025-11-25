<?php

use App\Models\Inventory;
use App\Models\Location;
use App\Models\User;
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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->string('log_number')->unique();
            $table->foreignIdFor(Inventory::class)->constrained('inventories');
            $table->text('accessories')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignIdFor(Location::class)->constrained('locations');
            $table->foreignIdFor(User::class, 'pic_id')->constrained('users');
            $table->enum('status', ['Available', 'Borrowed', 'Returned']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};
