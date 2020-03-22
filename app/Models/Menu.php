<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function sub()
    {
        return $this->hasMany(self::class, 'pid', 'id');
    }

    public function children()
    {
        return $this->sub()->with('children');
    }
}
