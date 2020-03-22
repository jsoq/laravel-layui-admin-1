<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name', 8)->comment('菜单名称');
            $table->string('icon', 64)->nullable()->comment('图标');
            $table->string('url', 2048)->default('#')->comment('跳转链接');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('pid')->default(0)->comment('上级菜单id');
            $table->integer('permission_id')->nullable()->comment('关联权限');
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
        Schema::dropIfExists('menus');
    }
}
