<?php

use App\Models\Inventory;
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
            $table->date('date');
            $table->foreignIdFor(Inventory::class);
            $table->text('accessories')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->foreignIdFor(User::class, 'pic_id');
            $table->enum('status', ['Available', 'Borrowed']);
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
