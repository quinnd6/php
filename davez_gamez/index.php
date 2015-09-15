<?php 
require_once 'libs/functions.php';
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
<?php
            if(isset($_GET['id'])&&(isset($_GET['page'])))
             {
                  getPage('davez_gamez',  "description");
             }
            
           else if(isset($_GET['page']))
           {
               getPage('davez_gamez', $_GET['page'],  "home");
              
           }
           
            else 
            {
                getPage('davez_gamez',  "home");
            }
           
             
?>
<div id ="footer"></div>
</div>



</body>
</html>