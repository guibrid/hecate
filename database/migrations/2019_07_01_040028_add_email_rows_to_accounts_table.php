<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailRowsToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('email_from', 50)->after('country')->nullable();
            $table->string('email_reply', 50)->after('email_from')->nullable();
            $table->string('email_bcc', 50)->after('email_reply')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('email_from');
            $table->dropColumn('email_reply');
            $table->dropColumn('email_bcc');
        });
    }
}
