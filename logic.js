timeFormat = "HH:mm:ss";
function calculateTimeUntilReset(resetTimeStr, serverTimezoneStr) {
    const now = new Date();
    const [resetHours, resetMinutes] = resetTimeStr.split(':').map(Number);
    let serverOffset = 0;
    if (serverTimezoneStr) {
        const match = serverTimezoneStr.match(/(?:GMT|UTC)\s*([+-]\d+)?/i);
        if (match && match[1]) {
            serverOffset = parseInt(match[1], 10);
        }
    }

    let target = new Date(now);
    target.setUTCHours(resetHours - serverOffset, resetMinutes, 0, 0);
    if (target <= now) {
        target.setDate(target.getDate() + 1);
    }

    const diffMs = target - now;
    const hours = Math.floor(diffMs / (1000 * 60 * 60));
    const minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diffMs % (1000 * 60)) / 1000);
    const pad = (num) => String(num).padStart(2, '0');

    return {
        timeStr: `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`,
        diffMs: diffMs
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
        let reset = container.getAttribute("data-reset");
        let timezone = container.getAttribute("data-timezone");
        
        let result = calculateTimeUntilReset(reset, timezone);
        
        let timerSpan = container.querySelector(".time_left");
        if (timerSpan) {
            timerSpan.textContent = result.timeStr;
        }

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
setInterval(updateCurrentGame, 1000);
updateCurrentLocal();
updateCurrentGame();