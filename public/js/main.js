
$(document).ready(function(){
    var c;
    $("button").click(function (e){
        //$(this).prop('disabled', true);
        $(this).css('pointer-events','none');
        c = setTimeout(function (){ $("button").css('pointer-events','auto') },1500);
    });

});



function ajaxReq(url,data,type = "POST",loading = false, callback){

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
                    //doModal("successModal","show");
                }else{
                    //doModal("dangerModal","show");
                }
            }

            callback(result);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("عملیات با خطا مواجه شد.");
            $("#loading").addClass("d-none");
            //doModal("dangerModal","show");
        }
    });

}


function scrlTo(px){
    $('.rb').animate({scrollTop: ($(".rb").scrollTop() + px) - 100}, 1000);
}


function report(id){
    if(confirm("شما در حال گزارش کلمات توهین آمیز هستید، از ارسال گزارش مطمئن هستید؟")){
        let request = ajaxReq("/report",{message_id: id},"POST",false,function (result){
            alert("گزارش شما با موفقیت ثبت شد.");
        });

    }else{
        return false;
    }
}
