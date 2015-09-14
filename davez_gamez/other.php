
<?php include_once( 'views/header.php' );
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
  //  $table_name = "games";
    $data = $init->getOtherItems("other");
        
?>

<div id = "content">
     <div id ="searchbar">
        <form action="searchresults.php" method="get">
        <input type="text" name="gameSearchName">
        <input type="submit" value="search">
        </form> 
    </div>
    <div id="page_title"><h2>Other</h2></div>


<?php 
    if($data!==0)
    {
        $init->printData($data);
    }
     else {
     echo '<div id ="boxed_item">There are no non gaming items available</div>';
    }
?>				
                                     
</div>
