<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('professional_experience_id')
            ->foreign('professional_experience_id')
            ->references('id')->on('professional_experiences')
            ->onDelete('cascade');
            $table->text('project');
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
        Schema::dropIfExists('work_projects');
    }
}
