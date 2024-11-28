<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white p-4 w-50 rounded">

           <a href="create.php" class="btn btn-success">Add + </a>
            <h2>Records</h2>
            <table class="table">
              <thead>
                <tr> 
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th> 
                  <th>Action</th>
                </tr>
              </thead> 
              <tbody> 
                <?php
                  
                  include('dbconn.php'); // Make sure this file exists and is named correctly

                  // Check if the connection was successful
                  if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                  }

                  // Query to fetch records
                  $fetch = mysqli_query($conn, "SELECT * FROM todoapp"); 
                  if ($fetch && mysqli_num_rows($fetch) > 0) {
                    while ($r = mysqli_fetch_array($fetch)) {
                        ?>
                        <tr>
                             <td><?php echo htmlspecialchars($r['Name']); ?></td> 
                             <td><?php echo htmlspecialchars($r['Email']); ?></td> 
                             <td><?php echo htmlspecialchars($r['Address']); ?></td> 
                             <td>
                                <a href="update.php?id=<?php echo $r['ID']; ?>" class="btn btn-sm btn-info">Update</a>
                                <a href="delete.php?delid=<?php echo $r['ID']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td> 
                        </tr>
                        <?php
                    } 
                  } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                  }
                ?>
              </tbody> 
            </table>
        </div>
    </div>
</body>
</html>
