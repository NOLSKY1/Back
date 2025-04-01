

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
    $id = $_POST["id"];





    if (!empty($name)){
        if(preg_match("/[a-zA-Z]{5,30}/",$name)){
            if (!empty($Description)){
                if(!empty($Price)){
                    if(is_numeric($Price) && $Price>=1){
                        if(!empty($Features)){

                            $_SESSION["SUBSCRIPTION"][$id] = [
                                "Name" =>  $name ,
                                "Description" =>  $Description ,
                                "Price" =>  $Price ,
                                "Duration" =>  $Duration ,
                                "Features" =>  $Features ,
                                "renewal" =>  $renewal ,
                                "image" => $image
                            ];
                            header("location: form.php");
                        }
                        else {
                            header("location: Edit.php?6");
                        }



                    }
                    else {
                        header("location: Edit.php?5");

                    }

                }
                else {
                    header("location: Edit.php?4");
                }

            }
            else {
                header("location: Edit.php?3");
            }

            


        }
        else {
            header("location: Edit.php?2");
        }

    }
    else {
        header("location: Edit.php?1");
    }
}
?>




