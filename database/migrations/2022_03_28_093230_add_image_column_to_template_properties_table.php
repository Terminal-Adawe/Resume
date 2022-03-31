<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToTemplatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_properties', function (Blueprint $table) {
            //
            $table->smallInteger('active')->after('available_fonts')->default(1);
            $table->string('image')->default('https://img.icons8.com/nolan/96/template.png')->nullable()->after('available_fonts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_properties', function (Blueprint $table) {
            //
        });
    }
}
