/**
 * Mobile Menu JavaScript
 *
 * Source: http://www.hongkiat.com/blog/building-mobile-app-navigation-with-jquery/
 *
 */

$(document).ready(function(){
    var pagebody = $("#mobile-top");
    var themenu  = $("#sidebar");
    var topbar   = $("#mobile-top");
    var content  = $("#content");
    var footer   = $("#site-bottom");
    var viewport = {
        width  : $(window).width(),
        height : $(window).height()
    };

    function openme() {
        $(function () {
            topbar.animate({
               left: "300px"
            }, { duration: 300, queue: false });
            themenu.animate({
               left: "0px"
            }, { duration: 300, queue: false });
            // pagebody.animate({
            //    left: "300px"
            // }, { duration: 300, queue: false });
            // content.animate({
            //    left: "300px",
            // }, { duration: 300, queue: false });
            // footer.animate({
            //    left: "300px"
            // }, { duration: 300, queue: false });
        });
    }

    function closeme() {
        var closeme = $(function() {
            topbar.animate({
                left: "0px"
            }, { duration: 180, queue: false });
            themenu.animate({
                left: "-300px"
            }, { duration: 180, queue: false });
            // pagebody.animate({
            //     left: "0px"
            // }, { duration: 180, queue: false });
            // content.animate({
            //     left: "0px"
            // }, { duration: 180, queue: false });
            // footer.animate({
            //     left: "0px"
            // }, { duration: 180, queue: false });
        });
    }

    // Checking whether to open or close nav menu
    $("#menu-btn").live("click", function(e){
        e.preventDefault();
        var leftval = pagebody.css('left');

        if(leftval == "0px") {
            openme();
        }
        else {
            closeme();
        }
    });
});
