<?php
include 'connect.php';

$conn = new connect();
        

        $sql = "SELECT `discordapi`.`api` , `user_fav`.`user_id` , `user_fav`.`game_id` , `user`.`noti_status` , `game_list`.`name` as `game_name` , `game_list`.`reset_time` , `game_list`.`timezone`
                FROM `discordapi`
                INNER JOIN `user_fav` ON `discordapi`.`user_fav_id` = `user_fav`.`user_id`
                INNER JOIN `user` ON `user_fav`.`user_id` = `user`.`id`
                INNER JOIN `game_list` ON `user_fav`.`game_id` = `game_list`.`id`
                WHERE `user`.`noti_status` = 1 ";
                    
        $res = $conn->query($sql);
        while ($cdr = $res->fetch()) {
            $webhookURL = $cdr['api'];
            $gamename = $cdr['game_name'];
            $resettime = $cdr['reset_time'];
            $timezone = $cdr['timezone'];
            
            if (isTimeRemainingOneHour($resettime, $timezone)) {
            $message = [
            "username" => "Game Daily Reset Tracker",
            "content" => "⏰ แจ้งเตือนเวลารีเซ็ตเกม",
            "embeds" => [[
                "title" => $gamename,
                "description" => "กำลังจะรีเซ็ตในอีก 1 ชั่วโมง",
                "color" => 16753920,
                "fields" => [
                    ["name" => "Status", "value" => "ใกล้หมดเวลา", "inline" => true]
                ],
                "footer" => ["text" => "Game Daily Reset Tracker"],
                "timestamp" => date(DATE_ATOM) ]]
            ];

            sendCurlToDiscord($webhookURL, $message);
            } }
         
            function isTimeRemainingOneHour(string $resettime, string $timezone) {
            list($resetHours, $resetMinutes) = explode(':', $resettime);

            $tzOffset = 0;
            if (preg_match('/(?:GMT|UTC)\s*([+-]?\d+)?/i', $timezone, $match)) {
                if (isset($match[1])) {
                    $tzOffset = intval($match[1]);
                }
            }

            $nowUtc = time();
            
            $targetUtcTimestamp = gmmktime(intval($resetHours) - $tzOffset, intval($resetMinutes), 0,  // คำนวณชั่วโมงในรูปแบบ UTC
            gmdate('m', $nowUtc),
            gmdate('d', $nowUtc),
            gmdate('Y', $nowUtc));

            if ($targetUtcTimestamp <= $nowUtc) {
                $targetUtcTimestamp += 86400;
            }

            $diffSec = $targetUtcTimestamp - $nowUtc;   // ผลต่าง

            if ($diffSec >= 3590 && $diffSec <= 3610) {
                return true;
            }

            return false;
            }

        function sendCurlToDiscord(string $url, array $data) {
        $ch = curl_init($url);                                              // $ch คือตัวแปรการเชื่อมต่อ
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $result = curl_exec($ch);
        return $result;
        }
        
?>