<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('products_id');
            $table->foreign('products_id')
                  ->references('id')
                  ->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
}
