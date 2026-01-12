@extends('layouts.Customer.header')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Section: Design Block -->
<section class="vh-100 d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-center">تسجيل الدخول</h1>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" />
                <label class="form-label" for="email">عنوان البريد الإلكتروني</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password" />
                <label class="form-label" for="password">كلمة المرور</label>
              </div>

              <!-- Remember me checkbox -->
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                <label class="form-check-label" for="remember">تذكرني</label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-success btn-block mb-4">
                تسجيل الدخول
              </button>
              <!-- Register link -->
              <p class="text-center">
                <a href="{{ route('register') }}">لا أمتلك حساب</a>
              </p>
            </form>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-8">
        <h1 class="my-5 display-3 fw-bold ls-tight">
          أفضل العروض <br />
          <span class="text-success">للمنتجات التجارية</span>
        </h1>
      </div>
    </div>
  </div>
</section>



@endsection
