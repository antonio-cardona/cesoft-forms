<?php

use App\Models\Form;
use App\Models\Pregunta;
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
        Schema::create('form_preguntas', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignIdFor(Form::class);
            $table->foreignIdFor(Pregunta::class);
            $table->string("respuesta", 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_preguntas');
    }
};
