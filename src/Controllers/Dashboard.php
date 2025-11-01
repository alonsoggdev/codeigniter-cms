<?php

namespace Modules\CMS\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'user' => session('adminUser')
        ];
        return view('admin/pages/dashboard', $data);
    }
}
