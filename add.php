<?php
include('header.php');
include('db/connect.php');

$message = ''; // Message holder

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    // Use prepared statements for better security
    $stmt = $conn->prepare("INSERT INTO students (name, email, grade) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $grade);

    if ($stmt->execute()) {
        $message = "<p class='success'>✅ Student added successfully!</p>";
    } else {
        $message = "<p class='error'>❌ Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Student</h2>

    <?php if ($message) echo $message; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="grade" placeholder="Grade" required><br>
        <button type="submit">Submit</button>
    </form>

    <?php include('footer.php'); ?>
</body>
</html>
