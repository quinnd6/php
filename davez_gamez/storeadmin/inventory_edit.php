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
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
    
	$pid = mysqli_real_escape_string($connection,$_POST['thisID']);
        $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
	$price = mysqli_real_escape_string($connection,$_POST['price']);
	$category = mysqli_real_escape_string($connection,$_POST['category']);
	$subcategory = mysqli_real_escape_string($connection,$_POST['subcategory']);
	$details = mysqli_real_escape_string($connection,$_POST['details']);
	// See if that product name is an identical match to another product in the system
	$sql = mysqli_query($connection,"UPDATE products SET product_name='$product_name', details='$details', category='$category', subcategory='$subcategory', price='$price' 
        WHERE id='$pid'");
        if($_FILES['fileField']['tmp_name']!=""){
            // Place image in the folder 
            $newname = "$pid.jpg";
            $host= getenv('HTTP_HOST');
            move_uploaded_file( $_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
            $sql = mysqli_query($connection,"UPDATE PRODUCTS  SET picurl1 = 'inventory_images/$newname' WHERE id='$pid'"); 
        }
        header("location: inventory_list.php"); 
        exit();
}
?>
<?php
//Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
    $targetID = $_GET['pid'];
    $sql = mysqli_query($connection,"SELECT * FROM products WHERE id = '$targetID' LIMIT 1");
    $productCount= mysqli_num_rows($sql);//count the output amount
    if($productCount > 0){
        while($row = mysqli_fetch_array($sql)){
          
           $product_name = $row["product_name"];
           $price = $row["price"];
           $category = $row["category"];
           $subcategory = $row["subcategory"];
           $details = $row["details"];
           $date_added = strftime("%b %d %Y", strtotime($row["date_added"]));
        }   
    }else{
        echo "Sorry there is no product existing with this ID";
        exit();
    }
}
?>
<!Doctype html>
<html>
<head>
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
                </div>
                <a name="inventoryForm" id="InventoryForm"></a>
                <h3>
                    Edit Inventory Item Form
                </h3>
                <form action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
                <table width="90%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="20%" align="right">Product Name</td>
                      <td width="80%">
                          <label>
                             <input name="product_name" type="text" id="product_name" required size="80"  value = "<?php echo $product_name;?>"/>
                          </label></td>
                    </tr>
                    <tr>
                      <td align="right">Product Price</td>
                      <td><label>
                        &euro;
                        <input name="price" type="text" id="price" size="15" maxlength="12"  value = "<?php echo $price;?>"/>
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right">Category</td>
                      <td><label>
                        <select name="category" id="category">
                        <option value="<?php echo $category ?>"><?php echo $category; ?></option>
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
                                <option value="<?php echo $subcategory ?>"><?php echo $subcategory; ?></option>
                                <option value="New">New</option>
                                <option value="Used">New</option>
                          </select></td>
                    </tr>
                    <tr>
                      <td align="right">Product Details</td>
                      <td><label>
                        <textarea name="details" id="details" cols="64" rows="5"><?php echo $details;?></textarea>
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
                        <input name="thisID" type="hidden" value="<?php echo $targetID;?>"/>
                        <input type="submit"  name="button" id="button" value="Make Changes"  />
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
