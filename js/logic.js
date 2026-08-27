timeFormat = "HH:mm:ss";
function calculateTimeUntilReset(resettime, ServerTimezone) {
    let now = moment();
    let nowZone = moment.tz.guess();

    let offsetHours = 0;
    
    if (ServerTimezone) {
        match = ServerTimezone.match(/(?:GMT|UTC)\s*([+-]?\d+)?/i);
        if (match && match[1]) {
            offsetHours = parseInt(match[1], 10);       // ดึงค่าตัวเลขหลัง GMT/UTC และแปลงเป็นจำนวนเต็ม (เลขฐาน 10)
        }
    }
    
    [resetHours, resetMinutes] = resettime.split(':').map(Number);
    
    let target = moment.utc().set({
        hour: resetHours - offsetHours,
        minute: resetMinutes,
        second: 0,
        millisecond: 0
    });

    let localReset = target.clone().tz(nowZone);

    if (now.isAfter(localReset)) {          // เช็ครอบ 1
        localReset.add(24, 'hours');
        if (now.isAfter(localReset)) {      // เช็ครอบ 2
            localReset.add(24, 'hours');
        }
    }

    let diffMs = localReset.diff(now);
    let duration = moment.duration(diffMs);

    let hours = Math.floor(duration.asHours());
    let minutes = duration.minutes();
    let seconds = duration.seconds();

    let pad = (num) => String(num).padStart(2, '0');                    // เลขหลักเดียว ใส่ 0 ด้านหน้า

    return {
        timeStr: `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`,       // format HH:mm:ss
        diffMs: diffMs                                                  // มิลลิวินาทีที่เหลือ
    };
}

function updateCurrentLocal() {
    now = moment();
    nowZone = moment.tz.guess();    

    if(document.getElementById("current-local-time")) document.getElementById("current-local-time").textContent = now.format(timeFormat);
    if(document.getElementById("current-local-date")) document.getElementById("current-local-date").textContent = now.format("DD MMMM, YYYY");
    if(document.getElementById("current-local-timezone")) document.getElementById("current-local-timezone").textContent = nowZone + " — " + now.format("[GMT ]Z");
    if(document.getElementById("current-zone")) document.getElementById("current-zone").textContent = nowZone;
}

function updateCurrentGame() {
    document.querySelectorAll(".game-container").forEach(container => {
        let resettime = container.getAttribute("data-reset");
        let ServerTimezone = container.getAttribute("data-timezone");
        
        let result = calculateTimeUntilReset(resettime, ServerTimezone);
        
        let timerSpan = container.querySelector(".time_left");
        if (timerSpan) {
            timerSpan.textContent = result.timeStr;
        }

    });
}


function toggleNotification() {
    let noti = document.getElementById('noti_toggle');
    let noti_60 = document.getElementById('noti_toggle_60');
    let noti_30 = document.getElementById('noti_toggle_30');
    let noti_10 = document.getElementById('noti_toggle_10');
                    
    let isChecked = noti.checked ? 1 : 0;
    let isChecked_60 = noti_60.checked ? 1 : 0;
    let isChecked_30 = noti_30.checked ? 1 : 0;
    let isChecked_10 = noti_10.checked ? 1 : 0;

    fetch('/gdrt/src/savenoti.php', {
        method: 'POST',
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `noti_status=${isChecked}&noti_60=${isChecked_60}&noti_30=${isChecked_30}&noti_10=${isChecked_10}`
    });
}

$(document).ready(function() {                  // fav system
    $('.fav-btn').each(function() {
        let btn = $(this);
        let container = btn.closest('.game-container');
        let isfav = container.data('is-fav');

        let icon = btn.find('i');               //หา tag <i> ใน <button>
        if (isfav) {
            icon.addClass('fa-solid').css('color', 'red');
        } else {
            icon.addClass('fa-regular').css('color', 'gray');
        }
    });

    $(document).on('click', '.fav-btn',  function() {
        let btn = $(this);
        let gameid = btn.data('game-id');
        let icon = btn.find('i');               //หา tag <i> ใน <button>
        let container = btn.closest('.game-container');

        $.ajax({
            url: 'favorite.php',         //target
            method: 'POST',
            data: { game_id: gameid },
            success: function(response) {
                icon.toggleClass('fa-solid fa-regular');                            //toggle active icon
                icon.css('color', icon.hasClass('fa-solid') ? 'red' : 'gray');      //toggle active color
                
                let isNowFav = icon.hasClass('fa-solid');
                
                container.data('is-fav', isNowFav);
                container.attr('data-is-fav', isNowFav ? 'true' : 'false');
            },
            error: function(error) {
                if (error.status === 403) {
                    setTimeout(function() {
                    swal({
                        title: "กรุณาเข้าสู่ระบบก่อน",
                        type: "warning",
                        confirmButtonText: "Login",
                        showCancelButton: true,
                    }, function() {
                        window.location = "logre/login_form";
                    });
                    }, 200);
                } else {
                    alert('error');
                }
            }
        });
    });
});

setInterval(updateCurrentLocal, 300);
setInterval(updateCurrentGame, 300);
updateCurrentLocal();
updateCurrentGame();