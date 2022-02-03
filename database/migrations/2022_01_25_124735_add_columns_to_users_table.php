<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username')->nullable()->after('name');
            $table->boolean('is_staff')->default(0)->after('remember_token');
            $table->integer('role')->default(1)->after('is_staff');
            $table->date('dob')->nullable()->after('is_staff');
            $table->date('address')->nullable()->after('dob');
            $table->date('country')->nullable()->after('address');
            $table->date('city')->nullable()->after('country');
            $table->date('contact_number')->nullable()->after('country');
            $table->boolean('active')->default(1)->after('role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
