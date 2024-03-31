
$(document).ready(function(){
    var c;
    $("button").click(function (e){
        //$(this).prop('disabled', true);
        $(this).css('pointer-events','none');
        c = setTimeout(function (){ $("button").css('pointer-events','auto') },1500);
    });

});



function ajaxReq(url,data,type = "POST",loading = false){
    if(loading){
        $("#loading").removeClass("d-none");
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url,
        data : data,
        type : type,
        dataType : 'json',
        success : function(result){

            if(loading){
                $("#loading").addClass("d-none");

                if(result.status == 200){
                    doModal("successModal","show");
                }else{
                    doModal("dangerModal","show");
                }
            }



        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $("#loading").addClass("d-none");
            doModal("dangerModal","show");
        }
    });
}


function scrlTo(px){
    $('.rb').animate({scrollTop: ($(".rb").scrollTop() + px) - 100}, 1000);
}



