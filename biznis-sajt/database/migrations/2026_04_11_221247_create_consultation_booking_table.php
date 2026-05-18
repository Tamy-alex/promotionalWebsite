<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultation_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('service');
            $table->text('message')->nullable();

            $table->string('consultant');       // PHP enum cast
            $table->date('preferred_date');
            $table->string('preferred_time');

            $table->string('platform')->nullable(); // PHP enum cast
            $table->string('status')->default('pending'); // PHP enum cast

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultation_bookings');
    }
};
