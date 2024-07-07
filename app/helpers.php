<?php

function getLogo()
{
    $settings = \App\Models\Settings::first();
    if ($settings->logo) {
        return asset('storage/' . $settings->logo);
    } else {
        return asset('images/bu-logo-2020-ar.webp');
    }
}
function getLogo32()
{
    $settings = \App\Models\Settings::first();
    if ($settings->logo32) {
        return asset('storage/' . $settings->logo32);
    } else {
        return asset('images/logo32.webp');
    }
}

function getCover()
{
    $settings = \App\Models\Settings::first();
    if ($settings->cover) {
        return asset('storage/' . $settings->cover);
    }
    return false;
}

function getTitle()
{
    $settings = \App\Models\Settings::first();
    if ($settings->title) {
        return $settings->title;
    }else{
    return 'كلية الباحة الاهلية';
    }
}

?>