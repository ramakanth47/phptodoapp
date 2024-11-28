<?php
include('dbconn.php');


$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';

   
    $query = mysqli_query($conn, "UPDATE todoapp SET Name='$name', Email='$email', Address='$address' WHERE ID='$id'");

    if ($query) {
        echo "<script>alert('Data updated successfully'); window.location.href='index.php';</script>";
        
    } else {
        echo "<script>alert('There was an error updating the data'); window.history.back();</script>";
    }
}


if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM todoapp WHERE ID = '$id'");
    $row = mysqli_fetch_array($query);

    if (!$row) {
        echo "<p>User not found.</p>";
        exit;
    }
} else {
    echo "<p>No ID provided.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update User</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white w-25 rounded p-3">
            <h2>Update User</h2>
            <form method="POST" action="update.php?id=<?php echo htmlspecialchars($id); ?>">
                <div class="mb-2">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['Name']); ?>" name="name" placeholder="Enter name" required />
                </div>
                <div class="mb-2">
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($row['Email']); ?>" name="email" placeholder="Enter email" required />
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['Address']); ?>" name="address" placeholder="Enter address" required />
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
