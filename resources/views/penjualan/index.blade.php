@extends('layout/index')
@section('content')
    <section class="content-header">
        <title>View | Cash Transaksi</title>
        <section class="content-header ml-4">
            <div class="row mt-2">
                <h1 class="m-0">Data Cash Transaksi</h1>
            </div>
        </section>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('penjualans.create') }}">
                                <button class="btn btn-primary m-2">Tambah Data Penjualan</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tblAkun">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Customer</th>
                                            <th>Jumlah Stok</th>
                                            <th>Harga</th>
                                            <th>Keterangan</th>
                                            <th>User Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualans as $penjualan)
                                        <tr>
                                            {{-- @if (session('gudang')[0]['jabatan'] != 'IT') --}}
                                            <td>{{ $penjualan->gudang->nama_barang }}</td>
                                            <td>{{ $penjualan->customer->CompanyName }}</td>
                                            <td>{{ $penjualan->jumlah }}</td>
                                            <td>{{ $penjualan->harga }}</td>
                                            <td>{{ $penjualan->keterangan }}</td>
                                            <td>{{ $penjualan->user->username }}</td>
                                            {{-- @endif --}}
                                            @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'IT')
                                                <td>
                                                    <a href="{{ route('penjualans.edit', $penjualan->id) }}"
                                                        class="btn">
                                                        <i class="fa fa-edit text-info fa-lg"></i>
                                                    </a>
                                                    <a data-id="{{ $penjualan->id }}" data-cust="{{ $penjualan->customer->CompanyName }}" data-nama="{{ $penjualan->gudang->nama_barang }}"
                                                        class="btn tombol-hapus">
                                                        <i class="fa-regular fa-rectangle-xmark text-danger fa-xl" title="BATAL"></i>

                                                    </a>
                                                    {{-- <form style="display: inline" method="post"
                                                        action="{{ route('penjualans.destroy', $penjualan->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </button>
                                                    </form> --}}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#tblAkun').DataTable()
        })
    </script>
    <script>
        $(".tombol-hapus").click(function() {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            var cust = $(this).attr('data-cust');

            Swal.fire({
                title: "Yakin Ingin Menghapus Data Penjualan " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data pesanan dari " + cust + " !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_penjualans/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        ""+nama+" Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
