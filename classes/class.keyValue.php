<?php

class keyValue {
    private static $kv = Array();
    protected static $self;

    public function __construct()
    {
        /*
         * stop the 'new' keyword from being able to instantiate class
         */
    }

    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new keyValue();
        }
        return $inst;
    }

    public function register($key, $value)
    {
        self::$kv[$key] = $value;
    }

    public function retreive($key)
    {
        return self::$kv[$key];
    }

} 