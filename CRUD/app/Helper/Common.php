<?php


// guard
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
