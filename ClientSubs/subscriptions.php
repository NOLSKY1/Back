<?php
session_start();
if(!isset($_SESSION["SUBSCRIPTION"])){
    die("NO subscriptions");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="subscriptions.css?v=<?=time()?>">
</head>
<body>
<div class="container">

<?php foreach ($_SESSION["SUBSCRIPTION"] as $index => $sub ) : ?>
    <form action="ClientForm.php" method="POST">
    <div class="card">
        <h1><?= $sub["Name"]  ?></h1>
        <h3><?= $sub["Price"] ." DH"  ?> </h3>
        <span><?=$sub["Duration"]?> </span>
        <p><?= $sub["Features"] ?></p>
        <div><span>Auto-renewal :</span> <?=$sub["renewal"] ?></div>
        <input type="submit" name="submit" value="Get Started" id="submit">


    </div>

    </form>


<?php endforeach;?>









    </div>
    
</body>
</html>
   



