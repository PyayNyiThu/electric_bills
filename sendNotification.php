<?php

// function sendNotification() {
//     $content      = array(
//         "en" => 'English Message'
//     );

//     $headings      = array(
//         "en" => 'English Title'
//     );
//     $hashes_array = array();
//     array_push($hashes_array, array(
//         "id" => "like-button",
//         "text" => "Like",
//         "icon" => "http://i.imgur.com/N8SN8ZS.png",
//         "url" => "https://yoursite.com"
//     ));
//     array_push($hashes_array, array(
//         "id" => "like-button-2",
//         "text" => "Like2",
//         "icon" => "http://i.imgur.com/N8SN8ZS.png",
//         "url" => "https://yoursite.com"
//     ));
//     $fields = array(
//         'app_id' => "3f0cc56a-2278-4376-a2f0-73f3315d66ed",
//         'included_segments' => array(
//             'Subscribed Users'
//         ),
//         'contents' => $content,
//         'headings' => $headings,
//         'web_buttons' => $hashes_array,
//         'url' => 'http://localhost/electric_bills/test.php',
//     );

//     $fields = json_encode($fields);
//     print("\nJSON sent:\n");
//     print($fields);

//     $auth_key = "NzgzNGU2ZTItZWE3MC00ZThmLTg1YWItZTFjNWY4ZDhiZmE4";

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json; charset=utf-8',
//         'Authorization: Basic '.$auth_key,
//     ));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//     curl_setopt($ch, CURLOPT_HEADER, FALSE);
//     curl_setopt($ch, CURLOPT_POST, TRUE);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

//     $response = curl_exec($ch);
//     curl_close($ch);

//     return $response;
// }

//     $response = sendNotification();
//     $return["allresponses"] = $response;
//     $return = json_encode($return);

//     $data = json_decode($response, true);
//     print_r($data);
//     $id = $data['id'];
//     print_r($id);

//     print("\n\nJSON received:\n");
//     print($return);
//     print("\n");

// $playerId = 'b70d827c-8fe1-11ec-8c45-b24d9d38c59a';
//     $fields = array( 
//     'app_id' => 'f5340657-eaf5-46ee-bb6e-05ab628520d9', 
//     'tags'         => array('OneSignal_Example_Tag' => '', 'foo' => ''),
    // "tags": {
    //        "rank": "",
    //        "category": "",
    //        "class": "my_new_value"
    //     }
    // 'notification_types' => 1,
    // 'external_user_id' => 1,
    // ); 
    // $fields = json_encode($fields); 
    
    // $ch = curl_init(); 
    // curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/players/'.$playerId); 
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    // curl_setopt($ch, CURLOPT_HEADER, false); 
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    // $response = curl_exec($ch); 
    // curl_close($ch); 
    
    // $resultData = json_decode($response, true);
    // print_r($resultData);

    $lastDay = date('t',strtotime('last month'));

print_r($lastDay);