<?php

namespace Enp\ReserviteClientV2\Config;

class Config
{
    private $settings;

    public function __construct()
    {
        echo 'holaaaaaaa<br>';
        echo file_get_contents(__DIR__ . '\config.ini');
        //var_dump(__DIR__ . '\config.ini');

        $this->settings = parse_ini_file(__DIR__ . '/../../src/Config/config.ini', true);
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