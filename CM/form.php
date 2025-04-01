<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $name =$_POST["Name"];
    $Description =$_POST["Description"];
    $Duration =$_POST["Duration"];
    $Price =$_POST["Price"];
    $Features =$_POST["Features"];
    $renewal = isset($_POST["renewal"]) ? $_POST["renewal"]: "Disable";
    $image = $_POST["image"];





    if (!empty($name)){
        if(preg_match("/[a-zA-Z]{5,30}/",$name)){
            if (!empty($Description)){
                if(!empty($Price)){
                    if(is_numeric($Price) && $Price>=1){
                        if(!empty($Features)){
                            if(!isset($_SESSION["SUBSCRIPTION"])){
                                $Subscriptions = [] ; 
                            }
                            else {
                                $Subscriptions =$_SESSION["SUBSCRIPTION"] ; 
                            }
                            

                            $subscription = [
                                "Name" =>  $name ,
                                "Description" =>  $Description ,
                                "Price" =>  $Price ,
                                "Duration" =>  $Duration ,
                                "Features" =>  $Features ,
                                "renewal" =>  $renewal ,
                                "image" => $image

                            ];
                            array_push($Subscriptions ,$subscription) ;
                            //array_splice($Subscriptions , 0);
                            $_SESSION["SUBSCRIPTION"]=$Subscriptions ;
                            //print_r($Subscriptions);
                            
                        }
                        else {
                            header("location: form.html?6");
                        }



                    }
                    else {
                        header("location: form.html?5");

                    }

                }
                else {
                    header("location: form.html?4");
                }

            }
            else {
                header("location: form.html?3");
            }

            


        }
        else {
            header("location: form.html?2");
        }

    }
    else {
        header("location: form.html?1");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Subs.css?v=<?=time()?>">

</head>
<body>

<div class="container">
    <?php  if(!empty($_SESSION["SUBSCRIPTION"])) :?>
    <table >
        <thead>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Features</th>
            <th>Auto-renewal</th>
            <th>Delete</th>
            <th>Edit</th>
        </thead>
        <tbody>
        <?php  foreach($_SESSION["SUBSCRIPTION"] as $index => $sub):  ?>
        <tr>
            <td><?php echo htmlspecialchars($sub["Name"])  ?></td>
            <td><img src="<?php htmlspecialchars($sub["image"])  ?>" alt=""></td>
            <td><?php echo htmlspecialchars($sub["Description"]) ?></td>
            <td><?php echo htmlspecialchars($sub["Price"]) ?></td>
            <td><?php echo htmlspecialchars($sub["Duration"]) ?></td>
            <td><?php echo htmlspecialchars($sub["Features"]) ?></td>
            <td><?php echo htmlspecialchars($sub["renewal"]) ?></td>
            <td><a onclick=" return confirm('Do u really wanna delete this subscription')"  href="http://localhost/Back-end/CM/Delete.php?id=<?php echo $index ?>">Delete</a></td>
            <td><a href="http://localhost/Back-end/CM/Edit.php?id=<?= $index ?>">Edit</a></td>
        </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
    
    <?php else: ?>
        <p>No subscriptions added yet.</p>
    <?php endif; ?>
    </div>



</body>
</html>
