@extends('layouts.dashboard.header')

@section('content')
<div class="container">
    <h1>إنشاء كوبون</h1>
    <form action="{{ route('Coupon.Store') }}" method="POST" id="create-coupon-form">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">الإسم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">النوع</label>
            <select class="form-select" id="type" name="type" required>
                <option value="percent">نسبة مئوية</option>
                <option value="fixed">مبلغ محدد</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="coupon_value" class="form-label">نسبة الخصم</label>
            <input type="number" class="form-control" id="coupon_value" name="coupon_value" required>
        </div>

        <div class="mb-3">
            <label for="cart_value" class="form-label">قيمة الخصم </label>
            <input type="number" class="form-control" id="cart_value" name="cart_value" required>
        </div>

        <div class="mb-3" wire:ignore>
            <label for="expiry_date" class="form-label">تاريخ الإنتهى</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="تاريخ الإنتهى" required>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>

@push('script')
<script>
    $(function() {
        $('#expiry_date').datetimepicker({
            format: 'Y-MM-DD'
        }).on('dp.change', function(ev) {
            var date = $('#expiry_date').val();
            @this.set('expiry_date', date);
        });
    });
</script>
@endpush
@endsection