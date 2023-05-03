<?php 
require("connection.php"); 


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
    $query = "SELECT DISTINCT sizeID,size,price FROM variant WHERE phoneID =".$phoneID;
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

function get_variant_in_orderDetail_sizeID($phoneID,$sizeID){
    $query = "SELECT variant.sizeID AS sizeID, variant.phoneID AS phoneID, variant.colorID AS colorID
    FROM variant
    INNER JOIN orderdetail ON variant.id = orderdetail.variantID
    WHERE variant.phoneID = ".$phoneID." AND variant.sizeID = ".$sizeID;
    return $query;
}

function get_variant_in_orderDetail($phoneID){
    $query = "SELECT variant.id AS variantID
    FROM variant
    INNER JOIN orderdetail ON variant.id = orderdetail.variantID
    WHERE variant.phoneID = ".$phoneID;
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

function get_total_payment_order(){
    $query = "SELECT SUM(totalPayment) AS totalMoney FROM `order`";
    return $query;
}

function get_total_payment_brand_order(){
    $query = "SELECT c.name AS categoryName,
            COUNT(od.quantity) AS totalSoldProducts,
            SUM(od.quantity * od.price) AS totalRevenue
            FROM category AS c
            INNER JOIN phone AS p ON c.id = p.category
            INNER JOIN variant AS v ON p.id = v.phoneID
            INNER JOIN orderdetail AS od ON v.id = od.variantID
            GROUP BY c.id";
    return $query;
}




// ----------------------- SET -----------------------
function set_visible($phoneID,$visible){
    $query = "UPDATE phone SET visible = ".$visible." WHERE id =".$phoneID;
    return $query;
}

function update_phone($id,$name,$brand,$date) {
    $query = "UPDATE phone SET name='".$name."', category='".$brand."', date='".$date."' WHERE id='".$id."'";
    return $query;
}

function update_phone_spec($id,$spec) {
    $query = "UPDATE spec SET chipset='".$spec['chipset']."', cpuType='".$spec['cpu']."', bodySize='".$spec['dimensions']."',
    bodyWeight='".$spec['weight']."', screenFeature='".$spec['display_feature']."', screenResolution='".$spec['resolution']."',
    screenSize='".$spec['display_size']."', screenTech='".$spec['technology']."', os='".$spec['os']."',
    videoCapture='".$spec['video']."', cameraFront='".$spec['fcamera']."', cameraBack='".$spec['bcamera']."',
    cameraFeature='".$spec['camera_feature']."', sim='".$spec['sim']."', networkSupport='".$spec['network']."',
            wifi='".$spec['wifi']."', misc='".$spec['misc']."' WHERE id='".$id."'";
    return $query;
}

function update_variant($sizeID,$phoneID,$size,$colorID,$price) {
    $query = "UPDATE variant SET sizeID='".$sizeID."', size='".$size."', price='".$price."' WHERE phoneID='".$phoneID."' && sizeID='".$sizeID."'";
    return $query;
}

function update_color($phoneID,$colorID,$color) {
    $query = "UPDATE color SET color='".$color."' WHERE phoneID='".$phoneID."'&& colorID='".$colorID."'";
    return $query;
}

function update_image($phoneID,$colorID,$image) {
    $query = "UPDATE image SET image='".$image."' WHERE phoneID='".$phoneID."'&& colorID='".$colorID."'";
    return $query;
}

function update($table_name, $data, $where) {
	$set = [];
	foreach ($data as $field => $value) {
		if (is_null($value)) {
			$set[] = $field . " = NULL";
		} else {
			$set[] = $field . " = '" . $value . "'";
		}
	}

	$query = "UPDATE {$table_name} SET " . implode(", ", $set) . " WHERE {$where}";

	return $query;
}




//----------------------- INSERT -----------------------
function insert_phone($id,$name,$brand,$date) {
    $query = "INSERT INTO phone VALUES ('".$id."','".$name."','".$brand."','".$date."','','1')";
    return $query;
}

function insert_phone_spec($id,array $spec) {
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
    '".$spec['battery']."',
    '".$spec['sim']."',
    '".$spec['network']."',
    '".$spec['wifi']."',
    '".$spec['misc']."')";
    return $query;
}
function insert_variant($phoneID,$sizeID,$size,$colorID,$price) {
    $query = "INSERT INTO variant VALUES('','".$phoneID."','".$sizeID."','".$size."','".$colorID."','".$price."','')";
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

function insert($table_name, $data) {
    foreach($data as $field => $value) {
		$fields[] = $field;
		$values[] = $value;
	}

	// Tạo câu lệnh SQL
	$query = "INSERT INTO ".$table_name." (".implode(",", $fields).") VALUES ('".implode("', '", $values)."')";

    return $query;
}



//----------------------- DELETE -----------------------

function delete_data($table_name, $condition) {
	// Tạo câu lệnh SQL
	$query = "DELETE FROM ".$table_name." WHERE ".$condition;

    return $query;
}




















?>