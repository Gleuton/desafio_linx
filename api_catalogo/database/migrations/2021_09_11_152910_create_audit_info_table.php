<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditInfoTable extends Migration
{
    public function up(): void
    {
        Schema::create('audit_info', function (Blueprint $table) {
            $table->id();
            $table->string('updatedBy');
            $table->string('updatedThrough');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_info');
    }
}
