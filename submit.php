<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $attend = $_POST['attend'];

    // Validate form data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($attend)) {
        echo "Please fill out all fields.";
    } else {
        // Save form data to a file (or database)
        $file = 'rsvp.txt'; // Change the filename if needed
        $data = "Name: $name\nEmail: $email\nWill Attend: $attend\n\n";

        // Append data to file
        if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
            echo "Thank you for your RSVP!";
        } else {
            echo "Error saving RSVP.";
        }
    }
} else {
    // Redirect back to the form page if accessed directly
    header("Location: index.html");
    exit;
}
?>
