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
    function env(string $key, mixed $default = null): mixed
    {
        return Option::fromValue($_ENV[$key] ?? $default)
            ->map(function ($value) {
                $result = match(strtolower($value)) {
                    'true', '(true)' => true,
                    'false', '(false)' => false,
                    'empty', '(empty)' => '',
                    'null', '(null)' =>  null,
                    default => $value,
                };

                if (!is_null($result) && preg_match('/\A([\'"])(.*)\1\z/', $result, $matches)) {
                    return $matches[2];
                }

                return $result;
            })
            ->getOrCall(fn () => $default);
    }
}