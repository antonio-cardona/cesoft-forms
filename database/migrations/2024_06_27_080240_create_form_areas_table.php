<?php

use App\Models\Area;
use App\Models\Form;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('form_areas', function (Blueprint $table) {
            $table->increments("id");
            $table->foreignIdFor(Form::class);
            $table->foreignIdFor(Area::class);
            $table->unsignedSmallInteger("orden");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('form_areas');
    }
};
