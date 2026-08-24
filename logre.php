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

class logre
{

function login_form()
 {
 ?>
        <div class="container" style="display: flex;justify-content: center;height: 500px">
            <form action='/gdrt/src/index.php' method='post'>
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
                       <td align='center'><p style="color: white;font-size: 50px;">LOGIN</p></td> 
                    </tr>
                    <tr align='center'>
                        <td>
                            <div class="search-navbar">
                            <input name="email" placeholder="กรุณากรอก Email" style="border: 0px solid;background-color: #545454;width:320px;height: 40px; border-radius: 45px; margin-left: 8px; padding-left: 50px;">
                            <img src="/gdrt/src/images/nigga.png" class="search-icon" alt="Error" style="width:20px;height:20px;margin-left:10px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style="padding-top:25px">
                            <div class="search-navbar">
                            <input name="password" type="password" size="50" placeholder="กรุณากรอก Password" style="border: 0px solid;background-color: #545454; width:320px;height: 40px; border-radius: 45px; margin-left: 8px; padding-left: 50px;">
                            <img src="/gdrt/src/images/unlockkey.png" class="search-icon" alt="Error" style="width:45px;height:45px;margin-left:-3px;">
                            </div>
                        </td>
                    </tr>

                    <tr align='center'>
                        <td style="padding-top:25px">
                            <input value="ยืนยัน" type="submit" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                            <input type="hidden" name="option" value="logre">
                            <input type="hidden" name="task" value="login">
                        </td>
                    </tr>
                    <tr style="display: flex;justify-content: center;padding-top:25px">
                         <td style="padding-right:25px;">
                            <a align='center' class="nav-link active" href="register_form" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">ยังไม่มีบัญชี?</a>
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
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
     <div class="container" style="display: flex;justify-content: center;height: 500px;">
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
                       <td align='center'><p style="color: white;font-size: 50px;">REGISTER</p></td> 
                    </tr>
                    <tr align='center'>
                        <td>
                            <div class="search-navbar">
                            <input required name="username" placeholder="Username" style="border: 0px solid;background-color: #545454;width:320px;height: 40px; border-radius: 45px; margin-left: 8px;text-align: center;">
                            <img src="/gdrt/src/images/nigga.png" class="search-icon" alt="Error" style="width:20px;height:20px;margin-left:10px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <div class="search-navbar">
                            <input required name="password" type="password" size="50" placeholder="Password" style="border: 0px solid;background-color: #545454; width:320px;height: 40px; border-radius: 45px; margin-left: 8px;text-align: center; ">
                            <img src="/gdrt/src/images/unlockkey.png" class="search-icon" alt="Error" style="width:45px;height:45px;margin-left:-3px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <div class="search-navbar" >
                            <input required name="email" type="email" size="50" placeholder="Email" style="text-align: center;border: 0px solid;background-color: #545454; width:320px;height: 40px; border-radius: 45px; margin-left: 8px;">
                            <img src="/gdrt/src/images/letter.png" class="search-icon" alt="Error" style="width:45px;height:30px;margin-left:-3px;">
                            </div>
                        </td>
                    </tr>
                    <tr align='center'>
                        <td style= "padding-top:25px">
                            <input value="ยืนยัน" type="submit" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">
                        </td>
                    </tr>
                    <tr style="display: flex;justify-content: center;padding-top:25px">
                         <td style="padding-right:25px;">
                            <a align='center' class="nav-link active" href="/gdrt/src/logre/login_form" style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff ;width:100px">มีบัญชีอยู่แล้ว</a>
                        </td>
                        <td>
                            <input type='button' value='กลับหน้าหลัก' onclick='window.open("/gdrt/src/home","_self")'  style="border: 0px solid; background:#545454; border-radius: 45px;color:#ffffff;width:100px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    

<?php
 if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) ) {
    $username = $_REQUEST['username'];
    $password = sha1($_REQUEST['password']);
    $email = $_REQUEST['email'];

    $conn = new connect();
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
        $sql ="insert into `user` set `username` = '".$username."', `email` = '".$email."', `pass` = '".$password."'";
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
 }

 

}
?>