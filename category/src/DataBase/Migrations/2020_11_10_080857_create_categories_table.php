<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->integer('categoryable_id');
            $table->string('categoryable_type');
            $table->string('name');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
