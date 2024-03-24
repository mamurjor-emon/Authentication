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
        Schema::create('portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('porfolio_categories')->cascadeOnDelete();
            $table->string('client_name');
            $table->string('date');
            $table->string('phone');
            $table->string('age');
            $table->string('title');
            $table->string('btn_title');
            $table->string('image');
            $table->string('btn_url');
            $table->string('btn_target');
            $table->string('order_by');
            $table->longText('discription');
            $table->enum('status',[0,1])->comment('0 = Pending, 1 = Publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_sections');
    }
};
