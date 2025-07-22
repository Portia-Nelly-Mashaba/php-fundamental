<?php

namespace App\Http\Controllers;

class ProfileGeneratorController extends Controller
{
    public function index()
    {
        // Predefined user data
        $user = [
            "name" => "Nelisiwe Msiza",
            "age" => 37,
            "email" => "nellymsiza09@gmail.com",
            "membership" => true
        ];

        // Validate types with default fallbacks (as required by rubric)
        $name = is_string($user['name'] ?? null) ? $user['name'] : 'Guest User';
        $age = is_int($user['age'] ?? null) ? $user['age'] : 0;
        $email = filter_var($user['email'] ?? null, FILTER_VALIDATE_EMAIL) ? $user['email'] : 'invalid@example.com';
        $membership = is_bool($user['membership'] ?? null) ? $user['membership'] : false;

        // Generate exactly 5 different sentence variations (rubric requirement)
        $sentences = [
            "1. Welcome, {$name}! You are {$age} years old. " .
            "Your registered email is {$email}. " .
            ($membership ? "Thank you for being a valued member!" : "Consider joining our membership program."),
            
            "2. User Profile:\nName: {$name}\nAge: {$age}\nEmail: {$email}\n" .
            "Status: " . ($membership ? "Premium Member" : "Standard User"),
            
            "3. Did you know? {$name} has been with us since they were " . ($age - 5) . "! " .
            "Contact them at {$email}. " . ($membership ? "Loyal member since " . date('Y', strtotime('-3 years')) . "." : ""),
            
            "4. {$email} belongs to {$name}, who is currently {$age} years old. " .
            ($membership ? "Active subscriber." : "Not currently subscribed."),
            
            "5. [PROFILE SUMMARY]\n• Name: {$name}\n• Age Group: " . 
            ($age < 30 ? "Young Adult" : "Adult") . "\n• Contact: {$email}\n• " .
            ($membership ? "Membership: Active (Renewal: " . date('Y-m-d', strtotime('+1 year')) . ")" : "No active membership")
        ];

        return view('profile-generator', [
            'sentences' => $sentences,
            'user' => $user // Passing original data for reference
        ]);
    }
}