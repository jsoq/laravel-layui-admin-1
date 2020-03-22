<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = config('menu');
        $this->generate($menus, 0);
    }

    public function generate(Array $menus, $pid = 0)
    {
        foreach ($menus as $menu) {
            $m = factory(\App\Models\Menu::class)->create([
                'name' => Arr::get($menu, 'name'),
                'icon' => Arr::get($menu, 'icon'),
                'url' => Arr::get($menu, 'url'),
                'sort' => Arr::get($menu, 'sort', 0),
                'pid' => $pid
            ]);
            $children = Arr::get($menu, 'children');
            if (is_array($children) && count($children) > 0) {
                $this->generate($children, $m->id);
            }
        }
    }
}
