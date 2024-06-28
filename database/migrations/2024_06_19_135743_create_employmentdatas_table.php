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
        Schema::create('employmentdatas', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->integer('batchNumber');
            $table->string('name');
            $table->string('employment_status');
            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('location')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employmentdatas');
    }
};
