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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->increments('alumni_id');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('streetAddress');
            $table->string('barangay');
            $table->string('city');
            $table->string('district');
            $table->string('province');
            $table->string('region');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('sex');
            $table->string('nationality');
            $table->string('civil_status');
            $table->string('email');
            $table->integer('batchNumber');
            $table->string('training_status');
            $table->string('scholarship');
            $table->boolean('pending')->default(false);
            // $table->boolean('survey_submitted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');

    }
};
