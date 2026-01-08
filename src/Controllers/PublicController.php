<?php

namespace App\Controllers;

class PublicController
{
    public function index()
    {
        $title = 'World News';
        include '../views/page.php';
    }

    public function us()
    {
        $title = 'U.S News';
        include '../views/page.php';
    }
    
    public function tech()
    {
        $title = 'Tech News';
        include '../views/page.php';
    }
}
