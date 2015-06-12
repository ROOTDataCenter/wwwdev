console.log('THE SCRIPT LOADED');

/**
 * Zopim Live Chat Scripts
 * -----------------------
 *
 *
 */

// Load in zopim script
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="//v2.zopim.com/?1uKeiTyJBghH5PgrPIfrE0HfsCy2rax5";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

// Hide after init
$zopim(function() {
   $zopim.livechat.window.hide();
});




var tag = document.createElement('script');
var done = false;
var player;

jQuery(document).ready(function () {
    initYoutube();

    jQuery("#menu-item-12968, .open-chat").on('click', function () {
        $zopim(function() {
            $zopim.livechat.window.show();
        });
    })
});

function initYoutube () {
    var videoButton = jQuery(".home-video-button, .data-video-button");

    if (videoButton.length === 0) return;

    videoButton.on('click', function (e) {
        jQuery(e.target).parent().html('<iframe src="http://www.youtube.com/embed/UNScwHZijVY?autoplay=1" frameborder="0" allowfullscreen></iframe>')
    });
}



