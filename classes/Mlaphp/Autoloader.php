<?php
/*
 * This file is part of plucke, a fork of Pluck the easy content management system
 * Copyright (c) pluck team
 * http://www.pluck-cms.org

 * Pluck is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * See docs/COPYING for the complete license.
*/

namespace Mlaphp;

class Autoloader
{
    //instance load method
    public function load($class)
    {
        // strip off any leading namespace separator from php 5.3
        $class = ltrim($class, '\\');
        
        // the eventual filepath
        $subpath = '';
        
        // is there a 5.3 namespace separator
        $pos = strrpos($class, '\\');
        if($pos != false) {
            // convert namespace separators to directory separators
            $ns = substr($class, 0, $pos);
            $subpath = str_replace('\\', DIRECTORY_SEPARATOR, $ns) . DIRECTORY_SEPARATOR;
        
            // remove the namespace portion from the final class name portion
            $class = substr($class, $pos + 1);
        }
        // convert underscores in the class name to directory separators
        $subpath = str_replace('_', DIRECTORY_SEPARATOR, $class);
            
            // the path to our central class location
            $dir = dirname(__DIR__);
            
            // prefix with the central directory location  and suffix with php, ther require it
            $file = $dir . DIRECTORY_SEPARATOR . $subpath . '.php';
            
            require $file;
       
        
        
    }

}