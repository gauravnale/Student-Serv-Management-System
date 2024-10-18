<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_id')->nullable()->unsigned();
            $table->bigInteger('club_id')->nullable()->unsigned();
            $table->bigInteger('student_id')->nullable()->unsigned();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
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
        Schema::dropIfExists('club_members');
    }
};
