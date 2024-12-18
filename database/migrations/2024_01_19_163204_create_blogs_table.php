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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained('blog_categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->mediumText('tag_ids')->nullable();
            $table->string('image');
            $table->mediumText('title');
            $table->mediumText('sub_title');
            $table->longText('f_discrption');
            $table->string('f_image')->nullable();
            $table->string('l_image')->nullable();
            $table->longText('s_discrption')->nullable();
            $table->longText('t_discrption')->nullable();
            $table->longText('l_discrption')->nullable();
            $table->string('socal_media');
            $table->enum('tag',[0,1])->comment('0 = No, 1 = Yes');
            $table->integer('total_view')->default(0);
            $table->mediumText('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_discrption')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
