$(document).ready(function () {

    //Tracking menu siderbar
    $('.items li').click(function () { 
        $(this).addClass("activing").siblings().removeClass("activing");
    })

    //Button menu for mobile reponsive
    $('#menu-btn').click(function () {
        $('#menu').toggleClass("active");
    })

    //Data table for tbl_cart
    $('#tbl_cart').DataTable();
    
    //Div clickable
    $('.clickable').click(function(){
        window.location = $(this).find("a").attr("href");
    });

    //Jquery animate counting
    $(".num").counterUp();
});