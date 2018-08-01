<?php


// guard
use Illuminate\Support\Facades\Auth;

// guard
if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
        if(Auth::check()) {
            return Auth::guard('admin')->user();
        }
    }
}

