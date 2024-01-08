<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('silder_sections', function (Blueprint $table) {
            $table->id();
            $table->string('f_title');
            $table->string('f_spcial_title');
            $table->string('l_title');
            $table->string('l_spcial_title');
            $table->text('description');
            $table->string('f_btn_title');
            $table->string('f_btn_url');
            $table->string('f_btn_target');
            $table->string('l_btn_title');
            $table->string('l_btn_url');
            $table->string('l_btn_target');
            $table->string('image');
            $table->string('order_by');
            $table->enum('status',[0,1])->comment('0 = Pending , 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silder_sections');
    }
};
