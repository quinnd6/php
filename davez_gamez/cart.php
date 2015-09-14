<?php
    session_start(); //Start session first thing in script
    //Script Error Reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    //Connect to the MySQL database
     include_once ('core/class.ManageDatabase.php');
?>
<?php
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
?>

<?php include_once( 'views/header.php' ); ?>
<div id="content">
    <?php
/////////////////////////////////////////////////////////////////////////////////////////////
//      Section 1(if user attempts to add something to the cart from the product page)
////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $wasFound = false;
    $i = 0;
    //If the cart session variable is not set or cart array is empty
    if(!isset($_SESSION["cart_array"])||count($_SESSION["cart_array"])<1){
        //RUN IF THE CART IS EMPTY OR NOT SET
        $_SESSION["cart_array"] = array(0=>array("item_id"=>$pid,"quantity"=>1));  //start array with an index of 1
    }else{
        //RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
        foreach($_SESSION["cart_array"] as $each_item){
            $i++;
            while(list($key, $value) = each($each_item)){
                if($key=="item_id" && $value==$pid){
                //That item is in the cart already so let's adjust its quantity using array_splice
                array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id"=>$pid, "quantity" => $each_item["quantity"]+1)));
                $wasFound = true;
                }//close if condition
            }//close while loop
        }//close foreach loop
        if($wasFound == false){
            array_push($_SESSION["cart_array"], array("item_id"=>$pid, "quantity"=>1));  //puts item at the end of array
        }
    }
    header("location: cart.php");
    exit();
}
?>
<?php
////////////////////////////////////////////////////////////////////////
//      Section 2(if user chooses to empty their shopping cart)
///////////////////////////////////////////////////////////////////////
if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart"){
    unset($_SESSION["cart_array"]);
}
?>
<?php
////////////////////////////////////////////////////////////////////////
//      Section 3(if user chooses to adjust item quantity)
///////////////////////////////////////////////////////////////////////
if(isset($_POST['item_to_adjust']) && $_POST['item_to_adjust']!=""){
   //execute some code
   $item_to_adjust = $_POST['item_to_adjust'];
   $quantity = $_POST['quantity'];
   $quantity = preg_replace('#[^0-9]#i', '', $quantity); //Filter everything but numbers 
   if($quantity >= 100){
       $quantity = 99;
   }
   if($quantity < 1){
       $quantity = 1;
   }
   if($quantity == "")
   {
       $quantity = 1;
   }
   $i = 0;
   foreach($_SESSION["cart_array"] as $each_item){
            $i++;
            while(list($key, $value) = each($each_item)){
                if($key=="item_id" && $value==$item_to_adjust){
                //That item is in the cart already so let's adjust its quantity using array_splice
                array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id"=>$item_to_adjust, "quantity" => $quantity)));
                }//close if condition
            }//close while loop
    }//close foreach loop
    header("location: cart.php");
    exit();
}
?>
<?php
////////////////////////////////////////////////////////////////////////
//      Section 4(if user wants to remove an item from cart)
///////////////////////////////////////////////////////////////////////
if(isset($_POST['index_to_remove'])&&$_POST['index_to_remove']!=""){
    //Access the array and run code to remove that array index
    $key_to_remove = $_POST['index_to_remove'];
    if(count($_SESSION["cart_array"])<=1){
        unset($_SESSION["cart_array"]);
    }else{
        unset($_SESSION["cart_array"]["$key_to_remove"]);
        sort($_SESSION["cart_array"]);
    }
}
?>
 
   <?php
////////////////////////////////////////////////////////////////////////
//      Section 5(render the cart for the user to view on the page)
////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if(!isset($_SESSION["cart_array"])||count($_SESSION["cart_array"])<1){
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else{
    //Start PayPal Checkout Button
    $i = 0;
    $pp_checkout_btn .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="quinnd6-facilitator@msn.com">';
    //Start the For Each loop
    foreach($_SESSION["cart_array"] as $each_item){
        $item_id = $each_item['item_id'];
        $sql = $init->link->query("SELECT * FROM products WHERE id='$item_id' LIMIT 1");
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $product_name = $row["product_name"];
            $price = $row["price"];
            $details = $row["details"];
            $category = $row["category"];
        }
        $priceTotal = $price * $each_item['quantity'];
        $cartTotal = $priceTotal + $cartTotal;
        //set money value to have 2 decimal values to the right side of the decimal point
        setlocale(LC_MONETARY, "en_IE");
        $priceTotal = $priceTotal;//asEuros($priceTotal);
        //Dynamic Checkout button Assembly
        $x = $i + 1;
        $pp_checkout_btn .= '<input type="hidden" name="item_name_'. $x . '" value="'. $product_name . '">
        <input type="hidden" name="amount_'. $x . '" value="'. $price . '">
        <input type="hidden" name="quantity_'. $x . '" value="'. $each_item['quantity'] . '">';
        //Create the product array variable
        $product_id_array .= "$item_id-" . $each_item['quantity']. ",";
        //Dynamic table row assemby
        $cartOutput .= '<tr>';
        $cartOutput .= '<td><a href="'.$category.'&id=' .$item_id .'">'. $product_name . '</a><br /><img src="inventory_images/' .$item_id . '.jpg" alt="' . $product_name . '" width="40" height="52" border="1"/></td>';
        $cartOutput .= '<td>'. $details.'</td>';
        $cartOutput .= '<td>&euro;'. $price.'</td>';
        $cartOutput .= '<td><form action="cart.php" method="post">
           <input type="text" name="quantity" value="'. $each_item['quantity'].'" size="1" maxlength="2" />
           <input name="adjustBtn' . $item_id .'" type="submit" value="change" />
           <input name="item_to_adjust" type="hidden" value="' . $item_id .'" />
           
           </form></td>';
       // $cartOutput .= '<td>'. $each_item['quantity'].'</td>';
        $cartOutput .= '<td>&euro;'. $priceTotal.'</td>';
        $cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id .'" type="submit" value="X" />
            <input name="index_to_remove" type="hidden" value="' . $i .'" />
                </form></td>';
        $cartOutput .= '</tr>';
        $i++;
    }
    $cartTotal = $cartTotal;//asEuros($cartTotal);
    $cartTotal = "<div align='right'>Cart Total : &euro;". $cartTotal . "</div>";
    //Finish the Paypal Checkout Btn
    $pp_checkout_btn .= ' <input type="hidden" name="custom" value="'. $product_id_array . '">
        <input type="hidden" name="notify_url" value="http://davezgamez.byethost3.com/myonlinestore/storescripts/my_ipn.php">
        <input type="hidden" name="return" value="http://davezgamez.byethost3.com/myonlinestore/checkout_complete.php">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="cbt" value="Return to the Store">
        <input type="hidden" name="cancel_return" value=http://davezgamez.byethost3.com/davez_gamez/">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make Payments with Paypal - its fast, free and secure">
';
}
//echo $cartOutput;
?>
    <table width="100%" border="1" cellspacing="0" cellpadding="6">
                    <tr>
                        <td width="18%" bgcolor="#C5DFFA"><strong>Product</strong></td>
                        <td width="47%" bgcolor="#C5DFFA"><strong>Product Description</strong></td>
                        <td width="10%" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
                        <td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
                        <td width="7%" bgcolor="#C5DFFA"><strong>Total</strong></td>
                        <td width="9%" bgcolor="#C5DFFA"><strong>Remove</strong></td>
                    </tr>
                    <?php echo $cartOutput; ?>
<!--                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>      -->
                </table>
                <?php echo $cartTotal; ?>
                <br />
               <br/>
               <?php echo $pp_checkout_btn; ?>
               <br />
               <br />
               <a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
    
    
</div>
<div id="horizontalnav">
                <div class="navlinks">
                    <ul>
                        <li><a href="games">Games</a></li>
                        <li><a href="consoles">Consoles</a></li>
                        <li><a href="accessories">Accessories</a></li>
                        <li><a href="other">Other</a></li>
                        <li><a href="contactus">Contact Us</a></li>
                    </ul>
                </div>
 </div>
<div id="footer"> </div> </div>