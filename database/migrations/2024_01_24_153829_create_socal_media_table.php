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
        Schema::create('socal_media', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('name')->nullable();
            $table->mediumText('url')->nullable();
            $table->enum('target',[0,1])->comment('0 = Same Page, 1 = New Tab');
            $table->string('order_by');
            $table->enum('status',[0,1])->comment('0 = Pending , 1 = Publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socal_media');
    }
};
