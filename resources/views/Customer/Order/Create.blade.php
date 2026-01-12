@extends('layouts.Customer.header')

@section('content')
<div class="row"><!-- row 1 begin -->
   
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-plus"></i> إنشاء طلب
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->

            <div class="panel-body"><!-- panel-body begin -->
                <form action="{{ route('Order.Store') }}" method="POST" class="form-horizontal"><!-- form-horizontal begin -->
                    @csrf

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">رقم العميل:</label>
                        <div class="col-md-6">
                            <input type="text" name="customer_email" class="form-control" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">إسم المنتج:</label>
                        <div class="col-md-6">
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">الكمية:</label>
                        <div class="col-md-6">
                            <input type="number" name="product_qty" class="form-control" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> تاريخ الطلب:</label>
                        <div class="col-md-6">
                            <input type="date" name="order_date" class="form-control" required>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">الحالة:</label>
                        <div class="col-md-6">
                            <select name="status" class="form-control" required>
                                <option value="Pending">تحت المراجعة</option>
                                <option value="Processing">قيد التنفيذ </option>
                                <option value="Completed">مكتمل</option>
                            </select>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check"></i> حفظ الطلب
                            </button>
                        </div>
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
@endsection