<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {

            $table->id();

            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('status') ->default(true);
            $table->timestamps();
            $table->unique([
                'branch_id',
                'slug',
            ]);
            $table->index([
                'company_id',
                'branch_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};