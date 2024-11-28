<?php
   include('dbconn.php'); 
   if(isset($_GET['delid'])){
       $id = $_GET['delid'];
       $sql = mysqli_query($conn, "DELETE FROM todoapp WHERE ID='$id'");

       if ($sql) {
           echo "<script>alert('Record deleted')</script>";
           echo "<script type='text/javascript'> document.location = 'view.php'; </script>";
       } else {
           echo "<script>alert('There was an error')</script>";
       }
   }
?>
