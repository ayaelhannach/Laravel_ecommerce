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
        Schema::create('product_options', function (Blueprint $table) {
            $table->id(); // ID primaire
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Clé étrangère vers la table 'products'
            $table->foreignId('option_id')->constrained('options')->onDelete('cascade'); // Clé étrangère vers la table 'options'
            $table->timestamps(); // Champs 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_options');
    }
};
