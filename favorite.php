<?php
session_start();
require_once ('connect.php');
class favorite
{

    function fav() {
        
        if (!isset($_SESSION['ssid'])) {          // check login status
            http_response_code(403);
            exit;
        }

        if (isset($_POST['game_id'])) {
            $user_id = $_SESSION['ssid'];
            $game_id = $_POST['game_id'];

            $conn = new connect();
            $db = $conn->conn();

            $check_sql = "SELECT * from user_fav where user_id = ? and game_id = ?";        // ? = placeholder
            $stmt = $db->prepare($check_sql);
            $stmt->execute([$user_id, $game_id]);

            if ($stmt->rowCount() > 0) {
                $del_sql = "DELETE from user_fav where user_id = ? and game_id = ?";
                $db->prepare($del_sql)->execute([$user_id, $game_id]);                      // prepare placeholder -> execute data แทน placeholder ("?")
            } else {
                $ins_sql = "INSERT into user_fav (user_id, game_id) VALUES (?, ?)";
                $db->prepare($ins_sql)->execute([$user_id, $game_id]);
            }
        }
    }}
    
$obj = new favorite();
$obj->fav();
?>