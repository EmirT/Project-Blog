<?php

namespace wwww\tests\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogmvc;charset=utf8', 'root', '');
        return $db;
    }
}