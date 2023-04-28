
<?php 
    require_once("../html/template/connection.php"); 
    require("../SQL/sql_admin.php");

    $name = $_POST['phone']['name'];
    $brand = $_POST['phone']['brand'];

    $date = str_replace('/', '-', $_POST['phone']["date"]);
    $new_date = date('Y-m-d', strtotime($date));

    $spec = $_POST['spec'];

    // get latest id
    $id = 0;
    $result = mysqli_query($con, get_latest_phone_id());
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = intval($row['id']);
        $id += 1;
    } 

    if($id != 0){
        mysqli_query($con,insert_phone($id,$name,$brand,$new_date));// insert to phone table
        mysqli_query($con,insert_phone_spec($id,$psec,));

        $dataColor = $_POST['dataColor'];
        foreach ($dataColor as $item_color){

            $colorID = $item_color['colorID'];
            $color = $item_color['color'];
            mysqli_query($con, insert_color($id, $colorID, $color));

            $dataVariant = $_POST['dataVariant'];
            foreach ($dataVariant as $item_variant){
                $size = $item_variant['size'];
                $price = $item_variant['price'];
                str_replace(",","",$price);
                mysqli_query($con, insert_variant($id, $size, $colorID, $price));
            }

            $dataImage = $_POST['dataImage'];
            foreach ($dataImage as $item_image){
                $image = $item_image['fileName'];
                mysqli_query($con, insert_image($id, $colorID, $image));
            }
        }
    }
    //mysqli_query($con,insert_phone($id,$name,$brand,$new_date));// insert to phone table

    // foreach ($_POST['dataColor'] as $item_color){

    //     foreach ($_POST['dataVariant'] as $item_variant){

    //         foreach ()
    //     }
    // }
    

    
?>