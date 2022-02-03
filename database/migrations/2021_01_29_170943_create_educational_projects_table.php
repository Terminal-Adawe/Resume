<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('education_id')
            ->foreign('education_id')
            ->references('id')->on('education')
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
        Schema::dropIfExists('educational_projects');
    }
}
