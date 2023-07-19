<?php

use App\Models\Setting;
use App\NullSetting;

function setting($key)
{
    $setting = Cache::rememberForever('setting', function() {
        return Setting::first() ?? NullSetting::make(); // menampilkan data pertama dari tabel setting
    });

    if($setting){
        return $setting->{$key};
    }
}