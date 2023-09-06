<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scholar_profile', function (Blueprint $table) {
            $table->id();
            $table->string('spas_id');
            $table->string('year_of_award');
            $table->enum('program', ['MERIT', 'RA 7687', 'RA 10612']);
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex');
            $table->date('birthday');
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();
            $table->string('email');
            $table->string('contact_number')->nullable();
            $table->string('lbp')->nullable();
            $table->string('house_num')->nullable();
            $table->string('street')->nullable();
            $table->string('village')->nullable();
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->enum('status', ['gs', 'cup', 'c', 'cwp', 'rft', 't', 'g'])->default('gs');
            $table->string('hs_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholar_profile');
    }
};