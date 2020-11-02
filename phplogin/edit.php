<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $username=$_POST['username'];
    $email=$_POST['email']; 
    $password=$_POST['password'];   
    
    // checking empty fields
    if(empty($username) || empty($email)|| empty($password)) {            
        if(empty($username)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
        if(empty($password)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }  

    } else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE user_info SET username='$username',email='$email',password='$password' WHERE id=$id");
        
        
        header("Location: dashboard.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM user_info WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $username = $res['username'];
    $email = $res['email'];
    $password=$res['password'];
}
?>
<html>
<head>    
    <title>Edit Data</title>

    
</head>
 
<body>
    <a href="dashboard.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="1">
            <tr>
                <td>Name</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
        
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>

            <tr>
                <td>password</td>
                <td><input type="text" name="password" value="<?php echo $password;?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>