<?php

use App\Models\ClassificationData;
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
        Schema::create('classification_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string("texto", 100);
            $table->unsignedSmallInteger("orden");
            $table->foreignIdFor(ClassificationData::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classification_options');
    }
};
