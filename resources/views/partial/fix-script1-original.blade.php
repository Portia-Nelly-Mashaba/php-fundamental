<?php
// Fixed version
$usr = [
  "name" => "Lebo",
  "age" => 25,
  "membership" => true
];

// Fix 1: Changed $user to $usr to match variable declaration
echo "Welcome, " . $usr["name"] . "!";

// Fix 2: Added concatenation operator (.) between string and variable
echo "You are " . $usr["age"] . " years old.";

// Fix 3: Changed $membership to $usr["membership"] to access array value
echo "Membership status is: " . ($usr["membership"] ? "Active" : "Inactive");

// Fix 4: Changed assignment (=) to comparison (==) in if condition
if ($usr["membership"] == true) {
  echo " (Verified)"; // Added more descriptive status
}
?>