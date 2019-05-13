<?php
session_start();
// include("check_user.php");
include("connectDB.php");
// $groupID = array('C510b4f29c790dc8e843dbeb74feb7270' => 'PJ-529');

$API_URL = 'https://api.line.me/v2/bot/message'; // URL API LINE
$ACCESS_TOKEN = '5Drfo4t/S4oZbsMzAbehjM70kuXfWe6Xp6SlLnmVbNwTrYaTJV+D3aQnhsy7CYZ/2lwbs8F90ggBbC4gx4qvAA7eUZ4IuakHjymF+hxQkbLAk9n8/mQfem614F9yf0B0amo64KSPFWTVYZTZ1w5ZfQdB04t89/1O/w1cDnyilFU=';
$CHANNEL_SECRET = '96164a13e36916b36e7769c5c49b6b40';
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN); // Set HEADER
$request = file_get_contents('php://input'); // Get request content
$request_array = json_decode($request, true); // Decode JSON to Array
$keyword_tag = array('T','t','TAG','Tag','แท็ก','แท๊ก','แท็กภาพถ่าย','สถานะการแท็ก','Status Tag','status tag','Status tag','status Tag');
$keyword_report = array('R','r','Report','Reports','report','reports','รายงาน','เช็คเวลาเข้าออกงาน','รายงานเวลาเข้าออกงาน');
$keyword_sayhi = array('hi','Hi','HI','hello','Hello','HELLO','ดีจ้า','สวัสดี','ดีค่ะ','ดีครับ','สวีดัด','อันยอง','ดีจ่ะ','ทักทาย');
$keyword_help = array('help','All','Help','HELP','all','ตัวช่วย');
$keyword_addMember = array('M','m','Member','MERBER','member','สมัครสมาชิก','เพิ่มสมาชิกใหม่','สมาชิกใหม่');
//สร้าง Function สำหรับ CURL ใช้ในการ Post Data ไปยัง API ของ Line
function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// function flexMeassge_Tag(){
//   $flexMessageTag = array(
//       "type" => "bubble",
//           "header" => array(
//             "type"=>"box",
//             "layout"=>"vertical",
//             "contents"=>
//               [
//                 array(
//                    "type"=> "text",
//                    "text"=> "ใครมาทำงานแล้วบ้างน้า",
//                    "size"=> "lg",
//                    "align"=> "center",
//                    "weight"=> "bold",
//                    "color"=> "#000000"
//                 ),
//                 array(
//                    "type"=> "text",
//                    "text"=> "มาดูกันเถอะ!!",
//                    "margin"=> "none",
//                    "size"=> "md",
//                    "align"=> "start",
//                    "color"=> "#A81F1F"
//                 )
//               ]
//             ),
//             "footer"=> array(
//               "type"=>"box",
//               "layout"=>"horizontal",
//               "contents"=>
//                 [
//                   array(
//                       "type"=> "button",
//                       "action"=> array(
//                         "type"=> "uri",
//                         "label"=> "แท็กภาพถ่าย",
//                         "uri"=>"line://app/1609271731-Ony6BL0g"
//                       )
//                   ),
//                   array(
//                     "type"=> "button",
//                      "action"= array(
//                        "type"=> "uri",
//                        "label"=> "สถานะการแท็ก",
//                        "uri"=> "line://app/1609271731-YqDJROo0"
//                      )
//                   )
//                 ]
//             )
//   );
//   return $flexMessageTag;
// };

function getBubble( $title, $btn_url ) {
	$bubble = array(
		"type"=> "bubble",
						"header"=> array(
						  "type"=> "box",
						  "layout"=> "vertical",
						  "contents"=>
							[
								array(
							  "type"=> "text",
							  "text"=> $title,
							  "size"=> "xl"
								)
							]
						),
						"body"=> array(
						  "type"=> "box",
						  "layout"=> "vertical",
						  "contents"=>
							[
								array(
							 "type"=> "button",
							  "style"=> "primary",
							  "action"=> array(
								"type"=> "uri",
								"label"=> "คลิก",
								"uri"=> $btn_url
							  )
								)
							]
						)
	);
	return $bubble;
};

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

              //Tag
                  foreach ($keyword_tag as $key => $tag) {
                    if($text == $tag){
                      $contents = array(
                        "type"=> "carousel",
                        "contents"=> [
                          $contents = getBubble( "แท็กภาพถ่าย", "line://app/1609271731-Ony6BL0g?user=".$userID),
                        ]
                      );

                      $messages = [
                        'type'=>'flex',
                        'altText'=>'Tag Image',
                        'contents'=> $contents
                      ];

                      $data = [
                        'replyToken' => $reply_token,
                        'messages' => [$messages],
                      ];

                      $post_body = json_encode($data);
                      $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
                    }
                  }

              //Report
              foreach ($keyword_report as $key => $report) {
                if($text == $report){
                  $contents = array(
                    "type"=> "carousel",
                    "contents"=> [
                      $contents = getBubble( "เช็คเวลาเข้าออกงาน", "line://app/1609271731-kByDj4wX?user=".$userID),
                    ]
                  );

                  $messages = [
            				'type'=>'flex',
            				'altText'=>'Report',
            				'contents'=> $contents
            			];

            			$data = [
            				'replyToken' => $reply_token,
            				'messages' => [$messages],
            			];

                  $post_body = json_encode($data);
                  $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
                }
              }

              //Add memberJoined
              foreach ($keyword_addMember as $key => $member) {
                if ($text == $member) {
                  $contents = array(
                    "type"=> "carousel",
                    "contents"=> [
                      $contents = getBubble( "สมัครสมาชิกใหม่", "line://app/1609271731-YqDJROo0?user=".$userID),
                    ]
                  );

                  $messages = [
            				'type'=>'flex',
            				'altText'=>'Report',
            				'contents'=> $contents
            			];

            			$data = [
            				'replyToken' => $reply_token,
            				'messages' => [$messages],
            			];

                  $post_body = json_encode($data);
                  $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
                }
              }

              foreach ($keyword_sayhi as $key => $sayhi) {
                if($text == $sayhi){
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

            //help
            foreach ($keyword_help as $key => $help) {
              if( $text == $help ) {
                $contents = array(
                  "type"=> "carousel",
                  "contents"=> [
                    $contents = getBubble( "แท็กภาพถ่าย", "line://app/1609271731-Ony6BL0g?user=".$userID),
                    $contents = getBubble( "เช็คเวลาเข้าออกงาน", "line://app/1609271731-kByDj4wX?user=".$userID),
                  ]
                );

                $messages = [
          				'type'=>'flex',
          				'altText'=>'Help Option',
          				'contents'=> $contents
          			];
                // $mes1 = ['type' => 'text',
                //           'text' => $json_encode];

          			$data = [
          				'replyToken' => $reply_token,
          				'messages' => [$messages],
          			];

                $post_body = json_encode($data);
                $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
              }
            }
          // }
          // else if($event['message']['type'] == 'image'){
          //   $data = ['replyToken' => $reply_token,
          //            'messages' => [
          //              ['type' => 'text','text' => $json_encode],
          //              ['type' => 'text','text'=> "IMAGE"],
          //             ]
          //           ];
          //   $post_body = json_encode($data);
          //   $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
          // }

        }
        // else if($event['type'] == 'memberJoined'){
        //   $data = ['replyToken' => $reply_token,
        //            'messages' => [
        //              ['type' => 'text','text' => $json_encode],
        //             ]
        //           ];
        //   $post_body = json_encode($data);
        //   $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
        // }

   }
}
}
echo "bot test";
?>
