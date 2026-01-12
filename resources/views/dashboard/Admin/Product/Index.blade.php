@extends('layouts.dashboard.header')

@section('content')
<style>
    .product-image {
        width: 50px;
        height: 50px;
        background-size: cover;
        background-position: center;
    }
</style>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> لوحة التحكم / جميع المنتجات
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  جميع المنتجات
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                            <th>رقم المنتج</th>
                        <th>اسم المنتج</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>العملة</th>
                        <th>الوصف</th>
                        <th>القسم الرئيسي</th>
                        <th>الإجراءات</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                @foreach ($images as $image)
                                @if ($image->product_id == $product->id)
                                           <div class="product-image" style="background-image: url('{{ asset('images/products_image/' . $image->image) }}');" title="{{ $product->name }}"></div>
                                  @endif
                                @endforeach

                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->coins  }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('Product.Edit',['id' => $product->id]) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"></i> تعديل
                                    </a>
                                </td>
                                <td>
                             <form action="{{ route('Product.Destroy', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل أنت متأكد من حذف القسم؟')">
                                  <i class="fa fa-trash"></i> حذف
                               </button>
                            </form>
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-responsive finish -->
                <div class="text-center">
                {{ $products->links() }}
                </div>
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

@endsection