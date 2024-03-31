@extends("layout")
@section('title', 'ارسال پیام')
@section('body')

    <div class="container">
        <div class="row align-items-center justify-content-center py-5 min-vh-100">
            <form action="" method="post" class="col-11 col-md-7 col-lg-4 d-flex flex-column">

                <ul class="list-group list-group-flush list-group-item-light mb-3 pt-3">
                    <li class="list-group-item text-center fw-bold font-size-22 p-3">ارسال پست جدید</li>
                    <li class="list-group-item">اشتراک پیامی که هیچ وقت ارسال نشد :)</li>
                    <li class="list-group-item">یا انتقال یک تجربه مهم</li>
                    <li class="list-group-item">یا اشتراک گذاری یک دل نوشته آموزنده</li>
                    <li class="list-group-item">یا یک تلنگر کوتاه</li>
                </ul>

                @csrf

                <div class="col d-flex">
                    <div class="col p-2 message-box">
                        <div class="h-100 d-flex flex-column border border-2 border-dark py-2 px-3 fw-bold position-relative overflow-auto shabnam bg-light">
                            <label class="title font-size-18">
                                <div class="my-2 d-flex gap-2 align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-heart-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z"/>
                                        <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                    </svg>


                                    <input type="text" name="name" class="form-control" id="Input1" required  maxlength="16" placeholder="مخاطب">
                                </div>
                            </label>
                            <textarea id="messageInput" class="py-2 px-3 text-break text-justify font-size-22 lh-lg my-1 overflow-hidden rounded-3" dir="auto" maxlength="128" style="flex: 1 1 auto;" required></textarea>

                            <small class="text-danger fw-normal">پیام ها پس از ثبت، حذف یا ویرایش نمی شوند.</small>

                            <label class="text-center d-block font-size-18 text-primary-emphasis" dir="ltr">#unsentProject</label>
                        </div>
                    </div>
                </div>

                <div class="col d-flex align-items-center justify-content-between my-2 p-1">
                    <input type="color" class="form-control form-control-color" value="#563d7c" id="colorInput" title="Choose your color">

                    <button type="submit" class="btn btn-dark">ثبت پست</button>
                </div>

            </form>
        </div>
    </div>



@endsection

@section("footer")
    <script>
        $(document).ready(function(){
            $("#messageInput").css("background","#ced4da");
            $("#messageInput").css("color","#2b2b2b");


            $("#colorInput").on("input",function(e){
                const color = e.target.value
                const r = parseInt(color.substr(1,2), 16)
                const g = parseInt(color.substr(3,2), 16)
                const b = parseInt(color.substr(5,2), 16)

                $("#messageInput").css("background","rgb("+ r +","+ g +","+ b +")");

                if((r + g + b) > 450){
                    $("#messageInput").css("color","#2b2b2b");
                }else{
                    $("#messageInput").css("color","#eee");
                }
            });

            $("form").on("submit",function (){
                if(confirm("از ارسال پست خود اطمینان دارید؟")){return true;}else{return false;}
            });
        });
    </script>
@endsection
