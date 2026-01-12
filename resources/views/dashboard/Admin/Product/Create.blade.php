@extends('layouts.dashboard.header')
@section('content')

<div class="container">
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-12">
            <h1>منتج جديد</h1>
            <form action="{{ route('Product.Store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">إسم المنتج</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل إسم المنتج">
                </div>
                <div class="form-group">
                    <label for="image">صورة المنتج</label>
                    <input type="file" class="form-control" id="image" name="image[]" multiple>
                </div>
                <div class="form-group">
                    <label for="price">السعر</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="أدخل سعر المنتج">
                </div>
                <div class="form-group">
                    <label for="coins">العملة</label>
                    <select name="coins" id="coins" class="form-control" required>
                        <option value="ريال يمني">ريال يمني</option>
                        <option value="ريال سعودي">ريال سعودي</option>
                        <option value="دولار إمريكي">دولار إمريكي</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">وصف المنتج</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <div class="form-group">
    <label for="category">القسم الرئيسي</label>
    <select class="form-control" id="category" name="category_id">
        <option value="">اختر القسم الرئيسي</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="subcategory">القسم الفرعي</label>
    <select class="form-control" id="subcategory_id" name="subcategory_id">
        <option value="">-- اختر القسم الفرعي --</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">حفظ</button>
</form>
<script>
    var categoryDropdown = document.getElementById('category');
    var subcategoryDropdown = document.getElementById('subcategory_id');

    categoryDropdown.addEventListener('change', function() {
        var categoryId = this.value;

        // Clear existing subcategory options
        subcategoryDropdown.innerHTML = '<option value="">-- اختر القسم الفرعي --</option>';

        if (categoryId) {
            fetch('/dashboard/Product/get-subcategories/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(subcategory => {
                        var option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subcategoryDropdown.appendChild(option);
                    });
                });
        }
    });
</script>
@endsection