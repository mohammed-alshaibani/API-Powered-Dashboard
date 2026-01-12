@extends('layouts.dashboard.header')

@section('content')
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> لوحة التحكم / تعديل الطلب 
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-pencil"></i> تعديل الطلب
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" method="POST" class="form-horizontal"><!-- form-horizontal begin -->
                    @csrf
                    @method('PUT')

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">رقم الطلب:</label>
                        <div class="col-md-6">
                            <input type="email" name="customer_email" class="form-control" value="" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">إسم المنتج:</label>
                        <div class="col-md-6">
                            <input type="text" name="product_name" class="form-control" value="" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">الكمية:</label>
                        <div class="col-md-6">
                            <input type="number" name="product_qty" class="form-control" value="" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">المنتج:</label>
                        <div class="col-md-6">
                            <input type="text" name="company_name" class="form-control" value="" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> تاريخ الطلب:</label>
                        <div class="col-md-6">
                            <input type="date" name="order_date" class="form-control" value="" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">حالة الطلب:</label>
                        <div class="col-md-6">
                            <select name="status" class="form-control" required>
                                <option value="Pending">Pending</option>
                                <option value="Processing">Processing</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check"></i> تحديث الطلب
                            </button>
                        </div>
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
@endsection