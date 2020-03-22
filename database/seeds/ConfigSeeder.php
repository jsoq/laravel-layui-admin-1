<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = factory(\App\Models\Config::class);
        $factory->create([
            'key' => 'site_name',
            'value' => 'Laravel-Layui-Admin'
        ]);
        $factory->create([
            'key' => 'icp',
            'value' => ''
        ]);
    }
}
