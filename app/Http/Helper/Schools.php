<?php

if (!function_exists('permissions')) {

    /**
     * @return mixed
     */
    function getSchools(): mixed
    {
        return App\Models\School::get();
    }
}
?>
