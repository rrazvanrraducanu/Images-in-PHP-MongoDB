<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
       require_once 'connection.php';
        $query = new MongoDB\Driver\Query([]); 
        $rows = $client->executeQuery("flori.flowers", $query);
?>
<table>
        <tr>
        <b><td>Nume</td></b>
        <b><td>Culoare</td></b>
        <b><td>Marime</td></b>
        <b><td>Pret</td></b>
        <b><td>Imagine</td></b>
        <b><td colspan="3">Actions</td></b>
        </tr>
<?php foreach($rows as $val):?> 
<?php if((isset($val->nume))&&(isset($val->culoare))&&(isset($val->marime))&&(isset($val->pret))&&(isset($val->image))&&
($val->nume!="")&& ($val->culoare!="")):?>    
<tr>
    <td><?php echo $val->nume;?></td>
    <td><?php echo $val->culoare;?></td>
    <td><?php echo $val->marime;?></td>
    <td><?php echo $val->pret;?></td>
    <td><img src="<?php echo $val->image;?>"></td>
    <td><?php echo "<a href=\"view.php?id=".$val->_id."\">View</a>";?></td>
    <td><?php echo "<a href=\"edit.php?id=".$val->_id."\">Edit</a>";?></td>
    <td>
<?php echo "<a href=\"delete.php?id=".$val->_id."\" onclick=\" return confirm('Are you sure you want to delete this document?')\";> Delete</a>";?> 
    </td> 

 </tr>
    <?php endif;?>
    <?php endforeach;?>
</table>
    <a href="insert.php">Add a new record</a><br><br>        
</body>
</html>
