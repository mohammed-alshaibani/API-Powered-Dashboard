@extends('layouts.dashboard.header')

@section('content')
<div class="container">
    <h1>Edit Coupon</h1>
    <form action="{{ route('Coupon.Update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $coupon->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">الإسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $coupon->name }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">النوع</label>
            <select class="form-select" id="type" name="type" required>
                <option value="percent" {{ $coupon->type === 'percent' ? 'selected' : '' }}>نسبة مئوية</option>
                <option value="fixed" {{ $coupon->type === 'fixed' ? 'selected' : '' }}>مبلغ محدد</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="coupon_value" class="form-label">قيمة الخصم</label>
            <input type="number" class="form-control" id="coupon_value" name="coupon_value" value="{{ $coupon->coupon_value }}" required>
        </div>
        <div class="mb-3">
            <label for="cart_value" class="form-label">Cart Value</label>
            <input type="number" class="form-control" id="cart_value" name="cart_value" value="{{ $coupon->cart_value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection