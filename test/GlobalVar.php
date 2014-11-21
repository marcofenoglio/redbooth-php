<?php
namespace Redbooth\Test;

class GlobalVar
{
    public function getGet($name)
    {
        return filter_var($_GET[$name]);
    }

    public function getPost($name)
    {
        return filter_var($_POST[$name]);
    }

    public static function getEnv($name)
    {
        return filter_var($_ENV[$name]);
    }
}