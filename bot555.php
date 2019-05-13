<?php
$API_URL = 'https://api.line.me/v2/bot/message'; // URL API LINE
$ACCESS_TOKEN = '5Drfo4t/S4oZbsMzAbehjM70kuXfWe6Xp6SlLnmVbNwTrYaTJV+D3aQnhsy7CYZ/2lwbs8F90ggBbC4gx4qvAA7eUZ4IuakHjymF+hxQkbLAk9n8/mQfem614F9yf0B0amo64KSPFWTVYZTZ1w5ZfQdB04t89/1O/w1cDnyilFU=';
$CHANNEL_SECRET = '96164a13e36916b36e7769c5c49b6b40';
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN); // Set HEADER
$request = file_get_contents('php://input'); // Get request content
$request_array = json_decode($request, true); // Decode JSON to Array
//เป็นการ Get ข้อมูลที่ได้จากการที่ User ที่มีการกระทำใน Channel
if (sizeof($request_array['events']) > 0) {
      // $json_encode = json_encode($request_array['events']);
    foreach ($request_array['events'] as $event) {
      $json_encode= json_encode($request_array);
      $reply_token = $event['replyToken']; // Build message to reply back
        if ($event['type'] == 'message') {
          if($event['message']['type'] == 'text'){
              $userID = $event['source']['userId'];
              $groupID = $event['source']['groupId'];
              $text = $event['message']['text'];
                if($text == 'hi' || $text == 'hello'){
                  $text = 'สวัสดีจ้า';
                  $data = ['replyToken' => $reply_token,
                           'messages' => [
                              // ['type' => 'text','text' => $json_encode],
                              ['type' => 'text','text'=> $text],
                            ]
                          ];
                  $post_body = json_encode($data);
                  $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
                }
   }
}
}
}
?>
