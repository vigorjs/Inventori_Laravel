@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Transaksi</h4>
    <a href="{{route('transaksi.create')}}" class="btn btn-primary px4">Buat Transaksi Baru</a>

    <div class="table-responsive mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">User</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                <tr>
                    <td>
                        {{ $nomer++ }}
                    </td>
                    <td>
                        {{ $item->products->name }}
                    </td>
                    <td>
                        {{ number_format($item->quantity) }}
                    </td>
                    <td>
                        {{ $item->users->name }}
                    </td>
                    <td>
                            <form action="{{route('transaksi.destroy', $item->id)}}" method="post" onsubmit="return confirm('Yakin Hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" >Hapus</button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
