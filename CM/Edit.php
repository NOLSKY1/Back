<?php
session_start();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(isset($_SESSION["SUBSCRIPTION"][$id])){
        $subscription = $_SESSION["SUBSCRIPTION"][$id];
    }
}
else {
    header("location: form.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='form.css'>
    <script src='main.js'></script>
</head>
<body>

    <div class="container">
        <form action="Update.php" method="POST">
            <h1>Edit subscription</h1>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" value="<?=$subscription["Name"]?>" name="Name" id="Name" placeholder="Name" pattern="[a-zA-Z]{5,30}" required>
            <textarea name="Description" id="" placeholder="Description" required><?=$subscription["Description"]?></textarea>
            <input type="number" name="Price" value="<?=$subscription["Price"]?>" id="" placeholder="Price" required  min="1" step="0.1">
            <input type="file" name="image" id="">
<select name="Duration" id="">
    <option value="1 Month" <?= ($subscription["Duration"] == "1 Month") ? "selected" : "" ?>>1 Month</option>
    <option value="3 Months" <?= ($subscription["Duration"] == "3 Months") ? "selected" : "" ?>>3 Months</option>
    <option value="6 Months" <?= ($subscription["Duration"] == "6 Months") ? "selected" : "" ?>>6 Months</option>
    <option value="1 Year" <?= ($subscription["Duration"] == "1 Year") ? "selected" : "" ?>>1 Year</option>
</select>

<textarea name="Features" id="" placeholder="Features" required><?=$subscription["Features"]?></textarea>

<div class="enable">
    <input type="radio" name="renewal" value="Enable" id="enable" <?= ($subscription["renewal"] == "Enable") ? "checked" : "" ?>>
    <label for="enable">Enable</label>
</div>
<div class="disable">
    <input type="radio" name="renewal" value="Disable" id="disable" <?= ($subscription["renewal"] == "Disable") ? "checked" : "" ?>>
    <label for="disable">Disable</label>
</div>

            <input type="submit" name="update" id="Create" value="Update">
        </form>
    </div>
    
</body>
</html>