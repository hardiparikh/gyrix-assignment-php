<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
        
    // checking empty fields
    if(empty($username)  || empty($email)|| empty($password))
    {                
        if(empty($username)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($password)) {
            echo "<font color='red'>password field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($con, "INSERT INTO user_info (username,email, password) VALUES('$username','$email','$password')");
         
    
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='dashboard.php'>View Result</a>";
    }
}
?>
</body>
</html>