
<?php
if(!empty($_POST['username']) && (!empty($_POST['apiKey']))){
    $username = $_POST['username'];
    $password = $_POST['password'];
   $con = mysqli_connect(hostname "localhost" , username "root" , password " " , database "login_register" )
if ($con)
{
    $sql = "select * from users where username = '".$username."' and apiKey = '".$apiKey."'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)!=0){
        $row = mysqli_fetch_assoc($res);
        $sqlUpdate = "update users set apiKey ='' where  usename = '".$username."'";
        if(empty($_POST['apiKey'])){
          $row['status']="0";
        }
      if(mysqli_query($con, $sqlUpdate)) {
        echo "sucess";
      }  else echo "Logout failed";
    } else echo "Unauthorized to acess";
}               else echo "Database connection failed";

}        else echo "all fields are mandatory"

//echo json_encode($result, flags:JSON_PRETTY_PRINT );