<?php include_once( 'views/header.php' );
     include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    $data = $init->getConsoles("consoles");
?>
<div id="content">
     <div id ="searchbar">
        <form action="searchresults.php" method="get">
        <input type="text" name="gameSearchName">
        <input type="submit" value="search">
        </form> 
    </div>
<div id="page_title"><h2>Consoles</h2></div>
 <?php
        if($data!==0)
        {
            echo '<div id ="boxed_item">';
            $init->printData($data,'consoles');
            echo '</div>';
        }
        else {
         echo '<div id ="boxed_item">There are no consoles available</div>';
        }
    ?>
</div>

