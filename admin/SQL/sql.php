<!-- store sql querry and function about sql -->
<?php 

function get_all_item($limit,$offset){
    $querry_get_name_color_size = "SELECT phoneID, name, cac_mau, size, image, visible
                                                      FROM (
                                                          SELECT phone.id AS phoneID, phone.name, 
                                                              GROUP_CONCAT(DISTINCT color.color ORDER BY color.color SEPARATOR ', ') AS cac_mau,
                                                              GROUP_CONCAT(DISTINCT variant.size ORDER BY variant.size SEPARATOR ', ') AS size,
                                                              image , visible
                                                          FROM `color`
                                                          JOIN `phone` ON color.phoneID = phone.id 
                                                          JOIN `variant` on variant.phoneID = phone.id
                                                          JOIN `image` on image.phoneID = phone.id
                                                          GROUP BY phoneID
                                                          HAVING COUNT(DISTINCT color.color) > 0 AND COUNT(DISTINCT variant.size) > 0
                                                      ) AS t1
                                                      ORDER BY phoneID  LIMIT $limit OFFSET $offset
                                                    ";
    return $querry_get_name_color_size;
}


function get_item_by_category($limit,$offset,$categoryID){
    $querry_get_item_by_category = "SELECT phoneID, name, cac_mau, size, image, visible
                                                      FROM (
                                                          SELECT phone.id AS phoneID, phone.name, 
                                                              GROUP_CONCAT(DISTINCT color.color ORDER BY color.color SEPARATOR ', ') AS cac_mau,
                                                              GROUP_CONCAT(DISTINCT variant.size ORDER BY variant.size SEPARATOR ', ') AS size,
                                                              image , visible
                                                          FROM `color`
                                                          JOIN `phone` ON color.phoneID = phone.id 
                                                          JOIN `variant` on variant.phoneID = phone.id
                                                          JOIN `image` on image.phoneID = phone.id
                                                          WHERE phone.category = $categoryID
                                                          GROUP BY phoneID
                                                          HAVING COUNT(DISTINCT color.color) > 0 AND COUNT(DISTINCT variant.size) > 0
                                                      ) AS t1
                                                      ORDER BY phoneID  LIMIT $limit OFFSET $offset
                                                    ";
    return $querry_get_item_by_category;
}


function get_all_category($limit,$offset){
    // get category id, name and quantity for each brand
    $querry_get_category = "SELECT category.id, category.name, COUNT(phone.id) AS quantity 
                            FROM phone INNER JOIN category ON phone.category = category.id
                            GROUP BY category.id, category.name LIMIT $limit OFFSET $offset";
    return $querry_get_category;
}

function get_category_id_name(){
    // get category id, name and quantity for each brand
    $querry_get_category_id_name = "SELECT id, name FROM category";
    return $querry_get_category_id_name;
}

function count_item($categoryID){
    $countSql = "";
    if($categoryID == "0"){
        $countSql = "SELECT COUNT(id) AS total FROM phone ";
    }else{
        $countSql = "SELECT COUNT(id) AS total FROM phone WHERE category =".$categoryID;    
    }
    return $countSql;
}


function set_visible($phoneID,$visible){
    $query = "UPDATE phone SET visible = ".$visible." WHERE id =".$phoneID;
    return $query;
}

function get_all_email_customer() {
    $query = "SELECT email FROM customer";
    return $query;
}

function get_all_account_customer() {
    $query = "SELECT email,password FROM customer";
    return $query;
}

function insert_phone($name,$category,$date) {
    $query = "INSERT INTO phone VALUES('',$name,$category,$date,'',1)";
    return $query;
}

function insert_phone_spec($id,
$chipset,
$cpu,
$dimensions,
$weight,
$display_feature,
$resolution,
$display_size,
$technology,
$os,
$video,
$fcamera,
$bcamera,
$camera_feature,
$sim,
$network,
$wifi,
$misc) {
    $query = "INSERT INTO spec VALUES($id,
                                        $chipset,
                                        $cpu,
                                        $dimensions,
                                        $weight,
                                        $display_feature,
                                        $resolution,
                                        $display_size,
                                        $technology,
                                        $os,
                                        $video,
                                        $fcamera,
                                        $bcamera,
                                        $camera_feature,
                                        $sim,
                                        $network,
                                        $wifi,
                                        $misc";
    return $query;
}
function insert_variant($id,$size,$colorID,$price) {
    $query = "INSERT INTO variant VALUES('',$id,$size,$colorID,$price,'')";
    return $query;
}

function insert_color($id,$colorID,$color) {
    $query = "INSERT INTO color VALUES('',$id,$colorID,$color)";
    return $query;
}

function insert_image($id,$colorID,$image) {
    $query = "INSERT INTO image VALUES('',$id,$colorID,$image)";
    return $query;
}


























?>