@extends("layout")
@section('title', 'حرفای گفته نشده')
@section('body')

    <div class="container">
        <div class="row align-items-center justify-content-center fw-bold h1 py-5">
            <div class="py-5 mt-5 text-center" id="header"></div>
        </div>
    </div>

    <div class="container">
        <form method="get" action="{{ route("search") }}">

            <div class="row">
                <div class="input-group input-group-lg mb-3">

                        <input
                            type="text"
                            class="form-control py-3"
                            placeholder="اسمتو جستجو کن..."
                            name="q"
                        />

                        <button class="btn btn-outline-dark" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search mx-2" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>

                            جستجو
                        </button>


                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-3" id="messages">

            @if(!$messages->isEmpty())
                @foreach($messages as $message)
                    <x-message-box :id="$message->id" :name="$message->name" :message="$message->message" :backgroundColor="$message->backgroundColor" />
                @endforeach
            @endif

        </div>

        <div class="col-12 d-flex justify-content-center align-items-center p-2 m-2">
            <div class="spinner-border loader" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

    </div>

@endsection

@section("footer")
    <script>
        var i = 0;
        var txt = 'حرفِ دلتو بزن شاید به مخاطبش رسید.'; /* The text */
        var speed = 50; /* The speed/duration of the effect in milliseconds */

        function typeWriter() {
            if (i < txt.length) {
                document.getElementById("header").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }else{
                i = 0;
                setTimeout(function (){document.getElementById("header").innerHTML = "";}, 7000);
                setTimeout(typeWriter, 8000);
            }
        }
        typeWriter();
    </script>

    <script>
        $(document).ready(function(){
            $('.loader').hide();
            var page = 1;

            $(window).scroll(function () {
                if ($(window).scrollTop() === $(document).height() - $(window).height() ) {
                    page++;
                    loadData(page);
                }
            });

            function loadData(page){

                $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $('.loader').show();
                    }
                })
                .done(function(data) {
                    $('.loader').hide();
                    if (data.html == "") {
                        return;
                    }
                    $("#messages").append(data.html);
                })
                .fail(function() {
                    alert('server not responding...');
                })
            }
        });
    </script>
@endsection
