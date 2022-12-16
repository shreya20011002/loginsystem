<?php
if(!empty($_POST['username']) && (!empty($_POST['apiKey']))){
    $username = $_POST['username'];
    $password = $_POST['password'];
   $result = array();
   $con = mysqli_connect(hostname "localhost" , username "root" , password " " , database "login_register" )
if ($con)
{
    $sql = "select * from users where username = '".$username."' and apiKey = '".$apiKey."'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)!=0){
        $row = mysqli_fetch_assoc($res);
        $result = array("status" => "sucess", "message" => "Data fetched sucessfuly",
        "username" => $row['username'], "apiKey" => $row['apiKey']);
    }        else $result =array("status" => "failed" , "message" => "Unauthorized acess");

}               else $result =array("status" => "failed" , "message" => "Database connection failed ");

}        else $result =array("status" => "failed" , "message" => "All fields mandatory ");

echo json_encode($result, flags:JSON_PRETTY_PRINT );