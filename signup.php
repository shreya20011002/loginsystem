<?php
if(!empty($_POST['username']) && !empty($_POST['password'])){

    $con = mysqli_connect(hostname "localhost" , username "root" , password " " , database "login_register" )
 $username = $_POST['username'];
 $password = password_hash($_POST['password'] , algo:PASSWORD_DEFAULT);


if($con)
{
    $sql = "insert into users (username,password) values ('".$username."','".$password."')";
    if(mysqli_query($con,$sql))
    {
        echo "sucess";
    } else echo "Registration failed";
}
else echo "Database connection failed";
}

else echo "All fields are  required";

?>