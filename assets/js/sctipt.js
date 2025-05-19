// Show the alert immediately when page loads
document.addEventListener('DOMContentLoaded', function() {
setTimeout(function() {
    const alertElement = document.querySelector('.welcome-alert');
    if (alertElement) {
        let opacity = 1; // Initial opacity
        const fadeOut = setInterval(function() {
            if (opacity <= 0) {
                clearInterval(fadeOut);
                alertElement.remove(); // Remove the element from the DOM
            } else {
                opacity -= 0.1; // Decrease opacity
                alertElement.style.opacity = opacity;
            }
        }, 70); // Adjust the interval for smoother or faster fading
    }
}, 5000);

});
