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
            $noti60 = $cdr['noti_60'];
            $noti30 = $cdr['noti_30'];
            $noti10 = $cdr['noti_10'];
            
            $diffSec = getRemainingSeconds($resettime, $timezone);
            
            $minute = "";
            $descriptionText = "";

            if ($noti60 == 1 && $diffSec >= 3590 && $diffSec <= 3610) {
                $minute = "1 ชั่วโมง";
                $descriptionText = "กำลังจะรีเซ็ตในอีก 1 ชั่วโมง";
            } 
            elseif ($noti30 == 1 && $diffSec >= 1790 && $diffSec <= 1810) {
                $minute = "30 นาที";
                $descriptionText = "กำลังจะรีเซ็ตในอีก 30 นาที";
            } 
            elseif ($noti10 == 1 && $diffSec >= 590 && $diffSec <= 610) {
                $minute = "10 นาที";
                $descriptionText = "กำลังจะรีเซ็ตในอีก 10 นาที";
            }

            if (!empty($minute)) {
                $message = [
                    "username" => "Game Daily Reset Tracker",
                    "content" => "⏰ แจ้งเตือนเวลารีเซ็ตเกม",
                    "embeds" => [[
                        "title" => $gamename,
                        "description" => $descriptionText,
                        "color" => 16753920,
                        "fields" => [
                            ["name" => "Status", "value" => "ใกล้หมดเวลา", "inline" => true]
                        ],
                        "footer" => ["text" => "Game Daily Reset Tracker"],
                        "timestamp" => date(DATE_ATOM) 
                    ]]
                ];

                sendCurlToDiscord($webhookURL, $message);
            } 
        }
         
        function getRemainingSeconds(string $resettime, string $timezone) {
            list($resetHours, $resetMinutes) = explode(':', $resettime);

            $tzOffset = 0;
            if (preg_match('/(?:GMT|UTC)\s*([+-]?\d+)?/i', $timezone, $match)) {
                if (isset($match[1])) {
                    $tzOffset = intval($match[1]);
                }
            }

            $nowUtc = time();
            
            $targetUtcTimestamp = gmmktime(intval($resetHours) - $tzOffset, intval($resetMinutes), 0,  
            gmdate('m', $nowUtc),
            gmdate('d', $nowUtc),
            gmdate('Y', $nowUtc));

            if ($targetUtcTimestamp <= $nowUtc) {
                $targetUtcTimestamp += 86400;
            }

            $diffSec = $targetUtcTimestamp - $nowUtc;   

            return $diffSec;
        }

        function sendCurlToDiscord(string $url, array $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $result = curl_exec($ch);
        return $result;
        }
        
?>