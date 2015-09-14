<?php
include_once 'core/class.Game.php';
    class ManageDatabase
    {
        public $link;
        
        function __construct()
        {
            include_once('class.database.php');
            $conn = new database;
            $this->link = $conn->connect();
            return $this->link;
        }
        
        function getData($table_name, $id=null)
        {
            if(isset($id))
            {
                $query = $this->link->query("SELECT picurl1,name, description, price FROM $table_name WHERE id = '$id'  ORDER BY id ASC");
            }
            else
            {
                $query = $this->link->query("SELECT picurl1,name, description, price FROM $table_name  ORDER BY id ASC");
            }
            $rowCount = $query->rowCount();
            if($rowCount >= 1)
            {
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $result = $query->fetchAll();
            }
            else
            {
                $result = 0;
            }
            return $result;
        }
        
        function getGames($table_name, $id=null)
        {
            try {
                //$query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM games");
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM products where category ='games'");
                 $query->execute();
                
                
            } catch ( PDOException $ex ) {
                    echo "An Error occured when retrieving games: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       //Get individual project description page
       function getDescription($id)
       {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price, category FROM products where id=".$id);
                   $query->execute();
            } catch ( PDOException $ex ) {
                echo "An Error occured when retrieving commenta: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       
       function getGameDescription($gameid)
       {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM products where category ='games'");
                   $query->execute();
            } catch ( PDOException $ex ) {
                echo "An Error occured when retrieving commenta: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
        function getConsoles($table_name, $id=null)
        {
            try {
                //$query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM consoles");
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM products where category ='consoles'");
                 $query->execute();
                
                
            } catch ( PDOException $ex ) {
                    echo "An Error occured when retrieving games: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       function getConsoleDescription($consoleid)
       {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM consoles where id=".$consoleid);
                   $query->execute();
            } catch ( PDOException $ex ) {
                echo "An Error occured when retrieving commenta: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
        function getAccessories($table_name, $id=null)
        {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM products where category ='accessories'");
                 $query->execute();
                
                
            } catch ( PDOException $ex ) {
                    echo "An Error occured when retrieving games: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       function getAccessoryDescription($accessoryId)
       {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM accessories where id=".$accessoryId);
                   $query->execute();
            } catch ( PDOException $ex ) {
                echo "An Error occured when retrieving commenta: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       function getOtherItems($table_name, $id=null)
        {
            try {
                //$query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM other");
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM products where category ='other'");
                 $query->execute();
                
                
            } catch ( PDOException $ex ) {
                    echo "An Error occured when retrieving games: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       function getOtherDescription($otherId)
       {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, name, description ,price FROM other where id=".$otherId);
                   $query->execute();
            } catch ( PDOException $ex ) {
                echo "An Error occured when retrieving commenta: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       function searchItems($table_name,$item_name)
        {
            try {
                $query = $this->link->prepare("SELECT id, picurl1, product_name, details ,price FROM ".$table_name." WHERE product_name like '%".$item_name."%'  or details like '%".$item_name."%'");
                 $query->execute();
                
                
            } catch ( PDOException $ex ) {
                    echo "An Error occured when retrieving games: " . $ex->getMessage ();
            }
            $rowCount = $query->rowCount();
            if($rowCount<1)
            {
                $query = 0;
            }
            return $query;
       }
       
       //print all the products from the given table
       function printData($data, $table_name=null)
       {
           
            if($data !== 0)
            {
                //code to write all product information for games, consoles, accessories and other pages
                //This code puts everything into a table
                /*
                echo ' <table border="1" >
                <thead>
				<tr>
					
				</tr>
			</thead>
			<tbody>
					<tr>';
                //height 181 by  width 150
                while ($row = $data->fetch()) {
                    list($width, $height) = getimagesize($row['picurl1']);
                    echo '<tr>';
                    echo '<td style="text-align:center" padding="15px"><img src="'.$row['picurl1'].'" alt="" border="3" height="'.($height/1.7).'" width="'.($width/1.7).'" /></td>';
                    echo '<td padding="15px">'.htmlspecialchars($row['name'], ENT_HTML5, 'UTF-8', false).'</td>';
                    $description = htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false);
                    //replace description with the first 100 characters of the description
                    $description = preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, 100));
                    $description =  str_replace( '\u20AC', '\u0080', $description );
                    //$description =   htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false);
                    //str_replace("€", "&euro;", $description);
                    echo '<td padding="15px"><p>'.$description.'...<br/><a href=&'.$table_name.'id='.htmlspecialchars($row['id']).'>Find out more</a></p></td>';
                                                        
                     echo '<td padding="15px">&euro;'.htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false).'</td> ';
                    
               }
               echo '  </tr>
			</tbody>
		</table>';
                     */
                
                
                 //Code to output all product information for games, consoles, accessories and other pages
                //This code does not use tables
                 while ($row = $data->fetch()) {
                     if($row['picurl1']!=='')
                     { 
                        list($width, $height) = getimagesize($row['picurl1']);
                     }
                    else { $height = 300/1.7; $width = 300/1.7;$row['picurl1']='inventory_images/blank.jpg';}
                    $description = htmlspecialchars($row['details'], ENT_HTML5, 'UTF-8', false);
                    //replace description with the first 100 characters of the description
                    $description = preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, 100));
                    $description =  str_replace( '\u20AC', '\u0080', $description );
                    
                    echo '<div id="product_container"> <a href="&id='.htmlspecialchars($row['id']).
                            '"><div id="product_title"> '.htmlspecialchars($row['product_name'], ENT_HTML5, 'UTF-8', false).
                            '</div></a> <div id = "product_description">'.$description.
                            '...<br><div id="price">Price: &euro;'
                            .htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false) .'</div><div id ="link">Find out more</div> </div> </div>'.
                            ' <a href="&id='.htmlspecialchars($row['id']).
                            '"><div id = "image"> <img src="'.$row['picurl1'].
                            '" alt="" height="'.($height/1.7) .
                            '"/> </div></a> <hr>    ';
                     //echo '<div id = "image"> <img src="'.$row['picurl1'].'" alt="" border="3" height="'.($height/1.7) .'</div> ';
                   
                    //echo'<img src="'.$row['picurl1'].'" alt="" border="3" height="'.($height/1.7).'" width="'.($width/1.7).'" />';
                   // echo'<div id ="link"><a href="&'.$table_name.'id='.htmlspecialchars($row['id']).'">Find out more</a></div>';
                  
                    /*
                    $description = htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false);
                    //replace description with the first 100 characters of the description
                    $description = preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, 100));
                    $description =  str_replace( '\u20AC', '\u0080', $description );
                    //$description =   htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false);
                    //str_replace("€", "&euro;", $description);
                    echo '<td padding="15px"><p>'.$description.'...<br/><a href=&'.$table_name.'id='.htmlspecialchars($row['id']).'>Find out more</a></p></td>';
                                                        
                     echo '<td padding="15px">&euro;'.htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false).'</td> ';
                    */
               }
         }
       }
  }
?>