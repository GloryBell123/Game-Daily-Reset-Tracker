<head>
    <style>
            .edit{
                text-decoration: none;
                color : black;
            }
    </style>
</head>

<?php

class profile
{

 function def()
 
 {
    
 ?>
   <div style="padding-left : 100px;padding-bottom: 25px">
        <div style="display : flex;align-items: center;">
            <img src="images/mag.png" alt="Error" style="width:40px;height:40px;">
            <a style="font-size : 30px;color:white;padding-left : 5px">PROFILE</a>
        </div>
        
                <?php
                
                 if (isset($_SESSION['username'])) {
                    $conn = new connect();
                    $user_id = $_SESSION['ssid']; 
    
                    $sql = "select * from `user` where `id` = '".$user_id."' ";
                    $res = $conn -> query($sql);
                    $cdr = $res -> fetch() ;
                ?>
        <div style="padding-left : 50px">
            <table style="padding-left : 100px">
                <tr>
                    <td style="height: 70px;background-color: rgba(255, 255, 255, 0.6);border-radius: 45px;height: 200px;width:800px">
                        <div style="display: flex;">
                            <div style="width: 200px;text-align: center;">
                                <div>
                                    <img src="images/profile_image/<?php echo $cdr['profile']; ?>.png" alt="Error" style="width:120px;height:120px;">
                                </div>
                                <div style="font-size : 1.5rem">
                                    <a class="edit" href="edit/edit_profile">EDIT</a>
                                </div>
                            </div>
                            <div style="width: 500px;font-size : 1.7rem;color : white">
                                <div>
                                    Username : <?php echo $cdr['username'];?> <a class="edit" href="edit/username">🐑</a>
                                </div>
                                <div>
                                    Password : ******** <a class="edit" href="edit/password">🐑</a>
                                </div>
                                <div>
                                    Email : <?php echo $cdr['email'];?>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td style="height: 70px">
                    <a href="discord/notification" style="font-size : 30px;color:white;padding-left : 20px;">การตั้งค่าการแจ้งเตือน</a></td>
                </tr>
                <tr>
                    <td>
                    <a style="font-size : 30px;color:white;padding-left : 20px" href="index.php?option=logre&task=logout">ออกจากระบบ</a></td>
                </tr>
            </table>
        </div>
        <a href="home" style="position: fixed;bottom: 40px;right: 40px;font-size: 25px;background-color:#545454;color : white;width: 180px;border: none;border-radius: 45px;z-index: 999;text-align :center">กลับหน้าหลัก</a>
        <?php } ?>
   </div>
<?php
    }
}
?>