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
        Schema::create('feautes', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('title');
            $table->longText('discrption');
            $table->string('order_by');
            $table->enum('status',[0,1])->comment('0 = Pending, 1 = Publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feautes');
    }
};
