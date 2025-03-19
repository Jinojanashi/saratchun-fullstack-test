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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('for_sale')->default(false);
            $table->boolean('for_rent')->default(false);
            $table->boolean('sold')->default(false);
            $table->decimal('price', 15, 2);
            $table->string('currency', 10)->default('THB');
            $table->string('currency_symbol', 10)->default('฿');
            $table->string('property_type');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('area')->default(0);
            $table->string('area_type')->default('sqm');
            $table->string('country')->default('Thailand');
            $table->string('province');
            $table->string('street')->nullable();
            $table->json('photos')->nullable();
            $table->timestamps();

            $table->index(['for_sale', 'sold']);
            $table->index('price');
            $table->index('title');
            $table->index('province');
            $table->index('property_type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
