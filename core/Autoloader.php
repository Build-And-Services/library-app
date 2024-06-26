<?php

namespace core;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, str_replace('core', '', __DIR__) . $class . '.php');
            if (file_exists($file)) {
                require $file;
                return true;
            }

            return false;
        });
    }
}

Autoloader::register();
