<head>
    <style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    
    .dropdown {
        border-radius: 30px;
        display: block;
    }
    .dropbtn {
        color: #00f2ff;
        border: 1px #00f2ff solid;
        cursor: pointer;
        background-color:#545454
    }

    .glass-box {
        background-color: #334155;
        border: 1px solid #00f2ff;
        border-radius: 20px;
    }

    .search-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        z-index: 5;
    }

    .search-input {
        border: 0;
        padding-left: 50px !important;
        height: 50px;
        font-size: 1.1rem;
        border-radius: 25px;
    }
    
    .btn-theme {
        background-color: #545454;
        color: #00f2ff;
        border: 1px solid #00f2ff;
        border-radius: 45px;
        height: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    
    .btn-theme:hover, .btn-theme:focus {
        background-color: #00f2ff;
        color: #000;
        box-shadow: 0 0 10px #00f2ff;
        border-radius: 45px;
    }

    @media (min-width: 700px) {
        .dropdown:hover .custom-dropdown-menu {
            display: block;
            margin-top: 0px;
        }
    }

    .custom-dropdown-menu {
        background-color: rgba(255,255,255,0.5);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        max-width: 710px;
        width: 600px;
    }   

    @media (max-width: 450px) {
        .custom-dropdown-menu {
        background-color: rgba(255,255,255,0.5);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        max-width: 450px;
        width: 300px;
    } 
    }

    .btn-tag {
        border: none;
        height: 35px;
        border-radius: 20px;
        background-color: #545454;
        color: white;
        transition: background 0.2s;
    }

    .btn-tag:hover {
        background-color: #00f2ff;
        color: black;
    }

    .boxbox {
        border: 1px #00f2ff solid;
        background-color: #334155;
        color: #1f2937;
        border-radius : 20px;
    }

    .box-font {
        color:white;
        padding : 15px
    }

    @media (max-width: 768px) {
    .box-font {
        color:white;
        padding : 15px;
        font-size : 10px; 
    }
    }
  </style>
</head>
<?php

class home
{

 function def()
 {
 ?>
 <div class="container">

    <div class="row">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="glass-box p-2 text-center">
                    <div class="bg-white rounded-pill py-1 fs-5 fw-bold text-dark d-flex justify-content-center align-items-center">
                        <span class="me-2">Your Current Time :</span>
                        <span id="current-local-time"></span>
                    </div>
                </div>
            </div>
    </div>
    <div class="glass-box p-2 mt-2">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 position-relative">
                    <form method="GET">
                        <img src="images/mag.png" alt="Error" class="search-icon">
                        <input type="text" placeholder="Search for a game...." class="form-control search-input" name="searchbar" value="<?php echo isset($_GET['searchbar']) ? htmlspecialchars($_GET['searchbar']) : ''; ?>">
                    </form>
                </div>
                <div class="col-12 col-lg-6 d-flex gap-2 align-items-center mt-2 mt-lg-0">  
                    <div class="col-3">
                        <div class="dropdown flex-grow-1 flex-sm-grow-0">
                            <button class="btn-theme w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                All
                            </button>
                            <div class="dropdown-menu custom-dropdown-menu p-3 col-12">
                                <form method="GET" class="d-flex flex-wrap gap-2">
                                    <input type="submit" name="searchtag" value="Gacha" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="MMO" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="RPG" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Open World" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Action" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Turn-based" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Idle" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Shooter" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Tactical" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Strategy" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Tower Defense" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Card Battle" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Hack and Slash" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="MOBA" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Survival" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Horror" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Battle Royale" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="FPS" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="TPS" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Base Building" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="Side-scrolling" class="btn-tag px-3">
                                    <input type="submit" name="searchtag" value="AR" class="btn-tag px-3">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <form method="GET" class="flex-grow-1 flex-sm-grow-0">
                            <input class="btn-theme w-100 text-white" type="submit" value="Clear">
                        </form>
                    </div>
                    <div class="col-3">
                        <form method="GET" class="flex-grow-1 flex-sm-grow-0">
                            <input class="btn-theme w-100 text-warning" type="submit" name="searchfav" value="Favorite">
                        </form>
                    </div>
                </div>
    </div>
    
</div>
    
    
       <?php
            if (isset($_GET['searchbar']) && $_GET['searchbar'] !== '') {
            $search_word = trim($_GET['searchbar']); 
            
            $sql = "SELECT 
                `game_list`.`id` as `id`,
                `game_list`.`name` as `name`,
                `game_list`.`pic` as `pic`,
                `game_list`.`timezone` as `timezone`,
                `game_list`.`reset_time` as `reset_time`,
                GROUP_CONCAT(`tag`.`name` SEPARATOR ' | ') as `tag_names`
            FROM `game_list`
            LEFT JOIN `game_tag` ON `game_list`.`id` = `game_tag`.`game_id`
            LEFT JOIN `tag` ON `game_tag`.`tag_id` = `tag`.`id`
            GROUP BY 
                `game_list`.`id`, 
                `game_list`.`name`, 
                `game_list`.`pic`, 
                `game_list`.`timezone`, 
                `game_list`.`reset_time`
            HAVING 
                `game_list`.`name` LIKE '%" . $search_word . "%' 
                OR `tag_names` LIKE '%" . $search_word . "%'
            ORDER BY `game_list`.`name`";
            }
            elseif (isset($_GET['searchtag']) && $_GET['searchtag'] !== ''){
                    $search_tag = $_GET['searchtag'];
                    if ($search_tag !== '') {
                    $sql = "SELECT
                        `game_list`.`id` as `id`,
                        `game_list`.`name` as `name`,
                        `game_list`.`pic` as `pic` ,
                        `game_list`.`timezone` as `timezone` ,
                        `game_list`.`reset_time` as `reset_time` ,
                        GROUP_CONCAT(`tag`.`name` SEPARATOR ' | ') as `tag_names`
                        from `game_list`
                        left join `game_tag` on `game_list`.`id` = `game_tag`.`game_id`
                        left join `tag` on `game_tag`.`tag_id` = `tag`.`id`
                        where `game_list`.`id` IN (
                            SELECT `game_tag`.`game_id`
                            FROM `game_tag`
                            INNER JOIN `tag` ON `game_tag`.`tag_id` = `tag`.`id`
                            WHERE `tag`.`name` = '".$search_tag."'
                        )
                        group by `game_list`.`id`
                        order by `game_list`.`name`"; }
            } 
            elseif (isset($_GET['searchfav']) && $_GET['searchfav'] !== ''){
                    $search_fav = $_GET['searchfav'];
                    if ($search_fav !== '') {
                        $current_user_id = isset($_SESSION['ssid']) ? intval($_SESSION['ssid']) : 0;
                    $sql = "SELECT 
                        `game_list`.`id` as `id`,
                        `game_list`.`name` as `name`,
                        `game_list`.`pic` as `pic` ,
                        `game_list`.`timezone` as `timezone` ,
                        `game_list`.`reset_time` as `reset_time` ,
                        GROUP_CONCAT(`tag`.`name` SEPARATOR ' | ') as `tag_names`
                        from `game_list`
                        left join `game_tag` on `game_list`.`id` = `game_tag`.`game_id`
                        left join `tag` on `game_tag`.`tag_id` = `tag`.`id`
                        WHERE `game_list`.`id` IN (
                                SELECT `user_fav`.`game_id` 
                                FROM `user_fav` 
                                WHERE `user_fav`.`user_id` = ".$current_user_id."
                            )
                        group by `game_list`.`id`
                        order by `game_list`.`name`"; }
            }
            else {
                $sql = "SELECT 
                        `game_list`.`id` as `id`,
                        `game_list`.`name` as `name`,
                        `game_list`.`pic` as `pic` ,
                        `game_list`.`timezone` as `timezone` ,
                        `game_list`.`reset_time` as `reset_time` ,
                        GROUP_CONCAT(`tag`.`name` SEPARATOR ' | ') as `tag_names`
                        from `game_list`
                        left join `game_tag` on `game_list`.`id` = `game_tag`.`game_id`
                        left join `tag` on `game_tag`.`tag_id` = `tag`.`id`
                        group by `game_list`.`id`
                        order by `game_list`.`name`";
            }
			$conn = new connect();
            //data
            $game_data = []; //Array
			$res = $conn->query($sql);
			while ($cdr = $res->fetch()) {
                $game_data[] = [        // Loop Array
                'id' => $cdr['id'],
                'name' => $cdr['name'],
                'pic' => $cdr['pic'],
                'reset' => $cdr['reset_time'],
                'timezone' => $cdr['timezone'],
                'tag_name' => $cdr['tag_names'],
                ];
            }
            //fav
            $favorites = [];        // fav Array
            if (isset($_SESSION['ssid'])) {
                $fav_sql = "SELECT game_id from user_fav where user_id = " . $_SESSION['ssid'];
                $fav_res = $conn->query($fav_sql);
                while ($fav = $fav_res->fetch()) {
                    $favorites[] = $fav['game_id'];
                }
            }

        ?>
        
            <div class="row g-4 mt-0">
                <?php if (count($game_data) > 0) {
                    foreach ($game_data as $game) {
                    $is_favorited = in_array($game['id'], $favorites);
                ?>
                    <div class="col-6 col-md-6 col-lg-4">
                        <div class="boxbox">
                            <div id="container-<?php echo $game['id']; ?>"class="game-container"
                            data-id="<?php echo $game['id']; ?>"
                            data-is-fav="<?php echo $is_favorited ? 'true' : 'false'; ?>"
                            data-reset="<?php echo $game['reset']; ?>"
                            data-timezone="<?php echo $game['timezone']; ?>">
                            <img style="width: 100%;height:180px;border-radius:20px;" src="images/profile_game/<?php echo $game['pic']; ?>.jpg" alt="error">
                                <div class="box-font d-flex flex-column">
                                    <div class="d-flex flex-column align-items-center">
                                        <div style="font-weight: bold; font-size: 1.2em;"><?php echo $game['name']; ?></div>
                                        <div style="margin-top: 5px;"><?php echo $game['tag_name']; ?></div>
                                    </div>
                                    <div style="margin-top: 5px;">Server Reset Time : <?php echo $game['timezone']; ?> | <?php echo $game['reset']; ?> น.</div>
                                    <div style="display : flex;align-items: center;justify-content: space-between;">
                                        <div style="margin-top: 5px">รีเซ็ตในอีก: <span class="time_left" style="font-weight: bold; font-size: 1.1em;"></span></div>
                                        <button class="fav-btn" style="height:30px; border:none; background:none;" data-game-id="<?php echo $game['id'];?>">
                                            <i class="fa fa-heart"></i>
                                        </button> <!-- fav button -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } }
            else { ?>
                    <div></div>
                    <div style='color:white;font-size:35px;text-align:center'>❌ ไม่พบเกมที่คุณค้นหา</div>
                    <div></div>
            <?php } ?>
                </div>
                
            </div>
<?php
    }
}
?>