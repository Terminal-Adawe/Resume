<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_bars', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->boolean('personal_details')->default(0);
            $table->boolean('professional_details')->default(0);
            $table->boolean('education')->default(0);
            $table->boolean('skills')->default(0);
            $table->boolean('hobbies')->default(0);
            $table->boolean('summary')->default(0);
            $table->boolean('references')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress_bars');
    }
}
