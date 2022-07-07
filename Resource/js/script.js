$(document).ready(function () {


    // //Set
    // $(".formatNum").change(function(){
    //     var totalAmount = 0;
    //     $(".formatNum").each(function(){
    //         if($(this).val() == ""){
    //             $(this).val(0);
    //         }
    //     })
    //     $(".formatNum").each(function(){
    //         totalAmount = totalAmount + parseInt(($(this).val()));
    //     })
        
    //     $(".totalAmount").val(new Intl.NumberFormat('en-IN').format(totalAmount));
    // });
    

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

    //Format input form adding apartment rented
    new Cleave('.renting_fee_per_month', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.tax_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.tax_declare_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.management_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.cleaning_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.refund_for_tenant', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.from', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });

    new Cleave('.to', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
     
});