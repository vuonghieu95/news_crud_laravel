<?php


// guard
use Illuminate\Support\Facades\Auth;

if (!function_exists('backendGuard')) {

    /**
     * @param string $default
     * @return mixed
     */
    function backendGuard($default = 'admins')
    {
        return Auth::guard(getSystemConfig('backend_guard', $default));
    }
}
// guard
if (!function_exists('getCurrentUser')) {

    /**
     * @param string $default
     * @return mixed
     */
    function getCurrentUser()
    {
        return Auth::user();
    }
}

