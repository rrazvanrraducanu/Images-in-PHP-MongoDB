<?php
require_once 'connection.php';
$bulk = new MongoDB\Driver\BulkWrite;
if(isset($_POST["submit"])){
 $target="./images/". md5(uniqid(time())). basename($_FILES['image']['name']);
    $data=array(
        '_id' => new MongoDB\BSON\ObjectID,
        'nume'=>$_POST['nume'],
        'culoare'=>$_POST['culoare'],
        'marime'=>$_POST['marime'] ,
        'pret'=>$_POST['pret'],
        'image'=>$target,
    );
    $bulk->insert($data);

}
$client->executeBulkWrite('flori.flowers',$bulk);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       header('location:index.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
?>
