<?php

use PhpOption\Option;

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     * This is a modified version of
     * https://github.com/laravel/framework/blob/a7f454c4d4b84fd7a1e18f77cfbc38d032481936/src/Illuminate/Support/Env.php#L66-L100
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return Option::fromValue($_ENV[$key] ?? $default)
            ->map(function ($value) {
                switch (strtolower($value)) {
                    case 'true':
                    case '(true)':
                        return true;
                    case 'false':
                    case '(false)':
                        return false;
                    case 'empty':
                    case '(empty)':
                        return '';
                    case 'null':
                    case '(null)':
                        return;
                }

                if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
                    return $matches[2];
                }

                return $value;
            })
            ->getOrCall(fn () => $default);
    }
}