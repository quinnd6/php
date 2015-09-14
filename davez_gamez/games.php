<?php 
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    
    $data = $init->getGames("games");

       
?>

<div id="content">
    <div id ="searchbar">
        <form action="searchresults.php" method="get">
        <input type="text" name="gameSearchName">
        <input type="submit" value="search">
        </form> 
    </div>
<div id="page_title"><h2> Games </h2></div>


 
					<?php 
                                       /* if($data !==0) 
                                        {
                                            foreach($fields_name as $f)
                                            {
                                               
                                                //echo '<th>'.$f.'</th>';
                                                
                                            }
                                            
                                        }
                                        * 
                                        */
                                        ?>
      <?php
        if($data!==0)
        {
            $init->printData($data,'games');
        }
        else {
         echo 'There are no games available at the moment';
        }
    ?>

</div>






