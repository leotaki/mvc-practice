<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
    public function index()
    {
        View::renderTemplate('admin/home/index.html');
    }
}
