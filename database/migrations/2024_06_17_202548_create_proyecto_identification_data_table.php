<?php

use App\Models\Proyecto;
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
        Schema::create('proyecto_identification_data', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Proyecto::class);
            $table->string('identification_data_id');
            $table->unsignedSmallInteger("orden");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_identification_data');
    }
};
