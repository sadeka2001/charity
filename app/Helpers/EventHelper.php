<?php

if (! function_exists('getEvents')) {

    function getEvents()
    {
        return \App\Models\Event::latest('id')->limit(4)->get();
    }

}
