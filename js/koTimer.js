var $TIMER = 1,$hrs,$mins,$secs;
function koTimer(Durations){
    var countDownTarget = Durations;
    function showClock(target) {
    
        const distance = target - new Date().getTime();
        const hrs = distance < 0 ? 0: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = distance < 0 ? 0: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const secs = distance < 0 ? 0: Math.floor((distance % (1000 * 60)) / 1000);
        $hrs = hrs;
        $mins = mins;
        $secs = secs;
  
    }
    showClock(countDownTarget);

    var x = setInterval(function() {
        showClock(countDownTarget);
        if (countDownTarget - new Date().getTime() < 0) {
            clearInterval(x);
            $TIMER = 0;
            $("#renderForm").submit();
        }
    }, 1000);
    }
   
  export {koTimer,$TIMER,$hrs,$mins,$secs};