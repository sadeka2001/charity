<?php

if (! function_exists('setting')) {

    /**
     * description
     */
    function setting($name, $default = null)
    {
        return \App\Models\Setting::getByName($name, $default);
    }
}
