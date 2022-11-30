@extends('application.admin.layout')

@section('judul')
    Form Add Product
@endsection

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <form action="/application/admin/product/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" class="form-control" name="kode_barang" value="{{ old('kode_barang') }}">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
            </div>
    
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image">
            </div>
    
            <div class="form-group">
                <label>Qty</label>
                <input type="number" class="form-control" name="qty" value="{{ old('qty') }}">
            </div>
    
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="/application/admin/product" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    <!-- /.card-body -->
</div>
@endsection