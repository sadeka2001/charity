<?php

if (! function_exists('getServices')) {

    function getServices()
    {
        return \App\Models\Service::latest('id')->limit(4)->get();
    }

}
