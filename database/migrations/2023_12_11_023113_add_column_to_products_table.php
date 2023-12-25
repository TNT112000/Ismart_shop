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
        Schema::table('products', function (Blueprint $table) {
            $table->string('name',100);
            $table->integer('price');
            $table->integer('qty');
            $table->string('image_main');
            $table->text('describe');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('line_id')->constrained();
            $table->foreignId('promotion_id')->constrained();
            $table->string('transport',50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
