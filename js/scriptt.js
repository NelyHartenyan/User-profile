/**
 * Created by Gor on 8/5/2017.
 */
$(function () {








    $('#email').on('blur',function () {
    var data = new Object();
    data.email = $(this).val();
        $.ajax({
            url:'checkemail.php',
            method:'post',
            dataType:'json',
            data:data,
            success:function (response) {
               // console.log(response)
                if(response.error){
                 $('.email-error').text(response.message);
                }
                else{
                    $('.email-error').text('');
                }
            }

        })

    })

})


$("#img").on("change",function(){
    $("#load_img").removeClass("hide");
    $("#img").addClass("hide");
});

$("#avatar").on("change",function(){
    $("#saveBtn").removeClass("hide");
    $("#avatar").addClass("hide");
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(function () {
    $('[data-toggle="popover"]').popover()
});
