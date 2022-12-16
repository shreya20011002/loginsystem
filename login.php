<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username =$_POST['username'];
    $password = $_POST['password'];
    $result = array();
    $con = mysqli_connect(hostname "localhost" , username " root" , password "", database "login_register" );
    if($con)
    {
        $sql= "select * from users where username = '".$username."'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)!=0)
        {
            $row = mysqli_fetch_assoc($res);
            //if($username == $row['username] && passsword_verify($password , $row['password'])))
            if($username == $row['username'] && password_verify($password , $row['password'])  )
            {
                try
                {
            $apikey = bin2hex(random_bytes(length 23));
                }
                catch(Exception $e) 
                {
                    $apikey = bin2hex(uniqid($username , more_entropy true));
                }
                $sqlUpdate = "update users set apiKey ='".$apikey."' where  username = '".$username."'";
                if(mysqli_query($con,$sqlUpdate))
                {
                    $result = array("status" => "sucess", "message" => "Login sucessful",
                    "username" => $row['username'], "apiKey" => $apiKey);

                }
                if($row['apiKey']== $apiKey)
                {
                    $row['status'] = "1";
                }
                else $result =array("status" => "failed" , "message" => "Login failed try again");
            }
            else $result =array("status" => "failed" , "message" => "Retry with correct email and password ");

        }
        else $result =array("status" => "failed" , "message" => "Retry with correct email and password ");

    }            else $result =array("status" => "failed" , "message" => "Database connection failed ");

}            else $result =array("status" => "failed" , "message" => "All fields mandatory ");


echo json_encode($result, flags:JSON_PRETTY_PRINT );