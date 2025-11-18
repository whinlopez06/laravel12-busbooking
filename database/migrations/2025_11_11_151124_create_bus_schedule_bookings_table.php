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
        Schema::create('bus_schedule_bookings', function (Blueprint $table) {
            $table->id();
            // mysql
            // $table->unsignedBigInteger('bus_schedule_id');
            // $table->tinyInteger('seat_number');
            // $table->string('fullname');
            // $table->string('email_address')->nullable();
            // $table->tinyInteger('age')->nullable();
            // $table->enum('gender', ['M','F'])->default('M');
            // $table->timestamps();

            // $table->foreign('bus_schedule_id')
            // ->references('id')
            // ->on('bus_schedules')
            // ->cascadeOnDelete();

            // pgsql
            // Use foreignId() for the schedule ID
            $table->foreignId('bus_schedule_id')
                ->constrained('bus_schedules') // Adds the foreign key and uses BIGINT
                ->cascadeOnDelete();

            // Use smallInteger() instead of tinyInteger()
            $table->smallInteger('seat_number');

            $table->string('fullname');
            $table->string('email_address')->nullable();

            // Use smallInteger() instead of tinyInteger()
            $table->smallInteger('age')->nullable();

            // Use string/char instead of enum for better flexibility
            $table->string('gender', 1)->default('M');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_schedule_bookings');
    }
};
