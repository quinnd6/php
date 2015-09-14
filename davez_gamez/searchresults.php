<?php
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
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
          echo'<div id="page_title"><h2>Results </h2></div>';
        $init->printData($data,'products');
        
      }
?>

 
                                     
    

</div>
<div id="footer">&COPY;2015</div>