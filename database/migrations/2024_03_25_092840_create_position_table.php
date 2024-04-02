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
        /* This code snippet is creating a new database table named 'position' using Laravel's Schema
        builder. The `Schema::create('position', function (Blueprint )` method call is used to
        define the structure of the 'position' table. Inside the callback function, various column
        definitions are added to the table using the methods provided by the Blueprint class, such
        as `->id()`, `->string('code')`, `->string('name')`,
        `->string('description')`, and `->timestamps()`. */
        Schema::create('position', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      /* The `Schema::dropIfExists('position');` statement in Laravel is used to drop a table from the
      database. In the context of migrations, the `down` method is responsible for reversing the
      changes made by the `up` method. */
        Schema::dropIfExists('position');
    }
};
