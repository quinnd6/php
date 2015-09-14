<?php 
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    $gameName = $_GET['gameSearchName'];
    $table_name = 'products';
    $data = $init->searchItems($table_name, $gameName);

       
?>

<?php 

include_once( 'views/header.php' );
    
?>
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

<div id="content">
    <div id ="searchbar">
<form action="searchresults.php" method="get">
<input type="text" name="gameSearchName">
<input type="submit" value="search">
</form> 
</div>

<?php
      if($data!==0)
      {
          echo'<div id="page_title"><h2>Results in Games </h2></div>';
        $init->printData($data,'games');
        
      }
?>

 <?php
        $table_name = 'consoles';
        $data = $init->searchItems($table_name, $gameName);
         if($data!==0)
         {
            echo'<div id="page_title"><h2>Results in Consoles </h2></div>';
            $init->printData($data,'consoles');
            
         }
       
 ?>
    

  <?php
        $table_name = 'accessories';
        $data = $init->searchItems($table_name, $gameName);
         if($data!==0)
         {
            echo'<div id="page_title"><h2>Results in Accessories</h2></div>';
            $init->printData($data,'accessories');
            
         }
             
  ?>


<?php
        $table_name = 'other';
        $data = $init->searchItems($table_name, $gameName);
        
         if($data !== 0)
         {
            echo'<div id="page_title"><h2>Results in Other</h2></div>';
            
            $init->printData($data,'other');
           
         }
             
  ?>
                                      
    

</div>
<div id="footer"></div>