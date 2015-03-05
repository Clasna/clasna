swaped = false;
$(window).load(function() {
    if ($(window).width() < 1400 & $(window).width() > 1078 & swaped == false) {
        var igorek = $('.mans_collection');
        igorek.insertBefore(igorek.prev());
        swaped = true;
        return false;
    } else if ($(window).width() <= 1078 & swaped == true) {
        var igorek = $('.mans_collection');
        igorek.insertAfter(igorek.next());
        swaped = false;
        return false;
    };
});
$(document).ready(function() {
    $(window).resize(function() {
        var width = $(window).width();
        if (width < 1400 & width > 1078 & swaped == false) {
//            alert(width);
            var igorek = $('.mans_collection');
            igorek.insertBefore(igorek.prev());
            swaped = true;
            return false;
        } else if (width <= 1078 & swaped == true) {
            
           var igorek = $('.mans_collection');
            igorek.insertAfter(igorek.next());
            swaped = false;
            return false;
        };
        console.log(swaped);
    });

});

