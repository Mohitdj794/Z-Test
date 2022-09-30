var $TIMER=1;
 function Timer(Durations){
    var countDownTarget = Durations;
    function showClock(target) {
    
        const distance = target - new Date().getTime();
        const hrs = distance < 0 ? 0: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = distance < 0 ? 0: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const secs = distance < 0 ? 0: Math.floor((distance % (1000 * 60)) / 1000);        
        // Output the results
        if(hrs !== 0){
        document.getElementById("hours").innerHTML = hrs;
        }else $("#Hours").hide();
        document.getElementById("minutes").innerHTML = mins;
        document.getElementById("seconds").innerHTML = secs;
    }
    showClock(countDownTarget);
    // Update the count down every 1 second
    var x = setInterval(function() {
        showClock(countDownTarget);
        if (countDownTarget - new Date().getTime() < 0) {
            clearInterval(x);
            $TIMER = 0;
            $("#renderForm").submit();
        }
    }, 1000);
    }
  
    export {Timer,$TIMER};