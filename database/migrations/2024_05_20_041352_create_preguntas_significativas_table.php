<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AreaNivelSuperior;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preguntas_significativas', function (Blueprint $table) {
            $table->increments('id');
            $table->string("texto", 300);
            $table->unsignedSmallInteger("orden");
            $table->foreignIdFor(AreaNivelSuperior::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas_significativas');
    }
};
