

<?php
session_start();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(isset($_SESSION["SUBSCRIPTION"][$id])){
        array_splice($_SESSION["SUBSCRIPTION"] , $id ,1);
        header("location: form.php?2");
    }
    
}
else {
    header("location: form.php?1");
}
?>