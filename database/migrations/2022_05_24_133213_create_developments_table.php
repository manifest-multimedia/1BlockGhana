<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->string('development_id')->nullable();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->boolean('adStatus')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developments');
    }
}
