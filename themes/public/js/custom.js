$(document).ready(function(){
    $(".admin-message-notification .notification-text").click(function(){
    	$("#notific-messages").slideToggle();
    });
    $('.admin-message-notification .notification-text').toggle(function(){
    	$('.admin-message-notification .notification-text').html('Свернуть список сообщений');
	}, function() {
    	$('.admin-message-notification .notification-text').html('Показать список сообщений');
	});

    $("#mess-on-click").click(function(){
        $(".user-message-notification .notification-block").slideToggle();
    });
    $('#mess-on-click').toggle(function(){
        $('#mess-on-click a').html('Свернуть список сообщений');
    }, function() {
        $('#mess-on-click a').html('Показать список сообщений');
    });

	$("#Customers_speciality_names label").prepend('<span></span>');
	$(".customer-agree-label").prepend('<span></span>');
	$(".user-agree-label").prepend('<span></span>');

    $(function(){
        $("#tableName .hoverName p").each(function(i){
            len=$(this).text().length;
            if(len>100)
            {
              $(this).text($(this).text().substr(0,100)+'...');
            }
        });       
    }); 

    $(function(){
        $(".pageArticle .article p").each(function(i){
            len=$(this).text().length;
            if(len>170)
            {
              $(this).text($(this).text().substr(0,170)+'...');
            }
        });       
    });

    $('#measure .closenewApplication').click(function(){
        $('#measure').css({"display":"none"});
    });

});