<?php

use App\Models\Products;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkusTable extends Migration
{
    public function up(): void
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->integer('sku')->primary();
            $table->string('products_id');
            $table->foreign('products_id')
                  ->references('id')
                  ->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
}
