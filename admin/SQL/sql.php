<!-- store sql querry and function about sql -->
<?php 

function get_all_item($limit,$offset){
    $querry_get_name_color_size = "SELECT phoneID, name, cac_mau, size, image
                                                      FROM (
                                                          SELECT phone.id AS phoneID, phone.name, 
                                                              GROUP_CONCAT(DISTINCT color.color ORDER BY color.color SEPARATOR ', ') AS cac_mau,
                                                              GROUP_CONCAT(DISTINCT variant.size ORDER BY variant.size SEPARATOR ', ') AS size,
                                                              image 
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






























?>