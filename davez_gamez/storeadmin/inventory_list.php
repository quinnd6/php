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
<?php
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
//Delete Item Question to Admin and Delete Product if they choose
if (isset($_GET['deleteid'])) {
    echo 'Do you really want to delete product with ID of '. $_GET['deleteid'].'?<a href="inventory_list.php?yesdelete='.$_GET['deleteid'].'">Yes</a>|<a href="inventory_list.php">No</a>';
    exit();
}
if (isset($_GET['yesdelete'])) {
    //remove item from system and delete its picture
    //delete from database
    $id_to_delete = $_GET['yesdelete'];
    $sql = mysqli_query($connection, "DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die(mysqli_error($connection));
    //unlink the image from server
    //Remove the pic------------------------------------
    $pictodelete = ("../inventory_images/$id_to_delete.jpg");
    if(file_exists($pictodelete)){
        unlink($pictodelete);
    }
    header("location: inventory_list.php"); 
    exit();
}
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
        $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
	$price = mysqli_real_escape_string($connection,$_POST['price']);
	$category = mysqli_real_escape_string($connection,$_POST['category']);
	$subcategory = mysqli_real_escape_string($connection,$_POST['subcategory']);
	$details = mysqli_real_escape_string($connection,$_POST['details']);
	// See if that product name is an identical match to another product in the system
	$sql = mysqli_query($connection,"SELECT id FROM products WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysqli_num_rows($sql); // count the output amount
        if ($productMatch > 0) {
            echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
            exit();
	}
	// Add this product into the database now
	$sql = mysqli_query($connection,"INSERT INTO products (product_name, price, details, category, subcategory, date_added) 
        VALUES('$product_name','$price','$details','$category','$subcategory',now())") or die (mysql_error());
        $pid = mysqli_insert_id($connection);
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
        $sql = mysqli_query($connection,"UPDATE PRODUCTS WHERE product_name=$product_name SET picurl1 = 'inventory_images/$newname'"); 
	header("location: inventory_list.php"); 
        exit();
}
?>

<?php
//This block grabs the whole list for viewing
$product_list = "";
$sql = mysqli_query($connection,"SELECT * FROM products ORDER BY date_added DESC");
$productCount= mysqli_num_rows($sql);//count the output amount
if($productCount > 0){
    while($row = mysqli_fetch_array($sql)){
       $id = $row["id"];
       $product_name = $row["product_name"];
       $price = $row["price"];
       $date_added = strftime("%b %d %Y", strtotime($row["date_added"]));
       $product_list .= "Product ID: $id - <strong>$product_name</strong> - &euro;$price - <em>Added $date_added</em> &nbsp; &nbsp; 
           <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a> <br/>";
    }   
}else{
    $product_list = "You have no products available here yet";
}
?>
<!Doctype html>
<html>
    <head>
        <!--
        <script type="text/javascript" language="javascript"> 


function validateMyForm ( ) { 
   var x = document.forms["myForm"]["product_name"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
    </script>
        -->
        
        <meta http-equiv ="Content-Type" content="text/html; charset=utf-8"/>
        <title>Inventory List</title>
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/inventory_list.js"></script>
    </head>
    <body>
        <div align="center" id ="mainWrapper">
            <?php include_once("../template_header.php"); ?>
            <div id="pageContent"><br/>
                <div align="right" style="margin-right:32px; border:1px dotted;"><a href="inventory_list.php#inventoryForm">+Add New Inventory Item</a></div>
                <div align="left" style="margin-left:24px;">
                    <h2>Inventory List</h2>
                    <?php echo $product_list; ?>
                </div>
                <a name="inventoryForm" id="InventoryForm"></a>
                <h3>
                    Add New Inventory Item Form
                </h3>
                <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
                <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="20%" align="right">Product Name</td>
                      <td width="80%">
                          <label>
                             <input name="product_name" type="text" id="product_name" required size="80"  />
                          </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Price</td>
                      <td><label>
                        &euro;
                        <input name="price" type="text" id="price" size="15" maxlength="12" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Category</td>
                      <td><label>
                        <select name="category" id="category">
                        <option value="Games">Games</option>
                        <option value="Consoles">Consoles</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Other">Other</option>
                        </select>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Subcategory</td>
                      <td><select name="subcategory" id="subcategory">
                      
                        <option value="Used">Used</option>
                        <option value="New">New</option>
               
                        </select></td>
                    </tr>
                    <tr>
                      <td align="right">Product Details</td>
                      <td><label>
                        <textarea name="details" id="details" cols="64" rows="5"></textarea>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Image</td>
                      <td><label>
                        <input type="file" name="fileField" id="fileField" />
                      </label></td>
                    </tr>      
                    <tr>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit"  name="button" id="button" value="Add This Item Now"  />
                      </label></td>
                    </tr>
                </table>
                </form>
                
                <br />
            </div>
            <?php include_once("../template_footer.php"); ?>
        </div>
    </body>
    
</html>
