$(document).ready(function () {

    //Button menu for mobile reponsive
    $('#menu-btn').click(function () {
        $('#menu').toggleClass("active");
    })

    //Data table for tbl_cart
    $('#tbl_cart').DataTable();
});