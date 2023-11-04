<?php 
include ('Chat.php');
$inigami = new Chat();

public  function buscarPerfil($id){
    $sql= "SELECT * FROM users WHERE userid= $id";
}
?>