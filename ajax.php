<?php require "./commont/connect.php" ?>  

<?php 
if (!empty($_POST['id_category'])) {
  $query=" SELECT * FROM subcategory WHERE id_category= ".$_POST['id_category']."" ;
  $result=$conn->prepare($query);
  $result->execute();
  $row=$result->fetchAll(PDO::FETCH_ASSOC); ?>

  <select name="" id="country">
      <?php foreach ($row as $value){ ?>
        
      
      <option value="<?php echo $value['id_subcategory'] ?>"><?php echo $value['name_subcategory'] ?></option>
      <?php  }?>
    
    </select><?php }
 ?>