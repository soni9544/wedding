<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $attend = $_POST['attend'] ?? '';

    // Save data to a file (for demonstration purposes)
    $file = 'rsvp.txt';
    $data = "Name: $name\nEmail: $email\nWill Attend: $attend\n\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect back to the RSVP page
    header("Location: index.html");
    exit();
} else {
    // Handle invalid request method
    http_response_code(405);
    exit("Method Not Allowed");
}
?>
