
<?php 
    require("../SQL/sql_admin.php");

    $name = $_POST['phone']['name'];
    $brand = $_POST['phone']['brand'];

    $date = str_replace('/', '-', $_POST['phone']["date"]);
    $new_date = date('Y-m-d', strtotime($date));

    // $spec = $_POST['spec'];
    // get latest id
    $id = 0;
    $result = mysqli_query($con, get_latest_phone_id());
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = intval($row['id']);
        $id += 1;
    } 

    if($id != 0){
        $data_phone = array(
            "id" => $id,
            "name" => $name,
            "category" => $brand,
            "date" => $new_date,
            "visible" => 1
        );
        $spec = array(
            "phoneID " => $id,
            "chipset" => $_POST['spec']['chipset'],
            "cpuType" => $_POST['spec']['cpu'],
            "bodySize" => $_POST['spec']['dimensions'],
            "bodyWeight" => $_POST['spec']['weight'],
            "screenFeature" => $_POST['spec']['display_feature'],
            "screenResolution" => $_POST['spec']['resolution'],
            "screenSize" => $_POST['spec']['display_size'],
            "screenTech" => $_POST['spec']['technology'],
            "os" => $_POST['spec']['os'],
            "videoCapture" => $_POST['spec']['video'],
            "cameraFront" => $_POST['spec']['fcamera'],
            "cameraBack" => $_POST['spec']['bcamera'],
            "cameraFeature" => $_POST['spec']['camera_feature'],
            "battery" => $_POST['spec']['battery'],
            "sim" => $_POST['spec']['sim'],
            "networkSupport" => $_POST['spec']['network'],
            "wifi" => $_POST['spec']['wifi'],
            "misc" =>  $_POST['spec']['misc']
        );
        //mysqli_query($con,insert_phone($id,$name,$brand,$new_date));// insert to phone table
        //mysqli_query($con,insert_phone_spec($id,$spec));
        $result1 = mysqli_query($con,insert(" phone ",$data_phone));// insert to phone table
        $result = mysqli_query($con, insert(" spec ",$spec));
        if (!$result || !$result1) {
            die('Error: ' . mysqli_error($con));
        }

        $dataColor = $_POST['dataColor'];
        foreach ($dataColor as $item_color){
            $temp_color = array(
                "phoneID" => $id,
                "colorID" => $item_color['colorID'],
                "color" => $item_color['color'],
            );
            // $colorID = $item_color['colorID'];
            // $color = $item_color['color'];
            mysqli_query($con, insert(" color ", $temp_color));

            $dataVariant = $_POST['dataVariant'];
            foreach ($dataVariant as $item_variant){
                $temp_variant = array(
                    "phoneID" => $id,
                    "sizeID" => $item_variant['sizeID'],
                    "size" => $item_variant['size'],
                    "colorID" => $item_color['colorID'],
                    "price" => $item_variant['price']
                );
                mysqli_query($con, insert(" variant ",$temp_variant));
            }

            $dataImage = $_POST['dataImage'];
            foreach ($dataImage as $item_image){
                $temp_image = array(
                    "phoneID" => $id,
                    "colorID" => $item_image['colorID'],
                    "image" => $item_image['fileName']
                );
                
                if($item_image['colorID'] == $item_color['colorID']){
                    mysqli_query($con, insert(" image ", $temp_image));
                }
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