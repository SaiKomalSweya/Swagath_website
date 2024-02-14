<?php
function processForm() {
    // Establish database connection
    $servername = "localhost";
    $username = "u319392618_contact_us";
    $password = "Swdb@12345";
    $dbname = "u319392618_Swagath";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sub = $_POST['sub'];
        $message = $_POST['message'];

        // Insert data into the database
        $sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$sub', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Form submitted successfully!";
            header("Location: ../index.php?success=true");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: ../index.php?success=true");
        }
    } else {
        echo "Form not submitted.";
    }

    // Close the database connection
    $conn->close();
}

// Call the function to process the form
processForm();
?>
