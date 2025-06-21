<?php
include('header.php');
include('db/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Student Records</h2>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Grade</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM students");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['grade']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No records found.</td></tr>";
    }

    $conn->close();
    ?>
  </table>

  <?php include('footer.php'); ?>
</body>
</html>
