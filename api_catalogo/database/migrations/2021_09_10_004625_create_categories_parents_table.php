<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesParentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories_parents', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');

            $table->integer('parent_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories_parents');
    }
}
