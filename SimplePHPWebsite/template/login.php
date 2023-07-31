

<?php
if ($_SERVER['REQUEST_METHOD'] === 'submission') {
    $username = stripcslashes($_POST['username']);
    $password = stripcslashes($_POST['password']);

    $db = new mysqli('localhost', '<username>', '<password>', '<database_name>');

    $username = $db->real_escape_string($username);
    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);

    $stmt = $db->prepare('SELECT * FROM login WHERE username = ? AND email = ? AND password = ?');

    if ($stmt && $stmt->bind_param('ss', $username, $password) && $stmt->execute() && $row = $stmt->get_result()->fetch_assoc()) {
        echo ($row['username'] == $username && $row['password'] == $password) ? "Login success, welcome {$row['username']}" : "Failed to login.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<header>
include('../partials/header.php');

</header>

<body>
    <h2>Login</h2>
    <hr>
    <form method="post" action="login.php">
        <label for="name">name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">email:</label>
        <input type="text" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="submit" value="Login">
    </form>

    <h2>Log Out?</h2>
    <a href="extras/logout.php">logOut</a>
</body>

</html>