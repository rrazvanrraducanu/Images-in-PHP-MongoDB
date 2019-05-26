<?php
require_once 'connection.php';
$bulk = new MongoDB\Driver\BulkWrite;

if(!isset($_POST["submit"])){
$id = new \MongoDB\BSON\ObjectId($_GET['id']);
$filter = ['_id' => $id];
$query = new MongoDB\Driver\Query($filter);          
$article = $client->executeQuery("flori.flowers", $query);
$doc = current($article->toArray());
}else{
    $target="./images/".md5(uniqid(time())).basename($_FILES['image']['name']);
 $data=[
        'nume'=>$_POST['nume'],
        'culoare'=>$_POST['culoare'],
        'marime'=>$_POST['marime'],
        'pret'=>$_POST['pret'],
        'image'=>$target,
    ];
 $id = new \MongoDB\BSON\ObjectId($_POST['id']);
$filter = ['_id' => $id];
    
$update=['$set'=>$data];

 $bulk->update($filter, $update);
 $client->executeBulkWrite('flori.flowers',$bulk);
 if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:index.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
//header('location:index.php');
}
?>

<h1>Editati inregistrarea</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $doc->_id;?>">
    Nume:<br><input type="text" name="nume" value="<?php echo $doc->nume;?>"><br/>
    Culoare:<br/><input type="text" name="culoare" value="<?php echo $doc->culoare;?>"><br>
    Marime:<br/><input type="text" name="marime" value="<?php echo $doc->marime;?>"><br>
    Pret:<br/><input type="text" name="pret" value="<?php echo $doc->pret;?>"><br><br>
    Imagine:<br/><input type="file" name="image"><br><br>
    <img src="<?php echo $doc->image;?>"><br/><br/>
    <input type="submit" name="submit" value="Update"><br>
</form>
