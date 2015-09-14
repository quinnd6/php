<?php
session_start();
if(isset($_SESSION["manager"])){
    header("location: index.php");
    exit();
}
?>
<?php
//Parse the login form if the user has filled it out and pressed log in
if (isset($_POST["username"])&& isset($_POST["password"])){
    
    $manager = preg_replace('#[^A-Za-z0-9]#i', "", $_POST["username"]); //Filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', "", $_POST["password"]); //Filter everything but numbers and letters
    //Connect to the MySql database
    include "../storescripts/connect_to_mysql.php";
    $sql = mysqli_query($connection, "SELECT id FROM admin WHERE username='$manager' and password='$password' LIMIT 1");//query the person
    //------MAKE SURE PERSON EXISTS IN THE DATABASE-------
    $existCount= mysqli_num_rows($sql);//count the num rows
    if($existCount ==1){//evaluate the count
        while($row = mysqli_fetch_array($sql)){
            $id = $row['id'];
        }
        $_SESSION["id"] = $id;
        $_SESSION["manager"] = $manager;
        $_SESSION["password"] = $password;
        header("location: index.php");
        exit();
    }else {
        echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
        exit;
    }
}
?>
<!Doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv ="Content-Type" content="text/html; charset=utf-8"/>
        <title>Admin Log In</title>
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
    </head>
    
    <body>
        <div align="center" id="mainWrapper">
            <?php include_once("../template_header.php");?>
            <div id="pageContent"><br />
                <div align="left" style="margin-left:24px;">
                    <h2>Please login to Manage the Store</h2>
                    <form id="form1" name="form1" method="post" action="admin_login.php">
                        User Name: <br/>
                        <input name="username" type="text" id="username" size="40" />
                        <br/> <br/>
                        Password: <br/>
                        <input name="password" type="password" id="password" size="40" />
                        <br/>
                        <br/>
                        <br/>
                        
                            <input type="submit" name="button" id="button" value="Log In"/>
                       
                    </form>
                    <p>&nbsp;</p>
                 </div>
                <br/>
                <br/>
                <br/>
                </div>
                    <?php include_once("../template_footer.php"); ?>
           </div>
    </body>
</html>