<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPushbulletToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->boolean('pushbullet')->default(false)->after('remember_token');
			$table->string('pushbullet_api_key')->nullable()->after('pushbullet');
			$table->string('pushbullet_device')->nullable()->after('pushbullet_api_key');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropColumn('pushbullet');
			$table->dropColumn('pushbullet_api_key');
			$table->dropColumn('pushbullet_device');
		});
	}
}
