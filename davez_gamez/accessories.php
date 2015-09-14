
<?php include_once( 'views/header.php' );
     include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
  //  $table_name = "games";
    $data = $init->getAccessories("accessories");
        
?>
 
<div id="content">
     <div id ="searchbar">
        <form action="searchresults.php" method="get">
        <input type="text" name="gameSearchName">
        <input type="submit" value="search">
        </form> 
    </div>
    <div id="page_title"><h2>Accessories</h2></div>
   
    <?php
        if($data!==0)
        {
            echo '<div id ="boxed_item">';
            $init->printData($data,'accessories');
            echo '</div>';
        }
        else {
            echo '<div id ="boxed_item">';
            echo 'There are no accessories available';
            echo '</div>';
        }
    ?>
      
  

</div>