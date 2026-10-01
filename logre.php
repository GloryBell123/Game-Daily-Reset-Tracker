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
        .title {
            font-size: 58px;
        }
        @media (max-width: 835px) {
        .title {
            font-size: 22px;
        }
        }
        .title-img {
            width:90px;
            height:90px;
        }
        @media (max-width: 835px) {
        .title-img {
            width:30px;
            height:30px;
        }
        }
        .logrebox {
            width: 400px;
            padding: 20px;
            border: 1px #00f2ff solid;
            border-radius:45px;
            background-color: #334155;
            display: flex;
            justify-content: center;
        }
        @media (max-width: 835px) {
        .logrebox {
            width: 300px;
            padding: 15px;
            border: 1px #00f2ff solid;
            border-radius:45px;
            background-color: #334155;
        }
        }
        .logre_title {
            color: white;
            font-size: 50px;
        }
        @media (max-width: 835px) {
        .logre_title {
            color: white;
            font-size: 35px;
        }
        }
        .img_input {
            width:20px;
            height:20px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
        }
        .logre_input {
            border: none;
            background-color: white;
            width:320px;
            height: 40px;
            border-radius: 45px;
            padding-left: 50px;
        }
        @media (max-width: 835px) {
        .logre_input {
            border: none;
            background-color: white;
            width:250px;
            height: 40px;
            border-radius: 45px;
            padding-left: 50px;
        }
        }
        .logre_input_button {
            
            background:#545454;
            border-radius: 45px;
            color:#ffffff ;
            width:110px
        }
    </style>
</head>


<?php

class logre
{

function login_form()
 {
 ?>         
        <div class="d-flex justify-content-center">
            <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="logrebox col-12">
                <form action='' method='post'>
                    <div class="d-flex justify-content-center mb-2">
                        <span class="logre_title">LOGIN</span>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="inputwimg ">
                            <img draggable="false" src="/gdrt/src/images/nigga.png" alt="Error" class="img_input">
                            <input required name="email" placeholder="กรุณากรอก Email" class="logre_input">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="inputwimg">
                            <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" class="img_input">
                            <input required name="password" type="password" minlength="8" maxlength="12" placeholder="กรุณากรอก Password (ความยาว 8-12 ตัวอักษร)" class="logre_input">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <input class="logre_input_button" value="เข้าสู่ระบบ" type="submit" style="border: 3px lime solid;">
                        <input type="hidden" name="option" value="logre">
                        <input type="hidden" name="task" value="login">
                    </div>
                    <div class="d-flex justify-content-center gap-4">    
                        <input class="logre_input_button" type='button' value='ยังไม่มีบัญชี?' onclick='window.open("/gdrt/src/logre/register_form","_self")' style="border: 3px cyan solid;">
                        <input class="logre_input_button" type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")' style="border: 3px blue solid;">
                    </div>   
                </form>
            </div>
        </div>  
<?php
 }

function login()
{
    $user = '';
    $pass = '';

    $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $pass_pattern = '/^.{8,12}$/';
    
    if (preg_match($email_pattern, $_REQUEST['email'])) {
        $user = $_REQUEST['email'];
    }
    if (preg_match($pass_pattern, $_REQUEST['password'])) {
        $pass = $_REQUEST['password'];
    }

    if ($user == '') {
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "Invalid email format",  
                            text: "Email ต้องมี @ และ .",
                            type: "warning"
                        }, function() {
                            window.location = "/gdrt/src/logre/login_form";
                        });
                        }, 200);
                </script>';
            return false;
        }  
    elseif ($pass == '') {
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "Invalid password format",  
                            text: "ความยาว 8-12 ตัวอักษร",
                            type: "warning"
                        }, function() {
                            window.location = "/gdrt/src/logre/login_form";
                        });
                        }, 200);
                </script>';
            return false;
        }    
    
    $conn   = new connect();
    
    $sql = "select * from `user` where `email` = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $user, PDO::PARAM_STR);
    $stmt->execute();
    
    $cdr = $stmt->fetch();
        $sha1pass = sha1($pass);
        if ($cdr && $sha1pass == $cdr['pass']) {
            $_SESSION['ssid'] = $cdr['id'];
            $_SESSION['username'] = $cdr['username'];

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
        else {
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
        }
    }
function logout() {
        session_destroy();
        header('location:home');
}

function register_form()
{
?>

    <div class="d-flex justify-content-center">
        <span class="title" style="color: white;"><img draggable="false" src="/gdrt/src/images/clock.png" alt="Error" class="title-img">GAME DAILY RESET TRACKER</span>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="logrebox col-12">
            <form action='' method='post'>
                <div class="d-flex justify-content-center mb-2">
                    <span class="logre_title">REGISTER</span>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <div class="inputwimg ">
                        <img draggable="false" src="/gdrt/src/images/nigga.png" alt="Error" class="img_input">
                        <input required name="username" placeholder="ชื่อผู้ใช้" maxlength="10" class="logre_input">
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <div class="inputwimg ">
                        <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" class="img_input">
                        <input required name="password" type="password" minlength="8" maxlength="12" placeholder="รหัสผ่าน (ความยาว 8-12 ตัวอักษร)" class="logre_input">
                    </div>  
                </div>       
                <div class="d-flex justify-content-center mb-4">
                    <div class="inputwimg ">
                        <img draggable="false" src="/gdrt/src/images/unlockkey.png" alt="Error" class="img_input">
                        <input required name="confirmpass" type="password" minlength="8" maxlength="12" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" class="logre_input">
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <div class="inputwimg ">
                        <img draggable="false" src="/gdrt/src/images/mail.png" alt="Error" class="img_input">
                        <input required name="email" type="text" size="50" placeholder="Email" class="logre_input">
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <input value="สมัครสมาชิก" type="submit" style="border: 3px lime solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                </div>
                <div class="d-flex justify-content-center gap-4">    
                    <input class="logre_input_button" type='button' value='มีบัญชีอยู่แล้ว' onclick='window.open("/gdrt/src/logre/login_form","_self")' style="border: 3px cyan solid;">
                    <input class="logre_input_button" type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")' style="border: 3px blue solid;">
                </div>   
            </form>
        </div>
    </div>    

<?php
 if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) ) {
    $username = '';
    $password = '';
    $confirm = '';
    $email = '';

    $username_pattern = '/^[a-zA-Z0-9_-]{4,10}$/';
    $pass_pattern = '/^.{8,12}$/';
    $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if (preg_match($username_pattern, $_REQUEST['username'])) {
        $username = $_REQUEST['username'];
    }
    if (preg_match($pass_pattern, $_REQUEST['password'])) {
        $password = $_REQUEST['password'];
    }
    if (preg_match($pass_pattern, $_REQUEST['confirmpass'])) {
        $confirm = $_REQUEST['confirmpass'];
    }   
    if (preg_match($email_pattern, $_REQUEST['email'])) {
        $email = $_REQUEST['email'];
    }

    if ($username == '') {
        echo '<script>
            setTimeout(function() {
            swal({
                 title: "Invalid username format",  
                text: "Username ต้องมีความยาว 4-10 ตัวอักษร",
                type: "warning"
            }, function() {
                 window.location = "/gdrt/src/logre/register_form";
            });
            }, 200);
            </script>';
        return false;
    }   
    elseif ($password == '' || $confirm == '') {
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "Invalid password format",  
                            text: "ความยาว 8-12 ตัวอักษร",
                            type: "warning"
                        }, function() {
                            window.location = "/gdrt/src/logre/register_form";
                        });
                        }, 200);
                </script>';
            return false;
        }    
    elseif ($password != $confirm) {
        echo '<script>
            setTimeout(function() {
            swal({
                title: "รหัสผ่านไม่ตรงกัน",
                text: "กรุณากรอกรหัสผ่านให้ตรงกัน",
                type: "error"
                }, function() {
                    window.location = "/gdrt/src/logre/register_form";
                });
                }, 200);
            </script>';
            return false;
        }
    elseif ($email == '') {
            echo '<script>
                        setTimeout(function() {
                        swal({
                            title: "Invalid email format",  
                            text: "Email ต้องมี @ และ .",
                            type: "warning"
                        }, function() {
                            window.location = "/gdrt/src/logre/register_form";
                        });
                        }, 200);
                </script>';
            return false;
        }  
    
    else
    {
        $conn = new connect();
        $sql = "select `id` from `user` where `email` = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
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
            $sha1pass = sha1($password);
            $sql ="insert into `user` (`username`, `email`, `pass`) VALUES (:username, :email, :pass)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $sha1pass, PDO::PARAM_STR);
            
            $res = $stmt->execute();

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
    
    
 }
 }  
}
?>