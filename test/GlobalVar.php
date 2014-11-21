<?php
namespace Redbooth\Test;

class GlobalVar
{
    public function getGet($name)
    {
        if (!empty($_GET[$name])) {
            return filter_var($_GET[$name]);
        } else {
            return null;
        }
    }

    public function getPost($name)
    {
        if (!empty($_POST[$name])) {
            return filter_var($_POST[$name]);
        } else {
            return null;
        }
    }

    public static function getEnv($name)
    {
        if (!empty($_ENV[$name])) {
            return filter_var($_ENV[$name]);
        } else {
            return null;
        }
    }
}