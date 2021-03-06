<?php


namespace App\Manager;


use App\Models\Config;

class ConfigManager
{
    /**
     * 获取设置项值
     * @param $key string 设置项名称
     * @param null|string $default 默认值
     * @return string|null
     */
    public function get($key, $default = null)
    {
        if (!strlen($key)) {
            return $default;
        }
        $item = Config::where('key', $key)->first();
        return $item ? $item->value : $default;
    }

    /**
     * 设置设置项
     * @param $key string 设置项名称
     * @param $value string 目标值
     * @param bool $forceAdd 是否在配置项不存在时新建
     * @return bool 是否设置成功
     */
    public function set($key, $value, $forceAdd = false)
    {
        $item = Config::where('key', $key)->first();
        if (empty($item)) {
            if ($forceAdd) {
                $item = new Config();
                $item->key = $key;
            } else {
                return false;
            }
        }
        $item->value = $value;
        return !$item->isDirty() || $item->save();
    }
}
