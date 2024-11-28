<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the input fields are set and not empty
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Prepare the SQL query to prevent SQL injection
    $query = mysqli_query($conn, "INSERT INTO todoapp (Name, Email, Address) VALUES ('$name', '$email', '$address')");
    
    if ($query) {
        echo "<script>alert('Successfully created record')</script>";
        echo "<script type='text/javascript'> document.location = 'view.php'; </script>";
    } else {
        echo "<script>alert('There was an error')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create User</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white w-25 rounded p-3">
            <h2>Fill Form</h2>
            <form method="POST">
                <div class="mb-2">
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required />
                </div>
                <div class="mb-2">
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required />
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="address" placeholder="Enter address" required />
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
</body>
</html>
