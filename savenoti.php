<?php
session_start();
include 'connect.php';

    if (isset($_POST['noti_status']) && isset($_POST['noti_60']) && isset($_POST['noti_30']) && isset($_POST['noti_10']) && isset($_SESSION['ssid'])) {
        $noti_status = intval($_POST['noti_status']);
        $noti_60_status = intval($_POST['noti_60']);
        $noti_30_status = intval($_POST['noti_30']);
        $noti_10_status = intval($_POST['noti_10']);
        $user_id = $_SESSION['ssid'];

        $conn = new connect();
        $sql  = "UPDATE `user` SET `noti_status` = '".$noti_status."'  ,`noti_60` = '".$noti_60_status."' ,`noti_30` = '".$noti_30_status."' ,`noti_10` = '".$noti_10_status."'  WHERE `id` = '".$user_id."'";
        $res  = $conn->query($sql); 
}
?>
