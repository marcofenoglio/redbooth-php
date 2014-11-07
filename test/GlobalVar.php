<?php
namespace Redbooth\Test;

class GlobalVar
{
    public function getGet($name)
    {
        return filter_input(INPUT_GET, $name);
    }

    public function getPost($name)
    {
        return filter_input(INPUT_POST, $name);
    }

    public static function getEnv($name)
    {
        return filter_input(INPUT_ENV, $name);
    }
}