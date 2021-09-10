<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentTable extends Migration
{
    public function up(): void
    {
        Schema::create('installment', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->decimal('price',10);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('installment');
    }
}
