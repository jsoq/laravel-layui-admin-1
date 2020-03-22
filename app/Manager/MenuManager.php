<?php


namespace App\Manager;


use App\Models\Menu;
use Illuminate\Support\Str;

class MenuManager
{
    public function tree()
    {
        return Menu::where('pid', 0)->with('children')->get();
    }

    public function isSelected($menu)
    {
        if (empty($menu)) {
            return false;
        }
        return Str::startsWith(request()->getPathInfo(), $menu->url);
    }
}
