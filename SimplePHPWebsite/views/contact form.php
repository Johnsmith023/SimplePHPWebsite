<?php
?>
<form method="POST" action="process_contact_form.php">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br>
  <label for="message">Message:</label>
  <textarea id="message" name="message" required></textarea><br>
  <button type="submit">Submit</button><br>
  
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if (empty($name) || empty($email) || empty($message)) {
    // Redirect back to the form page with an error message
    header("Location: contact.php?error=required_fields");
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Redirect back to the form page with an error message
    header("Location: contact.php?error=invalid_email");
    exit;
  }

  // Simulate processing the form data (e.g., saving to a database)
  // ...

  // Redirect to the thank you page
  header("Location: thank_you.php");
  exit;
}
?>