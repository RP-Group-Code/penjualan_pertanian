@extends('layout/index')
@section('content')
    <section class="content-header">
        <title>View | Gudang Retur</title>
        <section class="content-header ml-4">
            <div class="row mt-2">
                <h1 class="m-0">Data Gudang Retur</h1>
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
                            <a href="{{ route('gudangr.create') }}">
                                <button class="btn btn-primary m-2">Tambah Barang Retur</button>
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
                                        @foreach ($gudangr as $gudang)
                                            <tr>
                                                {{-- @if (session('gudang')[0]['jabatan'] != 'IT') --}}
                                                <td>{{ $gudang->retur->gudang->nama_barang }}</td>
                                                <td>{{ $gudang->customer->CompanyName }}</td>
                                                <td>{{ $gudang->salesman->Nama }}</td>
                                                <td>{{ $gudang->jenis_gudang }}</td>
                                                <td>{{ $gudang->jumlah_stok }}</td>
                                                <td>{{ $gudang->keterangan }}</td>
                                                {{-- @endif --}}

                                                @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'IT')
                                                    <td>
                                                        <a href="{{ route('gudangr.edit', $gudang->id) }}"
                                                            class="btn">
                                                            <i class="fa fa-edit text-info" title="BATAL"></i>
                                                        </a>
                                                        <a data-id="{{ $gudang->id }}" data-nama="{{ $gudang->retur->gudang->nama_barang}}"
                                                            class="btn tombol-hapus">
                                                            <i class="fa-regular fa-rectangle-xmark text-danger fa-xl" title="BATAL"></i>
                                                        </a>
                                                        {{-- <form style="display: inline" method="post"
                                                            action="{{ route('gudangr.destroy', $gudang->id) }}">
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
                    window.location = "/destroy_gudangr/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        "" + nama + " Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
