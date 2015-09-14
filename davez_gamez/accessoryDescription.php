<?php 
    include_once ('core/class.ManageDatabase.php');
    
    $init = new ManageDatabase;
    
   
        $id = $_GET['accessoriesid'];
        $data = $init->getAccessoryDescription($id);
    
    
     
       
?>
<div id ="content">
    <div id ="boxed_item">
<?php
            if($data !== 0)
            {
                while ($row = $data->fetch()) {
                    echo '<img src="'.htmlspecialchars($row['picurl1'], ENT_HTML5, 'UTF-8', false).'" alt=""  />'.'<br>';
                    echo htmlspecialchars($row['name'], ENT_HTML5, 'UTF-8', false).'<br/>';
                    echo '<pre>'.htmlspecialchars($row['description'], ENT_HTML5, 'UTF-8', false).'<br/>'.'</pre>';
                    echo '&euro;'.htmlspecialchars($row['price'], ENT_HTML5, 'UTF-8', false).'<br/>';
                }
            }
  ?>
        <a href="accessories" target="_blank">Back to Accessories page</a>
    </div>
</div>