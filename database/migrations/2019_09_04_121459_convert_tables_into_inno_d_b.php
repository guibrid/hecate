<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertTablesIntoInnoDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'accounts',
            'agents',
            'customers',
            'documents',
            'jobs',
            'migrations',
            'orders',
            'password_resets',
            'places',
            'roles',
            'role_user',
            'shipments',
            'statuses',
            'transshipments',
            'users',
            'verify_users'

        ];
        foreach ($tables as $table) {
            DB::statement('ALTER TABLE ' . $table . ' ENGINE = InnoDB');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'accounts',
            'agents',
            'customers',
            'documents',
            'jobs',
            'migrations',
            'orders',
            'password_resets',
            'places',
            'roles',
            'role_user',
            'shipments',
            'statuses',
            'transshipments',
            'users',
            'verify_users'
        ];
        foreach ($tables as $table) {
            DB::statement('ALTER TABLE ' . $table . ' ENGINE = MyISAM');
        }
    }
}
