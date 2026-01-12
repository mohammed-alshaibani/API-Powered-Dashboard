@extends('layouts.dashboard.header')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Order
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i> تعديل الطلب
                </h3>
            </div>

            <div class="panel-body">
                <form action="{{ route('Order.Update', $order->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="col-md-3 control-label">رقم العميل:</label>
                        <div class="col-md-6">
                            <input type="email" name="customer_email" class="form-control" value="{{ $order->customer_email }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">إسم المنتج:</label>
                        <div class="col-md-6">
                            <input type="text" name="product_name" class="form-control" value="{{ $order->product_name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">الكمية:</label>
                        <div class="col-md-6">
                            <input type="number" name="product_qty" class="form-control" value="{{ $order->product_qty }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">المنتج:</label>
                        <div class="col-md-6">
                            <input type="text" name="company_name" class="form-control" value="{{ $order->company_name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> تاريخ الطلب:</label>
                        <div class="col-md-6">
                            <input type="date" name="order_date" class="form-control" value="{{ $order->order_date }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">حالة الطلب:</label>
                        <div class="col-md-6">
                            <select name="status" class="form-control">
                                <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>تم الإرسال</option>
                                <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>قيد التنفيذ</option>
                                <option value="Completed" {{ $order->status === 'Completed' ? 'selected' : '' }}>مكتمل</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           ```html
                            <button type="submit" class="btn btn-primary">تحديث الحالة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection