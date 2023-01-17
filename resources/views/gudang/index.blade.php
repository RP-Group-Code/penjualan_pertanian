@extends('layout/index')
@section('content')
    <section class="content-header">
        <title>View | Gudang Utama</title>
        <section class="content-header ml-4">
            <div class="row mt-2">
                <h1 class="m-0">Data Gudang Utama</h1>
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
                            <a href="{{ route('gudangs.create') }}">
                                <button class="btn btn-primary m-2">Tambah Barang Gudang</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tblAkun">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jenis Gudang</th>
                                            <th>Jumlah Stok</th>
                                            <th>Jenis Barang</th>
                                            <th>Harga Jual</th>
                                            <th>Keterangan</th>
                                            {{-- <th>QR Code</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gudangs as $gudang)
                                            <tr>
                                                {{-- @if (session('gudang')[0]['jabatan'] != 'IT') --}}
                                                <td>{{ $gudang->nama_barang }}</td>
                                                <td>{{ $gudang->jenis_gudang }}</td>
                                                <td>{{ $gudang->jumlah_stok }}</td>
                                                <td>{{ $gudang->jenis_barang }}</td>
                                                <td>{{ $gudang->harga_jual }}</td>
                                                <td>{{ $gudang->keterangan }}</td>
                                                {{-- <td>
                                                    {!! QrCode::size(120)->generate($gudang->id) !!}

                                                </td> --}}
                                                {{-- @endif --}}

                                                @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'IT')
                                                    <td>
                                                        <a href="{{ route('gudangs.edit', $gudang->id) }}"
                                                            class="btn">
                                                            <i class="fa fa-edit text-info fa-lg"></i>
                                                        </a>
                                                        <a data-id="{{ $gudang->id }}"
                                                            data-nama="{{ $gudang->nama_barang }}"
                                                            class="btn tombol-hapus">
                                                            <i class="fa-regular fa-rectangle-xmark text-danger fa-xl"
                                                                title="BATAL"></i>

                                                        </a>
                                                        {{-- <form style="display: inline" method="post"
                                                        action="{{ route('gudangs.destroy', $gudang->id) }}">
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
        {{-- <div class="row">
            <div class="col-3">
                <div id="reader" width="400px">
                </div>
            </div>
            <div class="col-4">
                <input id="textQR" type="text">
            </div>
        </div> --}}
    </section>
@endsection
@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            // console.log(`Code matched = ${decodedText}`, decodedResult);
            $("#textQR").val(decodedText)

            let id = decodedText

            Swal.fire({
                icon: 'succes',
                title: 'Berhasil Scan QRCode',
                text: 'Data Id Berhasil DIdapat',
                footer: '<a href="">Why do I have this issue?</a>'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{url('validasiQR')}}",
                        type: 'POST',
                        data: {
                            '_method' : 'POST',
                            'qrscan' : id,
                        },

                    })
                }
            })

            // Swal.fire({
            //     icon: 'succes',
            //     title: 'Berhasil Scan QRCode',
            //     text: 'Data Id Berhasil DIdapat',
            //     footer: '<a href="">Why do I have this issue?</a>'
            // }).then((result) => {
            //     if (result.value) {
            //         window.location = id
            //         Swal.fire(
            //             'a',
            //             "" + nama + " Berhasil  ",
            //             'success'
            //         )
            //     }
            // })
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 30,
                qrbox: {
                    width: 370,
                    height: 270
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>

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
                title: "Yakin ingin Menghapus Data Gudang " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_gudangs/" + id + ""
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
