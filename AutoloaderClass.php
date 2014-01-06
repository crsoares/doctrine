<?php

class AutoloaderClass
{
    public static function initialize()
    {
        spl_autoload_register(__CLASS__ . "::_autoload");
    }
    
    public static function _autoload($class)
    {
        $file = str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\")) . ".php";
        
        if(file_exists($file)) {
            include $file;
        }
    }
}