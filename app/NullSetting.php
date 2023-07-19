<?php

namespace App;

use App\Models\Setting;

class NullSetting extends Setting
{
    protected $attributes = [
        'site_title' => 'Default Site Title',
        'site_name' => 'Default Site Name',
        'site_email' => 'default@gmail.com',
        'footer_text' => 'default footer text',
        'sidebar_collapse' => false,
    ];
}