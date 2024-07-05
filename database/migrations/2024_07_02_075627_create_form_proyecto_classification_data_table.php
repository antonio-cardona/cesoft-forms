<?php

use App\Models\ClassificationOption;
use App\Models\Form;
use App\Models\ProyectoClassificationData;
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
        Schema::create('form_proyecto_classification_data', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignIdFor(Form::class);
            $table->foreignIdFor(ProyectoClassificationData::class);
            $table->foreignIdFor(ClassificationOption::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_proyecto_classification_data');
    }
};
