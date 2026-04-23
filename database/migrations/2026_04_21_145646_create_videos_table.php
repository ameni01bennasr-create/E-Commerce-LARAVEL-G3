<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); 
            $table->string('type'); 
            $table->text('description'); 
            $table->decimal('prix', 8, 2)->default(49.99); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};