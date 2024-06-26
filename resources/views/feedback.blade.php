@extends("layout")
@section('title', 'بازخورد')
@section('body')

    <section class="bg-light py-5 py-md-5 min-vh-100">
        <div class="container">
            <div class="row justify-content-md-center pt-5 mt-4">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">ثبت بازخورد</h2>
                    <p class="text-secondary mb-5 text-center">نظرات، پیشنهادات و انتقادات شما به پیشرفت پروژه کمک
                        شایانی می کند.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-9">

                    @if(session('msg'))
                        <div class="alert alert-success py-2 my-3" dir="auto">
                            <ul class="m-1">
                                <li>{{ session('msg') }}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 my-3" dir="auto">
                            <ul class="m-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-white border rounded shadow-sm overflow-hidden">

                        <form action="{{ route("saveFeedback") }}" method="post">
                            @csrf
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                <div class="col-12 col-md-6">
                                    <label for="fullname" class="form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                          <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                            </svg>
                                          </span>
                                        <input type="text" required class="form-control" id="fullname" name="fullname" value="{{ old("fullname") }}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">ایمیل <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                      <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-envelope" viewBox="0 0 16 16">
                                          <path
                                              d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                      </span>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old("email") }}" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">پیام <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="text" rows="3" required>{{ old("text") }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button class="px-5 btn btn-dark " type="submit">ثبت</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
