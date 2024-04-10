@extends("layout")
@section('title', 'نتیجه')
@section('body')

    <div class="container">
        <div class="row align-items-center justify-content-center py-5 min-vh-100">
            <div class="col-11 col-md-7 col-lg-4 d-flex flex-column">

                <p class="bg-light p-2"> خیلی ممنون بابت ثبت پیامتان، شما می توانید در یک ساعت آینده دوباره پیام جدیدی برای ما ارسال کنید. </p>

                <div class=" p-2 d-flex align-items-center justify-content-between">
                    <label>لینک پیام شما: </label>
                    <a href="" class="text-primary-emphasis">unsentproject.ir/?q={{ $message->id }}</a>
                </div>

                <div class="col-12 d-flex">
                    <div class="col p-2 message-box">
                        <div class="h-100 d-flex flex-column border border-2 border-dark py-2 px-3 fw-bold position-relative overflow-auto shabnam">
                            <label class="title font-size-18">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-heart-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z"/>
                                    <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                </svg>
                                مخاطب: {{ $message->name }}
                            </label>
                            <div class="p-3 text-break text-justify text-light font-size-24 lh-lg my-1 overflow-hidden" dir="auto" style="flex: 1 1 auto; background-color: {{ $message->backgroundColor }}; ">
                                {{ $message->message }}
                            </div>

                            <label class="text-center d-block font-size-18 text-primary-emphasis" dir="ltr">#unsentProject</label>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection

@section("footer")
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
@endsection

