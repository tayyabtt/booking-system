<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
   Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // customer who booked
    $table->foreignId('package_id')->constrained()->onDelete('cascade');
    $table->decimal('total_cost', 10, 2);
    $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
    $table->timestamps();
});

}


    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
