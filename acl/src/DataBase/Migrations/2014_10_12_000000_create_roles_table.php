<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lable')->nullable();
            $table->timestamps();
        });


        Schema::create('permission_role' , function(Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['permission_id' , 'role_id']);
        });



      

    }

  
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permission_role');
       
    }
}
