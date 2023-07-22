@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mt-3 mb-5">Edit Data {{$product->title}}</h4>

    <form action="{{route('produk.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container mb-3">
            <label for="image">Gambar</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
            <span class="text-secondary">Jika tidak ingin mengganti gambar jangan diisi!</span>
        </div>
        <div class="container mb-3">
            <label for="image">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value='{{$product->name}}'>
        </div>
        <div class="container mb-3">
            <label for="image">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value='{{$product->price}}'>
        </div>
        <div class="container mb-3">
            <label for="image">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value='{{$product->stock}}'>
        </div>
        <div class="container mb-3">
            <label for="image">Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$product->description}}</textarea>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-primary px-3" type="submit">Edit Produk</button>
            <a href="{{route('produk.index')}}" class="btn btn-light px-3">Kembali</a>
        </div>
    </form>
</div>

@endsection
