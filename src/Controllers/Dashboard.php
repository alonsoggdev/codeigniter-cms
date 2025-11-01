<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session('adminUser')
        ];
        return view('admin/dashboard', $data);
    }
}
