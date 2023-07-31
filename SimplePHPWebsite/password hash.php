<?php
// Replace "your_password_here" with the password you want to hash
$plainPassword = "your_password_here";

// Generate a hashed password using the `password_hash` function
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Display the hashed password
echo "Hashed Password: " . $hashedPassword;
?>
