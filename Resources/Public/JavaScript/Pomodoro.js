define(['jquery', 'TYPO3/CMS/Backend/Notification'], function ($, Notification) {
    const PomodoroTimer = {};

    PomodoroTimer.init = function () {
        let countdown;
        const displayTime = document.querySelector('#displayTime');
        const dataTime = document.querySelectorAll('[data-time]');
        const showPlayButton = $('.pomodoro-play');
        const showStopButton = $('.pomodoro-stop');

        function timer(seconds) {
            const now = Date.now();
            const then = now + seconds * 1000;
            let documentTitleSuccessMessage = 'Take a break, drink some water!'
            displayTimeLeft(seconds);

            countdown = setInterval(() => {
                const secondsLeft = Math.round((then - Date.now()) / 1000);

                if (secondsLeft < 0) {
                    endTimer()
                    document.title = documentTitleSuccessMessage;
                    Notification.success('Timer session expired.', 'Boost your productivity, take a break and drink some water.', 20, []);
                    showStopButton.css({display: 'none'})
                    showPlayButton.css({display: ''})
                    return;
                }

                displayTimeLeft(secondsLeft)
            }, 1000);
        }

        function displayTimeLeft(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secondsRemained = seconds % 60;
            displayTime.textContent = `${minutes}:${secondsRemained < 10 ? '0' : ''}${secondsRemained}`;
        }

        function startTimer() {
            const seconds = parseInt(this.dataset.time);
            $(this).css({display: 'none'})
            showStopButton.css({display: ''})
            timer(seconds);
        }

        function endTimer() {
            clearInterval(countdown);
            showStopButton.css({display: 'none'})
            showPlayButton.css({display: ''})
        }

        showStopButton.click(function () {
            endTimer()
        })

        dataTime.forEach(time => time.addEventListener('click', startTimer));
    };

    PomodoroTimer.init();
    return PomodoroTimer;
});
