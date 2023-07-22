@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">All Data Products</h4>
    <a href="{{route('produk.create')}}" class="btn btn-primary px4">Buat Produk Baru</a>

    <div class="table-responsive mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">stock</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        {{ $nomer++ }}
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        Rp. {{ number_format($product->price) }}
                    </td>
                    <td>
                        {{ $product->stock }}
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        <img src="{{url('storage/' . $product->image)}}" style="width: 50px; height: 50px; object-fit: cover" alt="">
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{route('produk.edit', $product->id)}}" class="btn btn-warning text-white">Edit</a>
                            <form action="{{route('produk.destroy', $product->id)}}" method="post" onsubmit="return confirm('Yakin Hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" >Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
