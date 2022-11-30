@extends('application.admin.layout')

@section('judul')
    Products
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/application/admin/product/create" class="btn btn-primary">Add</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ( $products as  $product)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ asset('storage/'. $product->image )}}" style="width: 80px">
                        </td>
                        <td>{{ number_format($product->harga, 0) }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>x</td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
        </div>
    </div>
@endsection