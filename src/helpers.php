<?php

use Tungltdev\LaravelSettings\Facades\Settings;

if (!function_exists('settings'))
{
    /**
     * @param string|null $key
     * @param null $default
     * @return mixed|\Tungltdev\LaravelSettings\Facades\Settings
     */
    function settings($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('settings');
        }

        return Settings::get($key, $default);
    }
}

if (!function_exists('settingset'))
{
    /**
     * @param string|null $key
     * @param null $value
     * @return mixed|\Tungltdev\LaravelSettings\Facades\Settings
     */
    function settingset($key = null, $value = null)
    {
        return Settings::set($key, $value);
    }
}
