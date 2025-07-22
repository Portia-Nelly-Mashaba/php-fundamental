<?php

namespace App\Http\Controllers;

class FixScriptController extends Controller
{
    public function index()
    {
        $scripts = [
            [
                'title' => 'Script 1: Variable & Syntax Errors',
                'route' => route('show-script', 1),
                'description' => 'Fix variable naming and basic syntax issues',
                'icon' => 'fa-code'
            ],
            [
                'title' => 'Script 2: Type Validation',
                'route' => route('show-script', 2),
                'description' => 'Correct type handling and conditionals',
                'icon' => 'fa-check-double'
            ],
            [
                'title' => 'Script 3: Logic Errors',
                'route' => route('show-script', 3),
                'description' => 'Fix semicolon issues and undefined variables',
                'icon' => 'fa-brain'
            ],
            [
                'title' => 'Script 4: Security Issues',
                'route' => route('show-script', 4),
                'description' => 'Address XSS vulnerabilities and output handling',
                'icon' => 'fa-shield-halved'
            ]
        ];

        return view('debugging.index', compact('scripts'));
    }

    public function showScript($script)
    {
        $scriptData = $this->getScriptData($script);
        
        if (!$scriptData) {
            abort(404);
        }

        return view('debugging.show', [
            'script' => $scriptData,
            'scriptNumber' => $script
        ]);
    }

    protected function getScriptData($scriptNumber)
    {
        $scripts = [
            1 => $this->getScript1Data(),
            2 => $this->getScript2Data(),
            3 => $this->getScript3Data(),
            4 => $this->getScript4Data()
        ];

        return $scripts[$scriptNumber] ?? null;
    }

    // Script 1 Methods
    protected function getScript1Data()
    {
        return [
            'original' => <<<'EOD'
            <?php
            $usr = [
              "name" => "Lebo",
              "age" => 25,
              "membership" => true
            ];

            echo "Welcome, " . $user["name"] . "!";
            echo "You are " . $user["age"] " years old.";
            echo "Membership status is: " . $membership;
            if ($usr["membership"] = true) {
              echo " (Active)";
            }
            ?>
            EOD,
            'fixed' => <<<'EOD'
            <?php
            $usr = [
              "name" => "Lebo",
              "age" => 25,
              "membership" => true
            ];

            echo "Welcome, " . $usr["name"] . "!\n";
            echo "You are " . $usr["age"] . " years old.\n";
            echo "Membership status is: " . ($usr["membership"] ? "Active" : "Inactive");
            if ($usr["membership"] == true) {
              echo " (Verified)";
            }
            ?>
            EOD,
            'output' => $this->runScript1(),
            'explanation' => "1. Fixed variable name from \$user to \$usr\n"
                          . "2. Added missing concatenation operator\n"
                          . "3. Corrected undefined \$membership variable\n"
                          . "4. Changed assignment (=) to comparison (==)"
        ];
    }

    protected function runScript1()
    {
        ob_start();
        $usr = ["name" => "Lebo", "age" => 25, "membership" => true];
        echo "Welcome, " . $usr["name"] . "!\n";
        echo "You are " . $usr["age"] . " years old.\n";
        echo "Membership status is: " . ($usr["membership"] ? "Active" : "Inactive");
        if ($usr["membership"] == true) echo " (Verified)";
        return ob_get_clean();
    }

    // Script 2 Methods
    protected function getScript2Data()
    {
        return [
            'original' => <<<'EOD'
            <?php
            $user = [
              "name" => "Fatima",
              "age" => "twenty-five",
              "membership" => "yes"
            ];

            if (is_int($user["age"]) == false)
              echo "Age: " . $user["age"];
            ?>
            EOD,
            'fixed' => <<<'EOD'
            <?php
            $user = [
              "name" => "Fatima",
              "age" => "twenty-five",
              "membership" => "yes"
            ];

            if (!is_numeric($user["age"])) {
                echo "Age must be a number, but got: " . htmlspecialchars($user["age"]);
            } else {
                echo "Age: " . (int)$user["age"];
            }
            
            echo "\nMembership: " . ($user["membership"] === "yes" ? "Active" : "Inactive");
            ?>
            EOD,
            'output' => $this->runScript2(),
            'explanation' => "1. Added proper type validation with is_numeric()\n"
                          . "2. Added HTML output sanitization\n"
                          . "3. Added proper membership status check\n"
                          . "4. Improved code structure with braces"
        ];
    }

    protected function runScript2()
    {
        ob_start();
        $user = ["name" => "Fatima", "age" => "twenty-five", "membership" => "yes"];
        
        if (!is_numeric($user["age"])) {
            echo "Age must be a number, but got: " . htmlspecialchars($user["age"]);
        } else {
            echo "Age: " . (int)$user["age"];
        }
        
        echo "\nMembership: " . ($user["membership"] === "yes" ? "Active" : "Inactive");
        return ob_get_clean();
    }

    // Script 3 Methods
    protected function getScript3Data()
    {
        return [
            'original' => <<<'EOD'
            <?php
            $user = [
              "name" => "Musa",
              "age" => 29,
              "membership" => false
            ];

            echo "Hello, $user[name]!";
            echo "Your email is: $user[email]";
            if ($user["membership"] == false); {
              echo "Membership is inactive.";
            }
            echo "Age: " $user["age"];
            ?>
            EOD,
            'fixed' => <<<'EOD'
            <?php
            $user = [
              "name" => "Musa",
              "age" => 29,
              "membership" => false,
              "email" => null
            ];

            echo "Hello, " . $user["name"] . "!\n";
            echo "Your email is: " . ($user["email"] ?? "not provided") . "\n";
            if ($user["membership"] == false) {
              echo "Membership is inactive.\n";
            }
            echo "Age: " . $user["age"];
            ?>
            EOD,
            'output' => $this->runScript3(),
            'explanation' => "1. Added missing email field\n"
                          . "2. Fixed string concatenation syntax\n"
                          . "3. Removed erroneous semicolon after if condition\n"
                          . "4. Added proper null coalescing for email check\n"
                          . "5. Added missing concatenation operator for age"
        ];
    }

    protected function runScript3()
    {
        ob_start();
        $user = ["name" => "Musa", "age" => 29, "membership" => false, "email" => null];
        
        echo "Hello, " . $user["name"] . "!\n";
        echo "Your email is: " . ($user["email"] ?? "not provided") . "\n";
        if ($user["membership"] == false) {
            echo "Membership is inactive.\n";
        }
        echo "Age: " . $user["age"];
        return ob_get_clean();
    }

    // Script 4 Methods
    protected function getScript4Data()
    {
        return [
            'original' => <<<'EOD'
            <?php
            $user = [
              "name" => "<script>alert('Jane');</script>",
              "age" => 30,
              "email" => "jane@example.com",
              "membership" => true
            ];

            echo "Name: " . $user['name'] . "<br>";
            echo "Age: " . $user['age'] . "<br>";
            if ($user["membership"]) {
              echo "Active Member"; 
            } else {
              echo "Inactive Member";
            }

            echo "Email: " . isset($user["email"]) ? $user["email"] : "Not provided";
            echo "Account status: " . $user["membership"] == true ? "Active" : "Inactive";
            ?>
            EOD,
            'fixed' => <<<'EOD'
            <?php
            // Simulated user input
            $user = [
                "name" => "<script>alert('Jane');</script>",
                "age" => 30,
                "email" => "jane@example.com",
                "membership" => true
            ];

            // FIX 1: Escape HTML special characters to prevent XSS
            echo "Name: " . htmlspecialchars($user['name']) . "<br>";

            // FIX 2: Basic age output is fine
            echo "Age: " . $user['age'] . "<br>";

            // FIX 3: Output membership status clearly
            echo $user["membership"] ? "Active Member<br>" : "Inactive Member<br>";

            // FIX 4: Group ternary condition with parentheses for correct evaluation
            echo "Email: " . (isset($user["email"]) ? $user["email"] : "Not provided") . "<br>";

            // FIX 5: Parentheses ensure correct logical grouping in this ternary
            echo "Account status: " . ($user["membership"] == true ? "Active" : "Inactive");
            ?>
            EOD,
            'output' => $this->runScript4(),
            'explanation' => "1. htmlspecialchars() is needed to sanitize user input (prevents XSS)\n"
                          . "2. Ternary expressions lacked parentheses, causing incorrect logic\n"
                          . "3. isset() needed grouping to avoid returning the wrong value\n"
                          . "4. Simplified membership status output\n"
                          . "5. Added clear comments for each fix"
        ];
    }

    protected function runScript4()
    {
        ob_start();
        // Simulated user input
        $user = [
            "name" => "<script>alert('Jane');</script>",
            "age" => 30,
            "email" => "jane@example.com",
            "membership" => true
        ];

        // FIX 1: Escape HTML special characters to prevent XSS
        echo "Name: " . htmlspecialchars($user['name']) . "<br>";

        // FIX 2: Basic age output is fine
        echo "Age: " . $user['age'] . "<br>";

        // FIX 3: Output membership status clearly
        echo $user["membership"] ? "Active Member<br>" : "Inactive Member<br>";

        // FIX 4: Group ternary condition with parentheses for correct evaluation
        echo "Email: " . (isset($user["email"]) ? $user["email"] : "Not provided") . "<br>";

        // FIX 5: Parentheses ensure correct logical grouping in this ternary
        echo "Account status: " . ($user["membership"] == true ? "Active" : "Inactive");
        return ob_get_clean();
    }
}