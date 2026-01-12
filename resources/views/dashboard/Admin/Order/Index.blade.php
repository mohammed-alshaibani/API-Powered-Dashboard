@extends('layouts.dashboard.header')

@section('content')
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i>   جميع الطلبات
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-tags"></i> جميع الطلبات
                </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> رقم الطلب: </th>
                                <th> رقم العميل: </th>
                                <th> إسم المنتج/المنتجات: </th>
                                <th> الكمية: </th>
                                <th> تاريخ الطلب: </th>
                                <th> الحالة: </th>
                                <th> الإجراءات: </th> <!-- Changed from "Delete" to "Actions" -->
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            @foreach ($orders as $order)
                                <tr><!-- tr begin -->
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->product_qty }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href="{{ route('Order.Edit', $order->id) }}" class="btn btn-info btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span> Edit
                                        </a>
                                        <form action="{{ route('Order.Destroy', $order->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr><!-- tr finish -->
                            @endforeach
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
@endsection