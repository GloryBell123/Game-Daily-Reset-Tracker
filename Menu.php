    <style>
     * {
        font-family: 'Kanit', sans-serif;
    }
    </style>
    <nav class="navbar navbar-expand-lg"  style="padding-top: 10px;">
        <div class="container-fluid" style="height: 70px;display: flex;align-items: center;justify-content: space-between;">

            <div style="height: 70px;display: flex;align-items: center;padding-left:10px;gap:10px">
                <img draggable="false" src="images/clock.png" class="search-icon" alt="Error" style="width:50px;height:50px;">
                <span style="color: white;font-size: 40px;">GAME DAILY RESET TRACKER</span>
            </div>

            <?php
            require_once ('connect.php');
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                $username = null;
            }
            if (isset($_SESSION['username'])) { // หลัง login
                $conn = new connect();
                $user_id = $_SESSION['ssid']; 
                $sql = "select * from `user` where `id` = '".$user_id."' ";
                $res = $conn -> query($sql);
                $cdr = $res -> fetch() ;
        ?> 

            <div style="display: flex; flex-direction: column; align-items: center; position: relative; ">
                <div data-bs-toggle="dropdown" style="width: 70px; height: 70px; cursor: pointer;">
                    <img draggable="false" src="images/profile_image/<?php echo $cdr['profile']; ?>.png" alt="Error" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                </div>
                    
                <ul class="dropdown-menu dropdown-menu-end" style="margin-top: -25px;">
                    <li>
                        <a class="dropdown-item" style="border-bottom: 2px dashed; text-align: center;"><?php echo $username;?></a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile" style="text-align: center;">แก้ไขโปรไฟล์</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="index.php?option=logre&task=logout" style="color: black; font-weight: bold; text-align: center;">ออกจากระบบ</a>
                    </li>
                </ul>
                <div style="color: white; text-align: center;write-space: nowrap;">
                    <?php echo $username;?>
                </div>
            </div>
        </div>
    </nav>
                <?php
                }

                else{       // ก่อน login
                    ?>
                <div>
                    <img draggable="false" src="images/P.png" style="width:35px;height:35px">
                    <a href="logre/login_form" class="btn btn-outline-light" style="border: 0;font-size: 20px"> Login / Register </a>
                </div>
            </div>
        </nav>
                <?php
                }

            