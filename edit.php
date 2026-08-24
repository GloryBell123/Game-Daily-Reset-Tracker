<head>
    <style>
        .profile-cell {
            position: relative;
            padding: 10px;
        }
        .profile-cell input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        .profile-cell img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.2s;
            border: 4px solid transparent;
        }
        .profile-cell input[type="radio"]:checked + img {
            border-color: #a3d2f7;
            background-color: #a3d2f7;
        }
        .inputwimg {
            position: relative;
            display: inline-block;
        }
    </style>
</head>




<?php

class edit
{

 
 function username() { ?>
    <div class="container" style="display: flex;justify-content: center;height: 500px">
            <form action='/gdrt/src/index.php' method='post'>
                <table>
                    <tr>
                         <td>
                            <div>
                                <p style="color: white;font-size: 70px;"><img draggable="false" src="/gdrt/src/images/rocket.png" alt="Error" style="width:90px;height:90px;">GAME DAILY RESET TRACKER</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                       <td align='center'>
                            <p style="color: white;font-size: 45px;">เปลี่ยนชื่อผู้ใช้</p>
                        </td> 
                    </tr>
                    <tr align='center'>
                        <td >
                            <div class="inputwimg">
                                <img autocomplete="off" draggable="false" src="/gdrt/src/images/nigga.png" alt="Error" style="width:25px;height:25px;left : 15px;position: absolute;top:50%;transform: translateY(-50%);">
                                <input required name="username" maxlength="10" placeholder="กรุณากรอก Username" style="border: 0px;background-color: #545454;width:320px;height: 40px; border-radius: 45px; padding-left: 50px;">
                            </div>
                        </td>
                    </tr>
                    <tr style="display: flex;justify-content: center;padding-top:25px">
                        <td style="padding-right:25px;">
                            <input value="ยืนยัน" type="submit" style="border: 0px; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                            <input type="hidden" name="option" value="edit">
                            <input type="hidden" name="task" value="edit_username">
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    

 <?php
 }

 function edit_username() {
    $user = $_REQUEST['username'];
    $id = $_SESSION['ssid'];
    $sql = "update `user` set `username` = '".$user."' where id = '".$id."' ";
    
		$conn = new connect();
		$res = $conn->query($sql);
        $_SESSION['username'] = $user;
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เปลี่ยนชื่อสำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "/gdrt/src/profile";
                  });
                }, 200);
            </script>';
 }


 function password() { ?>
    <div class="container" style="display: flex;justify-content: center;height: 500px">
            <form action='/gdrt/src/index.php' method='post'>
                <table>
                    <tr>
                         <td>
                            <div>
                                <p style="color: white;font-size: 70px;"><img src="/gdrt/src/images/rocket.png" class="search-icon" alt="Error" style="width:90px;height:90px">GAME DAILY RESET TRACKER</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                       <td align='center'><p style="color: white;font-size: 45px;">เปลี่ยนรหัสผ่าน</p></td> 
                    </tr>
                    <tr>
                       <td align='center'><p style="color: white;font-size: 25px;margin-left : -160px;">รหัสผ่านใหม่ <a style="color : red">*</a></p></td> 
                    </tr>
                    <tr align='center'>
                        <td>
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" style="width:45px;height:45px;left: 2px;position: absolute;top: 50%;transform: translateY(-50%);">
                                <input required name="password" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="กรอกรหัสผ่านใหม่" style="border: 0px;background-color: #545454;width:320px;height: 40px; border-radius: 45px;padding-left: 50px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style="padding-top:25px">
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" style="width:45px;height:45px;left: 2px;position: absolute;top: 50%;transform: translateY(-50%);">
                                <input required name="confirmpass" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" style="border: 0px solid;background-color: #545454; width:320px;height: 40px; border-radius: 45px;padding-left: 50px;">
                            </div>
                        </td>
                    </tr>

                    <tr style="display: flex;justify-content: center;padding-top:25px">
                        <td style="padding-right:25px;">
                            <input value="ยืนยัน" type="submit" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                            <input type="hidden" name="option" value="edit">
                            <input type="hidden" name="task" value="edit_password">
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    
    
    <?php
 }
 
 function edit_password() {
    $pass = $_REQUEST['password'];
    $confirm = $_REQUEST['confirmpass'];
    $id = $_SESSION['ssid'];
    if ($pass == $confirm) 
    {
        $sql = "update `user` set `pass` = '".sha1($pass)."' where id = '".$id."' ";
		$conn = new connect();
		$res = $conn->query($sql);
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เปลี่ยนรหัสสำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "/gdrt/src/profile";
                  });
                }, 200);
            </script>';
    }
    else {
            echo '<script>
                setTimeout(function() {
                swal({
                    title: "รหัสไม่ตรงกัน",
                    type: "error"
                }, function() {
                    window.location = "/gdrt/src/edit/password";
                });
                }, 200);
            </script>';
        }
 }
    function edit_profile() { ?>
    <div class="container" style="display: flex;justify-content: center;height: 700px">
            <form action='/gdrt/src/index.php' method='post'>
                <table align='center'>
                    <tr>
                         <td>
                            <div>
                                <p style="color: white;font-size: 70px;"><img src="/gdrt/src/images/rocket.png" alt="Error" style="width:90px;height:90px;">GAME DAILY RESET TRACKER</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                       <td align='center'><p style="color: white;font-size: 45px;">ตั้งค่ารูปโปรไฟล์</p></td> 
                    </tr>
                </table>
                <?php
                
                 if (isset($_SESSION['username'])) {
                    $conn = new connect();
                    $user_id = $_SESSION['ssid']; 
    
                    $sql = "select * from `user` where `id` = '".$user_id."' ";
                    $res = $conn -> query($sql);
                    $cdr = $res -> fetch() ;
                    $profile = $cdr['profile'];
                    }
                ?>
                <div style="background-color: rgba(255, 255, 255, 0.6);width:1200px;height:500px;border-radius:50px">
                    <div style="display:flex;">
                        <div style="margin-top: 30px;margin-left: 50px;">
                            <div style="border-radius:50%;background-color: grey;width:180px;height:180px;display:flex;align-items: center;justify-content: center;">
                                <img id='current-profile' src="/gdrt/src/images/profile_image/<?php echo $profile; ?>.png" alt="Error" style="width:180px;height:180px;">
                            </div>
                            <div style='display:flex;align-items: center;justify-content: center;'>
                                <input type='submit' value='save' style="margin-top:20px;border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                                <input type="hidden" name="option" value="edit">
                                <input type="hidden" name="task" value="save_profile">
                            </div>
                            <div style='display:flex;align-items: center;justify-content: center;'>
                                <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")' style="margin-top:20px;;border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                            </div>
                        </div>
                        <div style="margin-top: 30px;margin-left: 50px;background-color: grey;width: 888px;height: 450px;border-radius: 45px;">
                            <table>
                                <tr>
                                    <?php 
                                    for ($i = 1;$i <= 18;$i++) {
                                        if ($i > 1 && ($i - 1) % 6 == 0) {
                                            echo "</tr><tr>";
                                        }
                                        ?>
                                        <td align="center">
                                            <label class="profile-cell">
                                                <input type="radio" name="new_profile" value="<?php echo $i; ?>" onclick="changePreview('<?php echo $i; ?>')" <?php echo ($profile == $i) ? 'checked' : ''; ?>>
                                                <img src="/gdrt/src/images/profile_image/<?php echo $i; ?>.png" alt="error">
                                            </label>
                                        </td>
                                        <?php 
                                    } 
                                    ?>
                                </tr>
                            </table>
                        </div>
                    <div>
                </div>
            </form>
    </div>    
    <script>
        function changePreview(imgName) {
            document.getElementById('current-profile').src = '/gdrt/src/images/' + 'profile_image/' + imgName + '.png';
        }
    </script>
 <?php
 }
function save_profile() {
    $newprofile = $_REQUEST['new_profile'];
    $id = $_SESSION['ssid'];
        $sql = "update `user` set `profile` = '".$newprofile."' where id = '".$id."' ";
		$conn = new connect();
		$res = $conn->query($sql);
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เปลี่ยนโปรไฟล์สำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "/gdrt/src/profile";
                  });
                }, 200);
            </script>';
}

}
?>