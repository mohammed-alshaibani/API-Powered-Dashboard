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
<br><br>
<!-- Section: Design Block -->
<section class="vh-100 d-flex align-items-center justify-content-center" >
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-center">إنشاء حساب </h1>
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- Name input -->
              <div class="form-outline mb-4">
                <input type="text" id="name" class="form-control" name="name" />
                <label class="form-label" for="name">الاسم</label>
              </div>

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

              <!-- Confirm Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" />
                <label class="form-label" for="password_confirmation">تأكيد كلمة المرور</label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-success btn-block mb-4">
                تسجيل
              </button>

                <!-- Register link -->
                <p class="text-center">
                <a href="{{ route('login') }}"> أمتلك حساب</a>
              </p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-8">
        <h1 class="my-5 display-3 fw-bold ls-tight">
           إنضم لعائلتنا <br />
           <span class="text-success">كل يوم أفراد جدد<br>تنضم لمتجرنا</span>
        </h1>
        <b>
    أونلاين شوبنج يوفر لك أفضل المنتجات بأرخص الأسعار
          </b>
      </div>
    </div>
  </div>
</section>

@endsection