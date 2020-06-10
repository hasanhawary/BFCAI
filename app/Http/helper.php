<?php

if (!function_exists('aurl')) {
    function aurl($url = null)
    {
        return url('admin/' . $url);
    }
}
if (!function_exists('iurl')) {
    function iurl($url = null)
    {
        return url('instructor/' . $url);
    }
}
if (!function_exists('surl')) {
    function surl($url = null)
    {
        return url(app()->getLocale() . '/student/' . $url);
    }
}

if (!function_exists('instructor')) {
    function instructor()
    {
        return auth()->guard('instructor')->user();
    }
}
if (!function_exists('student')) {
    function student()
    {
        return auth()->guard('web')->user();
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin')->user();
    }
}

/////// Validate Helper Functions ///////
if (!function_exists('v_image')) {
    function v_image($ext = null)
    {
        if ($ext === null) {
            return 'image|mimes:jpg,png,jpeg,png,gif,bmp';
        } else {
            return 'image|mimes:' . $ext;
        }
    }
}
/////// Validate Helper Functions ///////

if (!function_exists('up')) {
    function up()
    {
        return new \App\Http\Controllers\Upload;
    }
}
