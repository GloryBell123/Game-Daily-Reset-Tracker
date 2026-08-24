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
        .inputwimg {
            position: relative;
            display: inline-block;
        }

    </style>
</head>


<?php

class logre
{

function login_form()
 {
 ?>
        <div style="display: flex;justify-content: center;">
                <p style="color: white;font-size: 70px;"><img draggable="false" src="/gdrt/src/images/rocket.png" alt="Error" style="width:90px;height:90px;">GAME DAILY RESET TRACKER</p>
        </div>
        <div class="container" style="display: flex;justify-content: center;width: 400px;padding: 20px;border: 1px #00f2ff solid;border-radius:45px;background-color: #334155;">
            <form action='/gdrt/src/index.php' method='post'>
                <table>
                    <tr>
                       <td align='center'><p style="color: white;font-size: 50px;">LOGIN</p></td> 
                    </tr>
                    <tr align='center'>
                        <td>
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/nigga.png" alt="Error" style="width:20px;height:20px;position: absolute;top: 50%;transform: translateY(-50%);left: 15px;">
                                <input name="email" placeholder="กรุณากรอก Email" style="border: 0px #00f2ff solid;background-color: white;width:320px;height: 40px; border-radius: 45px;padding-left: 50px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style="padding-top:25px">
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" style="width:45px;height:45px;position: absolute;top: 50%;transform: translateY(-50%);left: 2px">
                                <input name="password" type="password" minlength="8" maxlength="12" placeholder="กรุณากรอก Password" style="border: 0px #00f2ff solid;background-color: white; width:320px;height: 40px; border-radius: 45px;padding-left: 50px;">
                            </div>
                        </td>
                    </tr>

                    <tr align='center'>
                        <td style="padding-top:25px">
                            <input value="ยืนยัน" type="submit" style="border: 3px lime solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                            <input type="hidden" name="option" value="logre">
                            <input type="hidden" name="task" value="login">
                        </td>
                    </tr>
                    <tr style="display: flex;justify-content: center;padding-top:25px">
                         <td style="padding-right:25px;">
                            <a align='center' class="nav-link active" href="register_form" style="border: 3px #00f2ff solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">ยังไม่มีบัญชี?</a>
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")'  style="border: 3px #0f2ef5 solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    
<?php
 }

function login()
{
    $user = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $conn   = new connect();
    $sql = "select * from `user`
            where `email` = '".$user."'
            and `pass` = '".sha1($pass)."'";
    $res = $conn -> query($sql);
    $cc = 0;
    while ($cdr = $res -> fetch())
        {
            $_SESSION['ssid'] = $cdr['id'];
            $_SESSION['username'] = $cdr['username'];
            $cc = 1;
            
        }
        if ($cc == 0) {
            echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เข้าสู่ระบบไม่สำเร็จ",
                      text: "Email หรือ Password ผิด",
                      type: "error"
                  }, function() {
                      window.location = "/gdrt/src/logre/login_form";
                  });
                }, 200);
            </script>';
        } else {
            echo '<script>
                setTimeout(function() {
                swal({
                    title: "เข้าสู่ระบบสำเร็จ",
                    type: "success"
                }, function() {
                    window.location = "/gdrt/src/home";
                });
                }, 200);
            </script>';
        }
    }
function logout() {
        session_destroy();
        header('location:home');
}

function register_form()
{
?>
    <div style="display: flex;justify-content: center;">
        <p style="color: white;font-size: 70px;"><img draggable="false" src="/gdrt/src/images/rocket.png" alt="Error" style="width:90px;height:90px;">GAME DAILY RESET TRACKER</p>
    </div>
     <div class="container" style="display: flex;justify-content: center;width: 400px;padding: 20px;border: 1px #00f2ff solid;border-radius:45px;background-color: #334155;">
            <form action='' method='post'>
                <table>
                            
                    <tr>
                       <td align='center'><p style="color: white;font-size: 50px;">REGISTER</p></td> 
                    </tr>
                    <tr align='center'>
                        <td>
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/nigga.png" alt="Error" style="width:20px;height:20px;position: absolute;top: 50%;transform: translateY(-50%);left: 15px;">
                                <input required name="username" placeholder="ชื่อผู้ใช้" maxlength="10" style="border: 0px #00f2ff solid;background-color: white;width:320px;height: 40px; border-radius: 45px;padding-left: 50px">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" style="width:45px;height:45px;position: absolute;top: 50%;transform: translateY(-50%);left: 2px;">
                                <input required name="password" type="password" minlength="8" maxlength="12" placeholder="รหัสผ่าน" style="background-color: white; width:320px;height: 40px; border-radius: 45px;padding-left: 50px">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style="padding-top:25px">
                            <div class="inputwimg">
                                <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" style="width:45px;height:45px;left: 2px;position: absolute;top: 50%;transform: translateY(-50%);">
                                <input required name="confirmpass" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" style="background-color: white; width:320px;height: 40px; border-radius: 45px;padding-left: 50px">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <div class="inputwimg" >
                                <img draggable="false" src="/gdrt/src/images/mail.png" alt="Error" style="width:20px;height:20px;position: absolute;top: 50%;transform: translateY(-50%);left: 15px;">
                                <input required name="email" type="email" size="50" placeholder="Email" style="border: 0px #00f2ff solid;background-color: white; width:320px;height: 40px; border-radius: 45px;padding-left: 50px">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <input value="ยืนยัน" type="submit" style="border: 3px lime solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                        </td>
                    </tr>
                    <tr style="display: flex;justify-content: center;padding-top:25px">
                         <td style="padding-right:25px;">
                            <a align='center' class="nav-link active" href="/gdrt/src/logre/login_form" style="border: 3px #00f2ff solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">มีบัญชีอยู่แล้ว</a>
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")'  style="border: 3px #0f2ef5 solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    

<?php
 if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) ) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confirm = $_REQUEST['confirmpass'];
    $email = $_REQUEST['email'];

    $conn = new connect();
    if ($password == $confirm) 
    {
        $sql = "select `id` from `user` where `email` = '".$email."'";
        $res = $conn -> query($sql);
        if($res->rowCount() > 0){
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "มีบัญชีที่ใช้ Email นี้สมัครแล้ว",  
                            text: "กรุณาใช้ Email อื่น",
                            type: "warning"
                        }, function() {
                            window.location = "/gdrt/src/logre/register_form";
                        });
                        }, 200);
                </script>';
        } else {
            $sql ="insert into `user` set `username` = '".$username."', `email` = '".$email."', `pass` = '".sha1($password)."'";
            $res = $conn -> query($sql);
            if($res){
                echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "สมัครสมาชิกสำเร็จ",
                        text: "กรุณา Login",
                        type: "success"
                    }, function() {
                        window.location = "/gdrt/src/logre/login_form";
                    });
                    }, 200);
                </script>';
            } else {
            echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "สมัครสมาชิกไม่สำเร็จ",
                        type: "error"
                    }, function() {
                        window.location = "/gdrt/src/logre/register_form";
                    });
                    }, 200);
                </script>';
            }
        }
  }
  else {
            echo '<script>
                setTimeout(function() {
                swal({
                    title: "รหัสไม่ตรงกัน",
                    type: "error"
                }, function() {
                    window.location = "";
                });
                }, 200);
            </script>';
        }
 }
 }

 

}
?>