$(function () {

    var $window = $(window);

    var scrollTime = 0.5;
    var scrollDistance = 200;

    $window.on("mousewheel DOMMouseScroll", function (event) {

        event.preventDefault();

        var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
        var scrollTop = $window.scrollTop();
        var finalScroll = scrollTop - parseInt(delta * scrollDistance);

        TweenMax.to($window, scrollTime, {
            scrollTo: {y: finalScroll, autoKill: true},
            ease: Power1.easeOut,
            autoKill: true,
            overwrite: 5
        });

    });

});

var controller = new ScrollMagic.Controller();

// PAGINA HOME
var half = new ScrollMagic.Scene({
    triggerHook: "onEnter",
    triggerElement: ".half"
})

// .addIndicators() // add indicators (requires plugin)
.addTo(controller);

half.on("enter", function (event) {
    setTimeout(function () {
    $(".half").addClass("active-fade");
    $('.half').addClass('animated fadeIn');
    }, 3500);
});
