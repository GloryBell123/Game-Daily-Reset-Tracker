      <nav class="navbar navbar-expand-lg"  style="background-color: #1e293b;padding-top: 10px;">
            <div class="container-fluid" style="height: 80px">
                <div class="search-navbar">
                    <p style="color: white;font-size: 40px;padding-left: 90px">GAME DAILY RESET TRACKER</p>
                    <img src="images/rocket.png" class="search-icon" alt="Error" style="width:90px;height:90px">
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
                <div style="display : flex;flex-wrap: wrap;justify-content: end;">
                    <div class="collapse navbar-collapse justify-content-end" style="width : 100%">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown" style="border-radius:50px">
                                <div data-bs-toggle="dropdown" style="width:50px;height:50px;background-color : grey;border-radius: 45px;display:flex;justify-content: center;align-items: center;"><img src="images/profile_image/<?php echo $cdr['profile']; ?>.png" alt="Error" style="width:70px;height:70px;cursor: pointer;"></div>
                                <ul class="dropdown-menu dropdown-menu-end" >
                                    <li>
                                        <a class="dropdown-item" style="border-bottom: 2px dashed;text-align: center;"><?php echo $username;?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="profile" style="text-align: center;">แก้ไขโปรไฟล์</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index.php?option=logre&task=logout" style="color:black;font-weight:bold;text-align: center;">ออกจากระบบ</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div style="color : white;padding-right:9%">
                            <?php echo $username;?>
                    </div>
              
                </div>
            </div>
        </nav>
                <?php
                }

                else{       // ก่อน login
                    ?>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav" style= "margin-right: 0px">
                        <li>
                            <img src="images/P.png" style="width:35px;">
                            <a href="logre/login_form" class="btn btn-outline-light" style="border: 0;font-size: 20px"> Login / Register </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
                <?php
                }

            