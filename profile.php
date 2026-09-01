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
    

                if (isset($_SESSION['username'])) {
                    $conn = new connect();
                    $user_id = $_SESSION['ssid']; 
    
                    $sql = "select * from `user` where `id` = '".$user_id."' ";
                    $res = $conn -> query($sql);
                    $cdr = $res -> fetch() ;
                 }
                ?>
<div class="col-12 col-md-10 col-lg-8 px-5">
    <div class="d-flex align-items-center mb-3 text-white fw-bold" style="font-size: clamp(0.9rem, 2.5vw, 3rem);">
        <img src="images/mag.png" alt="search" class="me-2" style="width: 35px; height: 35px;">
        <span>PROFILE</span>
    </div>
    <div class="d-flex flex-column flex-sm-row align-items-center p-md-4 mb-4 text-white" style="border-radius: 45px;border: 1.5px #00f2ff solid;background-color: #334155;margin-left:30px">
        <div class="d-flex flex-column align-items-center me-sm-4 mb-sm-0" style="min-width: 120px;">
            <img src="images/profile_image/<?php echo $cdr['profile']; ?>.png" alt="Profile" class="rounded-circle mb-1" style="width: 100px; height: 100px; object-fit: cover;">
            <a class="text-decoration-none fw-bold" href="edit/edit_profile" style="font-size: 1.8rem;color :black">EDIT</a>
        </div>
        <div class="w-100 text-break p-3" style="font-size: clamp(0.9rem, 2.5vw, 1.8rem);">
            <div class="d-flex flex-wrap">
                <span>Username : <?php echo $cdr['username'];?></span>
                <a class="text-decoration-none" href="edit/username">🐑</a>
            </div>
            <div class="d-flex flex-wrap">
                <span>Password : ********</span>
                <a class="text-decoration-none" href="edit/password">🐑</a>
            </div>
            <div class="text-truncate">
                <span>Email : <?php echo $cdr['email'];?></span>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column gap-2 ps-2 fw-bold" style="font-size: clamp(1.1rem, 3vw, 1.5rem);margin-left:30px">
        <div>
            <a href="discord/notification" class="text-white text-decoration-underline">การตั้งค่าการแจ้งเตือน</a>
        </div>
        <div>
            <a href="index.php?option=logre&task=logout" class="text-white text-decoration-underline">ออกจากระบบ</a>
        </div>
    </div>
</div>
<a href="home" style="position: fixed;bottom: 40px;right: 40px;font-size: 1.2rem;background-color: #545454;color: white;width: 160px;height: 45px;border: none;border-radius: 45px; text-align: center;line-height:45px;text-decoration: none;">
   กลับหน้าหลัก
</a>
   </div>
<?php
    }
}
?>