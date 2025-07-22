<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $activities = [
            [
                'title' => 'User Profile Generator',
                'route' => route('profile-generator'),
                'description' => 'Generate multiple formatted sentences from user data with type validation and default handling.'
            ],
            [
                'title' => 'Debugging Challenge',
                'route' => route('debugging-challenge'),
                'description' => 'Practice identifying and fixing common PHP errors in broken scripts.'
            ],
            [
                'title' => 'Access Control Logic',
                'route' => route('access-control', ['role' => 'admin']),
                'description' => 'Role-based access control demonstration',
                'icon' => 'fa-lock'
            ]
        ];

        return view('home', compact('activities'));
    }
}