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
        Schema::create('patient_appontments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('doctor_models')->cascadeOnDelete();
            $table->foreignId('slot_id')->constrained('slot_models')->cascadeOnDelete();
            $table->string('date');
            $table->longText('description');
            $table->enum('status',[0,1,2,3])->comment('0 = Pending , 1 = Publish , 2 = Cancel 3 = Suspend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_appontments');
    }
};
