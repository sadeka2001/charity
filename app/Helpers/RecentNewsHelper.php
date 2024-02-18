<?php

if (! function_exists('getNews')) {

    function getNews()
    {
        return \App\Models\RecentWork::latest('id')->limit(4)->get();
    }

}
