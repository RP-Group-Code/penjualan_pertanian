@extends('layout/index')
@section('content')
    <section class="content-header">
        <title>View | Gudang Delivery</title>
        <section class="content-header ml-4">
            <div class="row mt-2">
                <h1 class="m-0">Data Gudang Delivery</h1>
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
                            <a href="{{ route('gudangd.create') }}">
                                <button class="btn btn-primary m-2">Tambah Barang Delivery</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tblAkun">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Customer</th>
                                            <th>Salesman</th>
                                            <th>Jenis Gudang</th>
                                            <th>Jumlah Stok</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gudangd as $barang)
                                            <tr>
                                                {{-- @if (session('gudang')[0]['jabatan'] != 'IT') --}}
                                                <td>{{ $barang->penjualan->gudang->nama_barang }}</td>
                                                <td>{{ $barang->customer->CompanyName }}</td>
                                                <td>{{ $barang->salesman->Nama }}</td>
                                                <td>{{ $barang->jenis_gudang }}</td>
                                                <td>{{ $barang->jumlah_stok }}</td>
                                                <td>{{ $barang->keterangan }}</td>
                                                {{-- @endif --}}

                                                <td>
                                                    <a href="{{ route('gudangd.edit', $barang->id) }}"
                                                        class="btn">
                                                        <i class="fa fa-edit text-info fa-lg" title="UBAH"></i>
                                                    </a>
                                                    <a data-id="{{ $barang->id }}" data-nama="{{ $barang->penjualan->gudang->nama_barang }}"
                                                        class="btn tombol-hapus">
                                                        <i class="fa-regular fa-rectangle-xmark text-danger fa-xl" title="BATAL"></i>

                                                    </a>
                                                    {{-- <form style="display: inline" method="post"
                                                        action="{{ route('gudangd.destroy', $barang->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            <i class="fa-regular fa-rectangle-xmark text-danger fa-lg" title="BATAL"></i>
                                                        </button>
                                                    </form> --}}
                                                </td>
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

            Swal.fire({
                title: "Yakin ingin Membatalkan Delivery " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_gudangd/" + id + ""
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
