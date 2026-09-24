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

        
        .title {
            font-size: clamp(20px, 5vw, 58px);
        }
        
        .title-img {
            width: clamp(28px, 5vw, 90px); 
            height: clamp(28px, 5vw, 90px);
            object-fit: contain;
        }
        
        .logrebox {
            width: clamp(300px, 50vw, 500px);
            padding: 20px;
            border: 1px #00f2ff solid;
            border-radius:45px;
            background-color: #334155;
            display: flex;
            justify-content: center;
        }
       
        .input_style{
            width: clamp(160px, 30vw, 300px); 
            height: clamp(30px, 5vw, 45px); 
            border-radius: 45px; 
            padding-left: 8px; 
            border: 0px; 
            margin: 0 10px;
        }
        
        
    </style>
</head>


<?php
class discord {
    function notification() { 
        $user_id = $_SESSION['ssid'];
        $conn = new connect();
            $sql = "SELECT `noti_status`,`noti_60`,`noti_30`,`noti_10` FROM `user` WHERE `id` = '".$user_id."'";
            $res = $conn -> query($sql);
            $cdr = $res -> fetch();
            $user_noti_status = $cdr['noti_status'];
            $user_noti_status_60 = $cdr['noti_60'];
            $user_noti_status_30 = $cdr['noti_30'];
            $user_noti_status_10 = $cdr['noti_10'];


            $sql = "SELECT `api` FROM `discordapi` WHERE `user_fav_id` = '".$user_id."'";
            $res = $conn -> query($sql);
            $cdr = $res -> fetch();
            $user_webhook_url = $cdr['api'];
            
        ?>
        <div class="d-flex justify-content-center text-center px-3">
            <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
        </div>
        <div class="d-flex justify-content-center">
            <p style="color: white;font-size: clamp(20px, 8vw, 45px);">การแจ้งเตือน</p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="logrebox col-12">
                <form action="" method="post">

                        <div style="display: flex;justify-content: center;align-items:center">
                            <span style="font-size: clamp(15px, 2.5vw,30px);color : white;">เปิดการแจ้งเตือน </span>
                            <label class="switch_main">
                                <input type="checkbox" id="noti_toggle" onchange="toggleNotification()"
                                <?php echo ($user_noti_status == 1) ? 'checked' : ''; ?>>
                                <span class="slider_main"></span>
                            </label>
                        </div>

                                    
                        <div style="display: flex;justify-content: center;align-items:center">
                            <span class="toggle-text" style="font-size: clamp(15px, 2.5vw,30px);color : white;">แจ้งเตือนเมื่อเหลือ 10 นาที</span>
                            <label class="switch_sub">
                                <input type="checkbox" id="noti_toggle_10" onchange="toggleNotification()"
                                <?php echo ($user_noti_status_10 == 1) ? 'checked' : ''; ?>>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div style="display: flex;justify-content: center;align-items:center">
                                <span class="toggle-text" style="font-size: clamp(15px, 2.5vw,30px);color : white;">แจ้งเตือนเมื่อเหลือ 30 นาที</span>
                                <label class="switch_sub">
                                    <input type="checkbox" id="noti_toggle_30" onchange="toggleNotification()"
                                    <?php echo ($user_noti_status_30 == 1) ? 'checked' : ''; ?>>
                                    <span class="slider"></span>
                                </label>
                        </div>
                        <div style="display: flex;justify-content: center;align-items:center">
                                <span class="toggle-text" style="font-size: clamp(15px, 2.5vw,30px);color : white;">แจ้งเตือนเมื่อเหลือ 60 นาที</span>
                                <label class="switch_sub">
                                    <input type="checkbox" id="noti_toggle_60" onchange="toggleNotification()"
                                    <?php echo ($user_noti_status_60 == 1) ? 'checked' : ''; ?>>
                                    <span class="slider"></span>
                                </label>
                        </div>
                        <div style="display: flex;justify-content: center;padding-top:25px;align-items:center">
                           
                            <img src="/gdrt/src/images/p.png" alt="Error" style="width: clamp(25px, 5vw, 45px);height: clamp(25px, 5vw, 45px);">
                            
                            <input class='input_style' placeholder="กรอก Url Webhook" name="noti" type="url" value="<?php echo htmlspecialchars($user_webhook_url); ?>"
                            pattern="https?://(www\.)?(discord|discordapp)\.com/api/webhooks/.*"  
                            title="กรุณากรอก Discord Webhook URL ให้ถูกต้อง (ขึ้นต้นด้วย https://discord.com/api/webhooks/)">
                                     
                            <div style="width: 45px; height: 45px;">
                                <button type="button" id="howto" style="width: 100%; height: 100%; background: #545454; border-radius: 45px; display: flex; justify-content: center; align-items: center;border : none;color :white">
                                    ?
                                </button>
                            </div>
                            <script>
                                        document.getElementById('howto').addEventListener('click', function() {
                                            swal({
                                                title: "วิธีหา Discord Webhook URL",
                                                text: "หน้าที่ 1",
                                                imageUrl: "/gdrt/src/images/howto1.png",
                                                imageSize: "300x400",
                                                imageAlt: "Error",
                                                showCancelButton: true,
                                                confirmButtonColor: "#00ccff",
                                                confirmButtonText: "หน้าต่อไป",
                                                cancelButtonText: "ปิดหน้าต่าง",
                                                reverseButtons: true
                                            }, function(nextpage) {
                                                if (nextpage) {
                                                    setTimeout(function() {
                                                        swal({
                                                        title: "วิธีหา Discord Webhook URL",
                                                        text: "หน้าที่ 2",
                                                        imageUrl: "/gdrt/src/images/howto2.png",
                                                        imageSize: "300x400",
                                                        imageAlt: "Error",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#00ccff",
                                                        confirmButtonText: "หน้าต่อไป",
                                                        cancelButtonText: "ปิดหน้าต่าง",
                                                        reverseButtons: true
                                                        }, function(nextpage) {
                                                            if (nextpage) {
                                                                setTimeout(function() {
                                                                    swal({
                                                                    title: "วิธีหา Discord Webhook URL",
                                                                    text: "หน้าที่ 3",
                                                                    imageUrl: "/gdrt/src/images/howto3.png",
                                                                    imageSize: "300x400",
                                                                    imageAlt: "Error",
                                                                    showCancelButton: true,
                                                                    cancelButtonText: "ปิดหน้าต่าง",
                                                                    showConfirmButton: false
                                                                    }
                                                                    )
                                                                }, 300);
                                                            }}
                                                        )
                                                    }, 300);
                                                }}
                                            )
                                        });
                                        </script>
                        </div>
                                        
                        <div style="display: flex;justify-content: center;padding-top:25px;gap :25px">
                            <input type="submit" value="Save" style="border: 0px; background: #545454; border-radius: 45px; color: #ffffff; width: 100px;cursor: pointer;"></input>
                            <input type="hidden" name="option" value="discord">
                            <input type="hidden" name="task" value="insert"> 
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </div>
                                        
                                
                </form>
            </div>
        </div>
            <?php
    } 
    
function insert() { 
    $noti = $_REQUEST['noti'];
    $id = $_SESSION['ssid'];
    $conn   = new connect();
    $sql = "select `user_fav_id` , `api` from `discordapi` where `user_fav_id` = '".$id."'";
    $res = $conn -> query($sql);
    $cdr = $res -> fetch();
    $check_user_id = $cdr['user_fav_id'];
    $check_api = $cdr['api'];
    
    if ($noti == NULL) {
        if ($id == $check_user_id) {
            if ($check_api != NULL) {
                $sql = "UPDATE `discordapi` set `api` = '".$noti."' where  `user_fav_id` = '".$check_user_id."'";
                $conn = new connect();
                $res = $conn->query($sql);
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ลบ API สำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "/gdrt/src/discord/notification";
                      });
                    }, 200);
                </script>';
            }
            else {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ไม่พบ API",
                          type: "error"
                      }, function() {
                          window.location = "/gdrt/src/discord/notification";
                      });
                    }, 200);
                </script>';
            }
        }
    }
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
<script src="/gdrt/src/js/logic.js"></script>