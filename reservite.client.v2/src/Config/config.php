<?php

namespace App\Config;

class Config
{
    private $settings;

    public function __construct()
    {
        $this->settings = parse_ini_file(__DIR__ . '/../../config/config.ini', true);
    }

    public function get($section, $key)
    {
        if (isset($this->settings[$section][$key])) {
            return $this->settings[$section][$key];
        }

        throw new \Exception("Key '{$key}' not found in section '{$section}'");
    }
}

?>