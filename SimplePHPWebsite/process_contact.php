<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Server-side validation
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all required fields.");
    }

    // Additional email format validation (optional)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }

    // Simulate processing the information (you can replace this with actual database insertion or email sending)
    // For simulation, we'll simply display a "Thank You" page with the user-submitted data
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Thank You</title>
    </head>
    <body>
        <h1>Thank You for Contacting Us!</h1>
        <p>Here is the information you submitted:</p>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Message: <?php echo htmlspecialchars($message); ?></p>
    </body>
    </html>

    <?php
    // End of simulation
}
?>
