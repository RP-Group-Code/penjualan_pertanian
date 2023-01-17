@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2 pt-5">
        <title>Edit | Gudang Retur</title>
        <div class="container-fluid">
            <h1>
                Gudang Retur
            </h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pengubahan Data Gudang Retur</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('gudangr.update', $gudangr->id) }}" method="POST" enctype="multipart/form-data"
                    id="quickForm">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="retur_id">Barang</label>
                                <select readonly="readony" name="retur_id" id="retur_id" class="form-control">
                                    <option value="{{ $gudangr['retur_id'] }}" hidden>
                                        {{ $gudangr->retur->gudang->nama_barang }}
                                    </option>
                                    @foreach ($returs as $brg)
                                            <option value="{{ $brg->id }}">{{ $brg->gudang->nama_barang }}</option>
                                        @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="customer_id">Barang</label>
                                <select readonly="readony" name="customer_id" id="customer_id" class="form-control">
                                    <option value="{{ $gudangr['customer_id'] }}" hidden>
                                        {{ $gudangr->customer->CompanyName }}
                                    </option>
                                    @foreach ($customers as $brg)
                                        <option value="{{ $brg->id }}">
                                            {{ $brg->CompanyName }}
                                        </option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="salesman_id">Barang</label>
                                <select readonly="readony" name="salesman_id" id="salesman_id" class="form-control">
                                    <option value="{{ $gudangr['salesman_id'] }}" hidden>
                                        {{ $gudangr->salesman->Nama }}
                                    </option>
                                    @foreach ($saless as $brg)
                                        <option value="{{ $brg->id }}">
                                            {{ $brg->Nama }}
                                        </option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="jumlah_stok">jumlah_stok</label>
                                    <input type="number" name="jumlah_stok" class="form-control"
                                        id="exampleInputPassword1" placeholder="Jumlah Stok Bahan Baku"
                                        value="{{ old('jumlah_stok') ? old('jumlah_stok') : $gudangr['jumlah_stok'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"
                                value="{{ old('keterangan') ? old('keterangan') : $gudangr['keterangan'] }}">
                        </div>
                        <div class="tombol ml-3 mt-5">
                            <a href="{{ route('gudangr.index') }}" class="btn btn-warning">KEMBALI</a>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(".tombol-tambah").click(function() {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: "Yakin ingin menghapus " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_barang/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        "" + nama + " Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>

    <script>
        $(function() {
            $('#tblBarang').DataTable()
        })
    </script>
@endpush
