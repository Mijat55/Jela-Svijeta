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
        Schema::create('dish_translations', function(Blueprint $table) {
            $table->foreignId('dish_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');
        
            $table->unique(['dish_id', 'locale']);
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
        });}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_translations');
    }
};
