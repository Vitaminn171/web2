
<?php 
    require("../SQL/sql_admin.php");

    $name = $_POST['phone']['name'];
    $brand = $_POST['phone']['brand'];
    $id = $_POST['phone']['phoneID'];
    
    // TODO: UPDATE DATA TO DB


    $date = str_replace('/', '-', $_POST['phone']["date"]);
    $new_date = date('Y-m-d', strtotime($date));

    $spec = $_POST['spec'];

    
    if($id != 0){
        $data_phone = array(
            "name" => $name,
            "category" => $brand,
            "date" => $new_date,
            "visible" => 1
        );
        $spec = array(
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
        // table
        $table_phone = " phone ";
        $table_spec = " spec ";
        
        // condition 
        $phone_condition = "id = ".$id;
        $spec_condition = "phoneID = ".$id;
        // query
        $result1 = mysqli_query($con,update($table_phone,$data_phone,$phone_condition));// update to phone table
        $result = mysqli_query($con, update($table_spec,$spec,$spec_condition));
        if (!$result1 || !$result) {
            die('Error: ' . mysqli_error($con));
        }

        // color
        $dataColor = $_POST['dataColor'];
        foreach ($dataColor as $item_color){
            $temp_color = array(
                "phoneID" => $id,
                "colorID" => $item_color['colorID'],
                "color" => $item_color['color'],
            );
            $table_color = " color ";
            if(isset($item_color['action'])){
                $action = $item_color['action'];
                if($action == "new"){
                    mysqli_query($con, insert($table_color, $temp_color));
                }else if($action == "delete"){
                    $condition = " phoneID = ".$id." && colorID = '".$item_color['colorID']."'";
                    mysqli_query($con, delete_data($table_color, $condition));
                }
                
            }else{
                $condition = " phoneID = ".$id." && colorID = '".$item_color['colorID']."'";
                mysqli_query($con, update($table_color, $temp_color, $condition));
            }
            

            $dataVariant = $_POST['dataVariant'];
            foreach ($dataVariant as $item_variant){
                $table_variant = " variant ";
                $temp_variant = array(
                    "phoneID" => $id,
                    "sizeID" => $item_variant['sizeID'],
                    "size" => $item_variant['size'],
                    "colorID" => $item_color['colorID'],
                    "price" => $item_variant['price']
                );
                
                if(isset($item_variant['action'])){
                    $action = $item_variant['action'];
                    if($action == "new"){
                        mysqli_query($con, insert($table_variant, $temp_variant));
                    }else if($action == "delete"){
                        $condition = " phoneID = ".$id." && sizeID = '".$item_variant['sizeID']."'";
                        mysqli_query($con, delete_data($table_variant, $condition));
                    }
                }else{
                    $condition = " phoneID = ".$id." && sizeID = '".$item_variant['sizeID']."'";
                    mysqli_query($con, update($table_variant, $temp_variant, $condition));
                }
            }

            $dataImage = $_POST['dataImage'];
            foreach ($dataImage as $item_image){
                $temp_image = array(
                    "phoneID" => $id,
                    "colorID" => $item_image['colorID'],
                    "image" => $item_image['image']
                );
                $table_image = " image ";
                if($item_image['colorID'] == $item_color['colorID']){
                    if(isset($item_image['action'])){
                        $action = $item_image['action'];
                        if($action == "new"){
                            mysqli_query($con, insert($table_image, $temp_image));
                        }else if($action == "delete"){
                            $condition = " phoneID = ".$id." && image = '".$item_image['image']."' && colorID = '".$item_image['colorID']."'";
                            $result = mysqli_query($con, delete_data($table_image, $condition));
                            if (!$result) {
                                die('Error: ' . mysqli_error($con));
                            }
                        }
                    }
                }
            }
        }
    }


    
?>