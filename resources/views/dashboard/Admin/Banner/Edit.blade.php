@extends('layouts.dashboard.header')
@section('content')
<div class="container">
@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
  <div class="row">
    <div class="col-md-8">
      <h1>تحديث بيانات العرض</h1>
      <form action="{{ route('Banner.Update', ['id' => $banner->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
     
        <input type="hidden" name="id" value="{{ $banner->id }}"> 
     
        <div class="form-group">
          <label for="image">صورة العرض</label>
          <input type="file" class="form-control" id="image" name="image[]" multiple>
          @if ($banner->image)
            <div class="mt-3">
              <p>الصور الحالية</p>
                <img src="{{ asset($banner->path) }}" alt="{{ $banner->name }}" class="img-thumbnail">
            </div>
          @endif
        </div>
        
        <div class="form-group">
          <label for="product">المنتج</label>
          <select class="form-control" id="product" name="product_id">
            @foreach ($products as $product)
              <option value="{{ $product->id }}" @if ($product->id == $product->product_id) selected @endif>{{ $product->name }}</option>
            @endforeach
          </select>
        </div>
     
        <button type="submit" class="btn btn-primary">تحديث</button>
      </form>
    </div>
  </div>
</div>
@endsection