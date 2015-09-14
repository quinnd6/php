<?php //include_once( 'views/header.php' );
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    
   
        $id = $_GET['id'];
        $data = $init->getDescription($id);
    
    
     
       
?>
<div id="content">
    <div id ="boxed_item">
    
<?php
            if($data !== 0)
            {
                while ($row = $data->fetch()) {
                    echo '<img src="'.htmlspecialchars($row['picurl1'], ENT_HTML5, 'UTF-8', false).'" alt=""  />'.'<br>';
                    echo htmlspecialchars($row['product_name'], ENT_HTML5, 'UTF-8', false).'<br/>';
                    echo '<pre>'.htmlspecialchars($row['details'], ENT_HTML5, 'UTF-8', false).'<br/>'.'</pre>';
                    echo '&euro;'.htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false).'<br/>';
                    echo '<a href="'.htmlspecialchars($row['category'], ENT_HTML5, 'UTF-8', false).'"'.'>Back to '.htmlspecialchars($row['category'], ENT_HTML5, 'UTF-8', false). ' page</a>';
                }
            }
           
  ?>
         
        <br>
       <form id="form1" name="form1" method="post" action="cart.php">
                                <input type="hidden" name="type" id="type" value="game"/>
                                <input type="hidden" name="pid" id="pid" value="<?php echo $id;?>"/>
                                <input type="submit" name="button" id="button" value="Add to Shopping Cart"/>
                            </form>
    </div>
</div>