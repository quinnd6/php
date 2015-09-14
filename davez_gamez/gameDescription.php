<?php //include_once( 'views/header.php' );
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    
   
        $id = $_GET['gamesid'];
        $data = $init->getGameDescription($id);
    
    
     
       
?>

<div id="content">
    <div id ="boxed_item">
<?php
            if($data !== 0)
            {
                while ($row = $data->fetch()) {
                    echo '<img src="'.htmlspecialchars($row['picurl1'], ENT_HTML5, 'UTF-8', false).'" alt=""  />'.'<br>';
                    echo htmlspecialchars($row['name'], ENT_HTML5, 'UTF-8', false).'<br/>';
                    echo '<pre>'.htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false).'<br/>'.'</pre>';
                    echo '<div id="price">Price: &euro;'.htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false).' unless stated otherwise above.<br/></div>';
                    $name = $row['name'];
                    $price = $row['price'];
                    $id = $row['id'];
                }
               
               
            }
         
  ?>
        
        
        
         <script src="paypal-button.min.js?merchant=quinnd6-facilitator@msn.com"
    data-button="buynow"
    data-name="<?php echo $name ?>"
    data-amount="<?php echo $price ?>"
    data-currency="EUR"
    data-shipping="3.40"
     data-env="sandbox"
    async
></script>
        <br>
       <form id="form1" name="form1" method="post" action="cart.php">
                                <input type="hidden" name="type" id="type" value="game"/>
                                <input type="hidden" name="pid" id="pid" value="<?php echo $id;?>"/>
                                <input type="submit" name="button" id="button" value="Add to Shopping Cart"/>
                            </form>
        <a href="games" target="_blank">Back to Games page</a>
    </div>
    
</div>

    
