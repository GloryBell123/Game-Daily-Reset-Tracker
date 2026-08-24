<?php
session_start();
include 'connect.php';

    if (isset($_POST['noti_status']) && isset($_SESSION['ssid'])) {
        $noti_status  = intval($_POST['noti_status']);
        $user_id = $_SESSION['ssid'];

        $conn = new connect();
        $sql  = "UPDATE `user` SET `noti_status` = '".$noti_status."' WHERE `id` = '".$user_id."'";
        $res  = $conn->query($sql); 
}
?>