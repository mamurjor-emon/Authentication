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
        Schema::create('doctor_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('department_models')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('bullding_id')->constrained('bulldings')->cascadeOnDelete();
            $table->string('image');
            $table->string('phone');
            $table->string('location');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('vimo')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('position');
            $table->string('fdegree');
            $table->string('sdegree')->nullable();
            $table->string('tdegree')->nullable();
            $table->string('ldegree')->nullable();
            $table->longText('workday');
            $table->longText('fbiography');
            $table->longText('education');
            $table->longText('lbiography')->nullable();
            $table->enum('status',[0,1,2])->comment('0 = Pending , 1 = Active , 2 = Cancel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_models');
    }
};
