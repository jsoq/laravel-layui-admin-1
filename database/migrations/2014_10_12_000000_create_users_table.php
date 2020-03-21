<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('account', 32)->unique()->comment('帐号');
            $table->string('name', 32)->comment('昵称');
            $table->string('email', 256)->nullable()->unique()->comment('邮箱');
            $table->dateTime('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->string('phone', 16)->nullable()->unique()->comment('手机号');
            $table->dateTime('phone_verified_at')->nullable()->comment('手机验证时间');
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
