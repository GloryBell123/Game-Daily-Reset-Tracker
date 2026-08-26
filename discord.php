<head>
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        .toggle-text {
            font-size : 20px;
            color : white;
            
        }
        .switch_main{
            margin-left: 5px;
            position: relative;
            display: inline-block;
            width: 60px;  
            height: 30px;
        }
        .switch_sub{
            margin-left: 5px;
            position: relative;
            display: inline-block;
            width: 50px;  
            height: 25px;
        }

        .switch_main input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }
        
        .switch_sub input{
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .slider_main {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #545454; 
            transition: 0.5s;         
            border-radius: 45px;     
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #545454; 
            transition: 0.5s;         
            border-radius: 45px;     
        }
        .slider_main::before {
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
        .slider::before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.5s;
            border-radius: 50%;
        }
        .switch_main input:checked + .slider_main {
            background-color: #00e676;
        }
        .switch_sub input:checked + .slider {
            background-color: #00e676;
        }
        .switch_main input:checked + .slider_main::before {
            transform: translateX(30px);
            background-color: white;
        }
        .switch_sub input:checked + .slider::before {
            transform: translateX(25px);
            background-color: white;
        }
        .inputwimg {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>


<?php
class discord {
    function notification() { 
        $user_id = $_SESSION['ssid'];
        $conn = new connect();
            $sql = "SELECT `noti_status` FROM `user` WHERE `id` = '".$user_id."'";
            $res = $conn -> query($sql);
            $cdr = $res -> fetch();
            $user_noti_status = $cdr['noti_status'];


            $sql = "SELECT `api` FROM `discordapi` WHERE `user_fav_id` = '".$user_id."'";
            $res = $conn -> query($sql);
            $cdr = $res -> fetch();
            $user_webhook_url = $cdr['api'];
            
        ?>
        <div style="display: flex;justify-content: center;height: 500px;">
                <form action="" method="post">
                                    <div class="inputwimg">
                                        <img src="/gdrt/src/images/clock.png" alt="Error" style="width:90px;height:90px;">
                                        <p style="color: white;font-size: 70px;">GAME DAILY RESET TRACKER</p>
                                    </div >
                                        <div style="display: flex;justify-content: center">
                                        <p style="color: white;font-size: 45px;">การแจ้งเตือน</p>
                                        </div>
                                    <div style="margin-left:25%;display: inline-box;background-color: #334155;width:500px;padding:10px 0px 10px 0px;border-radius: 20px;border : 2px #00f2ff solid">
                                        <div style="display: flex;justify-content: center;align-items:center">
                                            <span style="font-size : 30px;color : white;">เปิดการแจ้งเตือน </span>
                                            <label class="switch_main">
                                                <input type="checkbox" id="noti_toggle" onchange="toggleNotification(this)"
                                                <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                                <span class="slider_main"></span>
                                            </label>
                                        </div>
                                
                                        <div style="display: flex;justify-content: center;align-items:center">
                                            <span class="toggle-text">แจ้งเตือนเมื่อเหลือ 10 นาที</span>
                                            <label class="switch_sub">
                                                <input type="checkbox" id="noti_toggle" onchange="toggleNotification(this)"
                                                <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div style="display: flex;justify-content: center;align-items:center">
                                                <span class="toggle-text">แจ้งเตือนเมื่อเหลือ 30 นาที</span>
                                                <label class="switch_sub">
                                                    <input type="checkbox" id="noti_toggle" onchange="toggleNotification(this)"
                                                    <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                                    <span class="slider"></span>
                                                </label>
                                        </div>
                                        <div style="display: flex;justify-content: center;align-items:center">
                                                <span class="toggle-text" style="">แจ้งเตือนเมื่อเหลือ 60 นาที</span>
                                                <label class="switch_sub">
                                                    <input type="checkbox" id="noti_toggle" onchange="toggleNotification(this)"
                                                    <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                                    <span class="slider"></span>
                                                </label>
                                        </div>
                                        <div style="display: flex;justify-content: center;padding-top:25px;">
                                            <img src="/gdrt/src/images/p.png" alt="Error" style="width:45px;height:45px">

                                            <input placeholder="กรอก Url Webhook" name="noti" type="url" value="<?php echo htmlspecialchars($user_webhook_url); ?>"
                                            pattern="https?://(www\.)?(discord|discordapp)\.com/api/webhooks/.*"  
                                            title="กรุณากรอก Discord Webhook URL ให้ถูกต้อง (ขึ้นต้นด้วย https://discord.com/api/webhooks/)" 
                                            style="width: 300px; height: 45px; border-radius: 45px; padding-left: 15px; border: 0px; margin: 0 10px;" required
                                            >
                                            
                                            <div style="width: 45px; height: 45px; background: #545454; border-radius: 45px; display: flex; justify-content: center; align-items: center;">
                                                <a href="/gdrt/src/" style="text-decoration: none; color: white;">?</a>
                                            </div>
                                        </div>
                                    
                                        <div style="display: flex;justify-content: center;padding-top:25px;gap :25px">
                                            <input type="submit" value="Save" style="border: 0px; background: #545454; border-radius: 45px; color: #ffffff; width: 100px;cursor: pointer;"></input>
                                            <input type="hidden" name="option" value="discord">
                                            <input type="hidden" name="task" value="insert"> 
                                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                                        </div>
                                    </div>
                               
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