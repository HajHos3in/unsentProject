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

                <x-messageBox :name="$message->name" :message="$message->message" :backgroundColor="$message->backgroundColor" />

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
