@extends("layout")
@section('title', 'حرفای گفته نشده')
@section('body')

    <div class="container pt-5 mt-5">
        <form method="get" action="{{ route("search") }}" class="mt-5">

            <div class="row">
                <div class="input-group input-group-lg mb-3">

                    <input
                        type="text"
                        class="form-control py-3"
                        placeholder="اسمتو جستجو کن..."
                        name="q"
                        value="{{ request()->get("q") }}"
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

    <div class="container min-vh-100">

        @if($messages->isEmpty())
            <div class="row align-items-center justify-content-center py-5 my-5 text-light text-dark text-opacity-25 fw-bold font-size-22">
                موردی یافت نشد
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-3 ">


            @foreach($messages as $message)

                <div class="col p-2 message-box">
                    <div class="h-100 d-flex flex-column border border-2 border-dark py-2 px-3 fw-bold position-relative overflow-auto shabnam">
                        <label class="title font-size-18">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-heart-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z"/>
                                <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                            </svg>
                            مخاطب: {{ $message->name }}
                        </label>
                        <div class="p-3 text-break text-justify text-light font-size-24 lh-lg my-1 overflow-hidden" dir="auto" style="flex: 1 1 auto; background-color: {{ $message->backgroundColor }};">
                            {{ $message->message }}
                        </div>

                        <label class="text-center d-block font-size-18 text-primary-emphasis" dir="ltr">#unsentProject</label>
                    </div>
                </div>

            @endforeach


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
@endsection
