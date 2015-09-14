<?php 
session_start();
if(!isset($_SESSION["manager"])){
    header("location: admin_login.php");
    exit();
}
//Be sure to check that this manager SESSION value is infact in the database
$managerID = preg_replace('#[^0-9]#i', "", $_SESSION["id"]); //Filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', "", $_SESSION["manager"]); //Filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', "", $_SESSION["password"]); //Filter everything but numbers and letters
//Run MySQL query to be sure that this person is an admin and that their password session var equals the database information
//Connect to the MySQL database
include "../storescripts/connect_to_mysql.php";
$sql = mysqli_query($connection, "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' and password='$password' LIMIT 1");//query the person
//------MAKE SURE PERSON EXISTS IN THE DATABASE-------
$existCount= mysqli_num_rows($sql);//count the num rows
if($existCount ==0){//evaluate the count
    echo "Your login session data is not on record in the database";
    exit();
}
?>
<!Doctype html>
<html>
    <head>
        <meta http-equiv ="Content-Type" content="text/html; charset=utf-8"/>
        <title>Store Admin Area</title>
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
    </head>
    <body>
        <div align="center" id ="mainWrapper">
            <?php include_once("../template_header.php"); ?>
            <div id="pageContent"><br/>
                <div align="left" style="margin-left:24px;"><h2>Hello Store Manager, what would you like to do today?</h2>
                    <a href="inventory_list.php">Manage Inventory</a><br/>
                    <a href="#">Manage Blah Blah</a><br/>
                </div>
                <br />
            </div>
            <?php include_once("../template_footer.php"); ?>
        </div>
    </body>
    
</html>
