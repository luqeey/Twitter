<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'John Doe',
                'vek' => 25,
            ],
            [
                'name' => 'Playboi Carti',
                'vek' => 26,
            ],
            [
                'name' => 'Misko Jackson',
                'vek' => 12,
            ],
        ];

        return view('dashboard',
            [
                'users' => $users,
            ]
        );
    }
}
