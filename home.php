<head>
    <style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    .container {
        width : 1300px;
    }
    
    .dropdown {
        margin-left: 20px;
        border-radius: 30px;
        display: block;
    }
    .dropbtn {
        color: #00f2ff;
        border: 1px #00f2ff solid;
        cursor: pointer;
        background-color:#545454
    }

    .dropdown:hover .dropbtn {
        background-color: #00f2ff;
        color : black;
        transition : 0.3s;
        box-shadow: #00f2ff;
    }


    .dropdown-content {
        display: none;     
        position: absolute;
        background-color: rgba(255, 255, 255, 0.6);
        z-index: 1;
        width: 710px;
        border-radius: 30px;
    }
    
    .dropdown:hover .dropdown-content {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
    }

    .dropdown-content form {
        display: flex;
        flex-wrap: wrap;          /* ถ้าพื้นที่ไม่พอก็ให้ขึ้นบรรทัดใหม่ */
        justify-content: left;
        gap: 10px;                /* เว้นระยะห่างระหว่างปุ่มซ้าย-ขวา-บน-ล่าง */
        padding: 10px;            /* เว้นระยะขอบในของกล่อง */
    }
    .dropdown-content form input {
        border: none;
        height: 30px;
        width: 130px;
        border-radius: 30px;
        background-color: #545454;
        color: white;
        cursor: pointer;
        transition: background 0.2s;
        
    }

    .main {
        display : grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap : 30px;
        margin-top: 10px;
    }

    .boxbox {
        height: 350px;
        display: flex;
        border: 1px #00f2ff solid;
        background-color: #334155;
        color: #1f2937;
        justify-content: center;
        border-radius : 20px;
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

    <div style="padding: 10px;background-color: #334155;border: 1px #00f2ff solid;border-radius: 20px;width:420px;display:flex;justify-content:center">
        <div style="background-color:white;width:400px;text-align:center;border-radius: 30px;height:40px;line-height: 40px;font-size:25px;">
            <p style="display: inline-block;">Your Current Time : </p>
            <p style="display: inline-block" id="current-local-time"></p>
        </div>
    </div>
    <div style="margin-top: 10px;padding: 10px 0px 10px 10px;position: relative;display: flex;align-items: center;background-color: #334155;border-radius:20px;width:1000px;border: 1px #00f2ff solid;">
        
        <form method="GET">
            <img src="images/mag.png" alt="Error" style="width:40px;height:40px;position: absolute;margin-left: 10px;margin-top: 5px;">
            <input type="text" placeholder="Search for a game...." name="searchbar" value="<?php echo isset($_GET['searchbar']) ? htmlspecialchars($_GET['searchbar']) : ''; ?>" style="border: 0px;padding: 10px 10px 10px 55px;width: 570px;height: 50px;font-size:20px;border-radius: 20px;">
        </form>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" style="border-radius: 45px;width:100px;height:50px;font-size:25px;">All <img src="images/arrow.png" style="height: 20px;width: 20px;"></button>
            <div class="dropdown-content">
                <form method="GET">
                    <input type="submit" name="searchtag" value="Gacha">
                    <input type="submit" name="searchtag" value="MMO">
                    <input type="submit" name="searchtag" value="RPG">
                    <input type="submit" name="searchtag" value="Open World">
                    <input type="submit" name="searchtag" value="Action">
                    <input type="submit" name="searchtag" value="Turn-based">
                    <input type="submit" name="searchtag" value="Idle">
                    <input type="submit" name="searchtag" value="Shooter">
                    <input type="submit" name="searchtag" value="Tactical">
                    <input type="submit" name="searchtag" value="Strategy">
                    <input type="submit" name="searchtag" value="Tower Defense">
                    <input type="submit" name="searchtag" value="Card Battle">
                    <input type="submit" name="searchtag" value="Hack and Slash">
                    <input type="submit" name="searchtag" value="MOBA">
                    <input type="submit" name="searchtag" value="Survival">
                    <input type="submit" name="searchtag" value="Horror">
                    <input type="submit" name="searchtag" value="Battle Royale">
                    <input type="submit" name="searchtag" value="FPS">
                    <input type="submit" name="searchtag" value="TPS">
                    <input type="submit" name="searchtag" value="Base Building">
                    <input type="submit" name="searchtag" value="Side-scrolling">
                    <input type="submit" name="searchtag" value="AR">
                </form>
            </div>
        </div>
        <div style='margin-left: 20px;border-radius: 45px;width:100px;height:50px;font-size:25px;background-color:#545454;border: 1px #00f2ff solid;display : flex;justify-content:center;align-items:center'>
            <form method="GET">
                <input style='border: none;background-color: #545454;color :white;width:100px;border-radius:45px' type="submit" value="Clear">
            </form>
        </div>
        <div style='margin-left: 20px;border-radius: 45px;width:150px;height:50px;font-size:25px;background-color:#545454;border: 1px #00f2ff solid;display : flex;justify-content:center;align-items:center'>
            <form method="GET">
                <input style='border: none;background-color: #545454;color : yellow;' type="submit" name="searchfav" value="Favorite">
            </form>
        </div>
    </div>
    
    
        <?php
        if (isset($_GET['searchbar']) && $_GET['searchbar'] !== '') {
                $search_word = $_GET['searchbar']; 
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
                    where `game_list`.`name` like '%".$search_word."%'
                    group by `game_list`.`id`
                    order by  `game_list`.`name`"; }
    
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
        
            <div class="main">
                <?php if (count($game_data) > 0) {
                    foreach ($game_data as $game) {
                    $is_favorited = in_array($game['id'], $favorites);
                ?>
                    <div class="boxbox">
                        <div id="container-<?php echo $game['id']; ?>"class="game-container"
                        data-id="<?php echo $game['id']; ?>"
                        data-is-fav="<?php echo $is_favorited ? 'true' : 'false'; ?>"
                        data-reset="<?php echo $game['reset']; ?>"
                        data-timezone="<?php echo $game['timezone']; ?>">
                            <div style="margin-bottom: 15px; padding: 10px; color:white;">
                            <center><img style="width: 100%;height:200px;border-radius:20px" src="images/profile_game/<?php echo $game['pic']; ?>.jpg" alt="error"></center>
                            <center><div style="font-weight: bold; font-size: 1.2em;"><?php echo $game['name']; ?></div></center>
                            <center><div style="margin-top: 5px; opacity: 0.5;"><?php echo $game['tag_name']; ?></div></center>
                            <div style="margin-top: 5px;">Server Reset Time : <?php echo $game['timezone']; ?> | <?php echo $game['reset']; ?> น.</div>
                            <div style="display : flex;align-items: center;justify-content: space-between;">
                                <div style="margin-top: 5px;width:250px">รีเซ็ตในอีก: <span class="time_left" style="font-weight: bold; font-size: 1.1em;"></span></div>
                                <button class="fav-btn" style="height:30px; border:none; background:none;" data-game-id="<?php echo $game['id'];?>">
                                    <i class="fa fa-heart"></i>
                                </button> <!-- fav button -->
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

