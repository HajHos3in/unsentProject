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

                    <x-messageBox :name="$message->name" :message="$message->message" :backgroundColor="$message->backgroundColor" />

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

