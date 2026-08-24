<head>
    <style>
        .toggle-text {
            font-size : 20px;
            color : white;
            
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;  
            height: 30px;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #545454; 
            transition: 0.5s;         
            border-radius: 45px;     
        }
        .slider::before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.5s;
            border-radius: 50%;
        }
        .switch input:checked + .slider {
            background-color: #00e676;
        }
        .switch input:checked + .slider::before {
            transform: translateX(30px);
            background-color: white;
        }
    </style>
</head>


<?php
class discord {
    function notification() { 
        $user_id = $_SESSION['ssid'];
        $conn = new connect();
            
            $sql_user = "SELECT `noti_status` FROM `user` WHERE `id` = '".$user_id."'";
            $res_user = $conn->query($sql_user);
            if ($cdr_user = $res_user->fetch()) {
                $user_noti_status = $cdr_user['noti_status'];
            }
        ?>
        <div class="container" style="display: flex;justify-content: center;height: 500px">
                <form action='' method='post'>
                    <table>
                        <tr>
                            <td>
                                <div class="search-navbar">
                                <p style="color: white;font-size: 70px;">GAME DAILY RESET TRACKER</p>
                                <img src="/gdrt/src/images/rocket.png" class="search-icon" alt="Error" style="width:90px;height:90px;margin-left: -85px">
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td align='center'><p style="color: white;font-size: 45px;">การแจ้งเตือน</p></td> 
                        </tr>
                        <tr>
                        <td align='center'>
                                <span class="toggle-text">เปิดการแจ้งเตือน</span>
                                <label class="switch">
                                    <input type="checkbox" id="noti_toggle" onchange="toggleNotification(this)"
                                    <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                    <span class="slider"></span>
                                </label>
                        </td> 
                        </tr>
                        <tr style="display: flex;justify-content: center;padding-top:25px;align-items: center;">
                            <td>
                                <img src="/gdrt/src/images/p.png" class="search-icon" alt="Error" style="width:45px;height:45px">
                            </td> 
                            <td style="margin-left: 10px;margin-right: 10px">
                                <input type="url" name="noti" style="width: 300px;height: 45px;border-radius: 45px;padding-left: 7px" >
                            </td>
                            <td style="width : 45px;background:#545454;text-align : center;border-radius: 45px;height:45px;">
                                <a href="/gdrt/src/" style="text-decoration: none;color : white;display: flex;justify-content: center;align-items: center;width: 100%;height: 100%;"> ?</a>
                            </td>
                        </tr>
                        <tr style="display: flex;justify-content: center;padding-top:25px">
                            <td style="padding-right:25px;">
                                <input value="save" type="submit" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px;">
                                <input type="hidden" name="option" value="discord">
                                <input type="hidden" name="task" value="insert"> 
                            </td>
                            <td>
                                <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>    

            <script>
            function toggleNotification(checkbox) {
                let isChecked = checkbox.checked ? 1 : 0;
                
                isNotificationEnabled = checkbox.checked;

                fetch('/gdrt/src/savenoti.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'noti_status=' + isChecked
                });
            }
        </script>
            
            <?php
    } 
    
function insert() { 
    $noti = $_REQUEST['noti'];
    $id = $_SESSION['ssid'];
    $conn   = new connect();
    $sql = "select `user_fav_id` from `discordapi` where `user_fav_id` = '".$id."'";
    $res = $conn -> query($sql);
    $cdr = $res -> fetch();
    $check_user_id = $cdr['user_fav_id'];
    
    if ($noti == NULL) {
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เพื่ม API ไม่สำเร็จ",
                      type: "error"
                  }, function() {
                      window.location = "/gdrt/src/discord/notification";
                  });
                }, 200);
            </script>'; }
    elseif ($id == $check_user_id) {
        $sql = "UPDATE `discordapi` set `api` = '".$noti."' where  `user_fav_id` = '".$check_user_id."'";
		$conn = new connect();
		$res = $conn->query($sql);
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เปลี่ยน API สำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "/gdrt/src/profile";
                  });
                }, 200);
            </script>';
    }
    elseif ($check_user_id == '') {
        $sql = "insert `discordapi` set `api` = '".$noti."' , `user_fav_id` = '".$id."' ";
		$conn = new connect();
		$res = $conn->query($sql);
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เพื่ม API สำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "/gdrt/src/discord/notification";
                  });
                }, 200);
            </script>';
             }
    }

    
}
 ?>