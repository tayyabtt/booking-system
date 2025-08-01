<?php

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
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('type'); // Hajj, Umrah, Tour
        $table->integer('duration'); // days
        $table->date('start_date');
        $table->date('end_date');
        $table->string('hotel_name');
        $table->boolean('transportation_included')->default(false);
        $table->decimal('price_per_person', 10, 2);
        $table->integer('available_seats');
        $table->string('image')->nullable(); // path to image
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
