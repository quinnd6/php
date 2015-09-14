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
            /*if(isset($_GET['gamesid'])&&(isset($_GET['page'])))
             {
                  getPage('davez_gamez',  "gameDescription");
             }
             else if(isset($_GET['consolesid'])&&(isset($_GET['page'])))
             {
                  getPage('davez_gamez',  "consoleDescription");
             }
             
             else if(isset($_GET['accessoriesid'])&&(isset($_GET['page'])))
             {
                  getPage('davez_gamez',  "accessoryDescription");
             }
             
             else if(isset($_GET['othersId'])&&(isset($_GET['page'])))
             {
                  getPage('davez_gamez',  "otherDescription");
             }
             */
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