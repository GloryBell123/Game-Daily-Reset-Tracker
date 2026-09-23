<head>
    <style>
        .profile-cell {
            position: relative;
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
        .title {
            font-size: clamp(20px, 5vw, 58px);
        }
        .title-img {
            width: clamp(28px, 5vw, 90px); 
            height: clamp(28px, 5vw, 90px);
            object-fit: contain;
        }
        .img_input {
            width: clamp(20px, 5vw, 30px);
            height: clamp(20px, 5vw, 30px);
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 25px;
        }
        .logrebox {
            width: clamp(300px, 50vw, 400px);
            padding: 20px;
            border: 1px #00f2ff solid;
            border-radius:45px;
            background-color: #334155;
            display: flex;
            justify-content: center;
        }
        .input_style{
            width: clamp(230px, 30vw, 300px); 
            height: clamp(35px, 5vw, 45px); 
            border-radius: 45px; 
            padding-left: 50px; 
            border: none; 
            margin: 0 10px;
            background-color: #545454;
        }
       
        
    </style>
</head>




<?php

class edit
{

 
 function username() { ?>
    
                <div class="d-flex justify-content-center text-center px-3">
                    <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
                </div>
                <div class="d-flex justify-content-center">        
                    <span style="color: white;font-size: clamp(20px, 8vw, 45px);">เปลี่ยนชื่อผู้ใช้</span>
                </div>
                <div class="col-12 d-flex justify-content-center mt-2">     
                    <div class="logrebox col-12"> 
                        <form action='/gdrt/src/index.php' method='post'> 
                            <div class="inputwimg">
                                <img class="img_input" autocomplete="off" draggable="false" src="/gdrt/src/images/nigga.png" alt="Error">
                                <input required name="username" maxlength="10" placeholder="กรุณากรอก Username" class="input_style">
                            </div>
                            <div style="display: flex;justify-content: center;padding-top:25px;gap :25px">       
                                <input value="ยืนยัน" type="submit" style="border: 0px; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                                <input type="hidden" name="option" value="edit">
                                <input type="hidden" name="task" value="edit_username">
                                <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                            </div>  
                        </form>
                    </div>    
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

            
               
                <div class="d-flex justify-content-center text-center px-3">
                    <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
                </div>
                <div class="d-flex justify-content-center">
                    <span style="color: white;font-size: clamp(20px, 8vw, 45px);">เปลี่ยนรหัสผ่าน</span>
                </div>
               
                <div class="col-12 d-flex justify-content-center mt-2">     
                    <div class="logrebox col-12"> 
                        <form action='/gdrt/src/index.php' method='post'> 
                            <span style="color: white;font-size: 25px;">รหัสผ่านใหม่ <a style="color : red">*</a></span>
                            <div class="d-flex flex-column align-items-center">
                                <div class="inputwimg mt-2">
                                    <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" class="img_input">
                                    <input required name="password" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="กรอกรหัสผ่านใหม่" class="input_style">
                                </div>
                                <div class="inputwimg mt-2">
                                    <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" class="img_input">
                                    <input required name="confirmpass" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" class="input_style">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 gap-3">     
                                <input value="ยืนยัน" type="submit" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                                <input type="hidden" name="option" value="edit">
                                <input type="hidden" name="task" value="edit_password">
                                <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                            </div>
                        </form>
                    </div>    
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
                      title: "เปลี่ยนรหัสผ่านสำเร็จ",
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
                    title: "รหัสผ่านไม่ตรงกัน",
                    type: "error"
                }, function() {
                    window.location = "/gdrt/src/edit/password";
                });
                }, 200);
            </script>';
        }
 }
    function edit_profile() { ?>
  <div class="container">
    <form action='/gdrt/src/index.php' method='post' >
        <div class="d-flex justify-content-center text-center px-3">
            <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
        </div>
        <div class="d-flex justify-content-center">
            <span style="color: white;font-size: clamp(20px, 8vw, 45px);">ตั้งค่ารูปโปรไฟล์</span>
        </div>

        <?php
        if (isset($_SESSION['username'])) {$conn = new connect();
            $user_id =$_SESSION['ssid']; 

            $sql = "select * from `user` where `id` = '".$user_id."' ";
            $res = $conn -> query($sql);
            $cdr =$res -> fetch();
            $profile =$cdr['profile'];
        }
        ?>

        <div class="p-3 p-md-4 mx-auto" style="background-color: rgba(255, 255, 255, 0.6); max-width: 1200px;border-radius:45px">
            <div class="row g-4 align-items-center">
                <div class="col-12 col-md-4 col-lg-3 d-flex flex-column align-items-center justify-content-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3 " 
                         style="width: 180px; height: 180px; overflow: hidden; background-color:gray">
                        <img draggable="false" id='current-profile' src="/gdrt/src/images/profile_image/<?php echo $profile; ?>.png" alt="Profile Preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <input type='submit' value='Save' class="btn text-white px-4 rounded-pill shadow-sm" style="background:#545454; width: 130px;">
                        <input type="hidden" name="option" value="edit">
                        <input type="hidden" name="task" value="save_profile">
                        <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/profile","_self")' class="btn text-white px-4 rounded-pill shadow-sm" style="background:#545454; width: 130px;">
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="p-3 p-md-4 bg-secondary" style="border-radius:45px">
                        <div class="row row-cols-3 row-cols-sm-4 row-cols-lg-6 g-2 g-md-3">
                            <?php for ($i = 1; $i <= 18; $i++): ?>
                                <div class="col text-center">
                                    <label class="profile-cell d-block cursor-pointer position-relative">
                                        <input type="radio" name="new_profile" value="<?php echo $i; ?>" 
                                               onclick="changePreview('<?php echo $i; ?>')" 
                                               <?php echo ($profile ==$i) ? 'checked' : ''; ?>
                                               class="btn-check p-1">
                                        <img draggable="false" src="/gdrt/src/images/profile_image/<?php echo $i; ?>.png" 
                                               class="img-fluid rounded-circle p-1 profile-option-img"
                                               alt="Profile <?php echo $i;?>">
                                    </label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
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