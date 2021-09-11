<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('products_id');
            $table->foreign('products_id')
                  ->references('id')
                  ->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
