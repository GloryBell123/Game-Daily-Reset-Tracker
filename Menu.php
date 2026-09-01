    <style>
     * {
        font-family: 'Kanit', sans-serif;
    }

    .brand-img {
        width: 60px;
        height: 60px;
    }

    .brand-text {
        font-size: 1.9rem;
    }

    .profile-avatar {
        width: 70px;
        height: 70px;
    }

    @media (max-width: 576px) {
    .brand-img {
        width: 40px;
        height: 40px;
    }
    }
    @media (max-width: 576px) {
    .brand-text {
        font-size: 0.9rem;
    }
    }
    @media (max-width: 576px) {
    .profile-avatar {
        width: 45px;
        height: 45px;
    }
    }
    </style>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between align-items-center"">

            <div class="navbar-brand d-flex align-items-center">
                <img draggable="false" src="images/clock.png" alt="Error" class="brand-img me-2">
                <span class="brand-text text-white fw-bold">GAME DAILY RESET TRACKER</span>
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

            <div class="d-flex flex-column align-items-center position-relative">
                <div data-bs-toggle="dropdown" class="profile-avatar" style="cursor: pointer;">
                    <img draggable="false" src="images/profile_image/<?php echo $cdr['profile']; ?>.png" alt="Error" style="width: 100%; height: 100%;border-radius: 50%;">
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

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbar1" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <img draggable="false" src="images/P.png" style="width:35px;height:35px">
                            <a href="logre/login_form" class="btn btn-outline-light" style="border : none"> Login / Register </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
                <?php
                }

            