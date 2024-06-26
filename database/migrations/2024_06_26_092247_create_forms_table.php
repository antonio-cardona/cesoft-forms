<?php

use App\Models\Proyecto;
use App\Models\User;
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
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Proyecto::class);
            $table->timestamps();
            $table->unique(["user_id", "proyecto_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
