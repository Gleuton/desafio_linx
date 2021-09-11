<?php

use App\Models\Images;
use App\Models\Installments;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->json('imagesSsl');
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
            $table->json('specs');
            $table->json('extraInfo');
            $table->json('customBusiness');
            $table->foreignIdFor(Installments::class)->nullable();
            $table->dateTime('created');
            $table->dateTime('clientLastUpdated');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
