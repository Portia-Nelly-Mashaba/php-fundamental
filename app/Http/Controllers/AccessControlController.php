<?php

namespace App\Http\Controllers;

class AccessControlController extends Controller
{
    public function index($role = null)
    {
        $is_logged_in = true; // Simplified for this demo
        $role = $this->validateRole($role);
        
        return view('access-control', [
            'access_level' => $this->getAccessLevel($role, $is_logged_in),
            'role' => $role ?? 'guest'
        ]);
    }
    
    protected function validateRole($role)
    {
        return in_array($role, ['admin', 'editor', 'subscriber']) ? $role : null;
    }
    
    protected function getAccessLevel($role, $is_logged_in)
    {
        if (!$is_logged_in) return "Please log in";
        
        return match($role) {
            'admin'      => "Full Access",
            'editor'     => "Edit Access",
            'subscriber' => "View Access",
            default      => "Invalid role"
        };
    }
}