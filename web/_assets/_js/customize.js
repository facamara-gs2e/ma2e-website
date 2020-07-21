// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if (document.body.clientHeight - $(this).scrollTop() >= 1000) { // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200); // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
});
$('#return-to-top').click(function() { // When arrow is clicked
    $('body,html').animate({
        scrollTop: window.innerHeight += 400 // Scroll to top of body
    }, 500);
});