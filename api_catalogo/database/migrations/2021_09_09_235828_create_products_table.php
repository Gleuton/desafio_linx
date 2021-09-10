<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apiKey');
            $table->string('description');
            $table->string('type');
            $table->integer('eanCode')->nullable();
            $table->decimal('price',10);
            $table->string('remoteUrl')->nullable();
            $table->string('stock')->nullable();
            $table->string('brand');
            $table->decimal('basePrice',10)->nullable();
            $table->decimal('oldPrice',10);
            $table->string('published')->nullable();
            $table->string('version');
            $table->string('url');
            $table->string('unit')->nullable();
            $table->string('status');
            $table->string('ungroupedId');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
