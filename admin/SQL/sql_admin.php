<?php 
require_once("../html/template/connection.php"); 


// ----------------------- GET -----------------------
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
function get_latest_phone_id(){
    $query = "SELECT id FROM phone ORDER BY id DESC LIMIT 1";
    return $query;
}

function get_phone_by_id($phoneID){
    $query = "SELECT name,category,date FROM phone WHERE id =".$phoneID;
    return $query;
}

function get_phone_spec_by_id($phoneID){
    $query = "SELECT * FROM spec WHERE phoneID =".$phoneID;
    return $query;
}

function get_phone_variant_by_id($phoneID){
    $query = "SELECT size,colorID,price FROM variant WHERE phoneID =".$phoneID;
    return $query;
}

function get_phone_color_by_id($phoneID){
    $query = "SELECT colorID,color FROM color WHERE phoneID =".$phoneID;
    return $query;
}

function get_phone_image_by_id($phoneID){
    $query = "SELECT colorID,image FROM image WHERE phoneID =".$phoneID;
    return $query;
}

// ----------------------- CAL FUNC -----------------------
function count_item($categoryID){
    $countSql = "";
    if($categoryID == "0"){
        $countSql = "SELECT COUNT(id) AS total FROM phone ";
    }else{
        $countSql = "SELECT COUNT(id) AS total FROM phone WHERE category =".$categoryID;    
    }
    return $countSql;
}





// ----------------------- SET -----------------------
function set_visible($phoneID,$visible){
    $query = "UPDATE phone SET visible = ".$visible." WHERE id =".$phoneID;
    return $query;
}




//----------------------- INSERT -----------------------
function insert_phone($id,$name,$brand,$date) {
    $query = "INSERT INTO phone VALUES ('".$id."','".$name."','".$brand."','".$date."','','1')";
    return $query;
}

function insert_phone_spec($id, $spec
) {
    $query = "INSERT INTO spec VALUES('".$id."',
    '".$spec['chipset']."',
    '".$spec['cpu']."',
    '".$spec['dimensions']."',
    '".$spec['weight']."',
    '".$spec['display_feature']."',
    '".$spec['resolution']."',
    '".$spec['display_size']."',
    '".$spec['technology']."',
    '".$spec['os']."',
    '".$spec['video']."',
    '".$spec['fcamera']."',
    '".$spec['bcamera']."',
    '".$spec['camera_feature']."',
    '".$spec['sim']."',
    '".$spec['network']."',
    '".$spec['wifi']."',
    '".$spec['misc']."'";
    return $query;
}
function insert_variant($phoneID,$size,$colorID,$price) {
    $query = "INSERT INTO variant VALUES('','".$phoneID."','".$size."','".$colorID."','".$price."','')";
    return $query;
}

function insert_color($phoneID,$colorID,$color) {
    $query = "INSERT INTO color VALUES('','".$phoneID."','".$colorID."','".$color."')";
    return $query;
}

function insert_image($id,$colorID,$image) {
    $query = "INSERT INTO image VALUES('','".$id."','".$colorID."','".$image."')";
    return $query;
}


























?>