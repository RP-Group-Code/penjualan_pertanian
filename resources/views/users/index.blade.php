@extends('layout/index')
@section('content')
    <section class="content-header">
        <title>View | User</title>
        <section class="content-header ml-4">
            <div class="row mt-2">
                <h1 class="m-0">Pengguna Aplikasi</h1>
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
                            <a href="{{ route('users.create') }}">
                                <button class="btn btn-primary m-2">Tambah Pengguna</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tblAkun">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                {{-- @if (session('user')[0]['jabatan'] != 'IT') --}}
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->notelp }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->jabatan }}</td>
                                                {{-- @endif --}}

                                                @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'IT')
                                                    <td>
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn">
                                                            <i class="fa fa-edit text-info"></i>
                                                        </a>
                                                        <a data-id="{{ $user->id }}" data-nama="{{ $user->nama }}"
                                                            class="btn tombol-hapus">
                                                            <i class="fa-regular fa-rectangle-xmark text-danger fa-xl" title="BATAL"></i>
                                                        </a>
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
                title: "Yakin ingin Menghapus Data Users " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_users/" + id + ""
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
