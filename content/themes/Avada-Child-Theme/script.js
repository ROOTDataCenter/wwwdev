console.log('THE SCRIPT LOADED');


var tag = document.createElement('script');
var done = false;
var player;

jQuery(document).ready(function () {
    var videoButton = jQuery(".home-video-button");

    if (videoButton.length === 0) return;

    videoButton.on('click', function (e) {
        jQuery(e.target).parent().html('<iframe src="http://www.youtube.com/embed/UNScwHZijVY?autoplay=1" frameborder="0" allowfullscreen></iframe>')
    });
});



