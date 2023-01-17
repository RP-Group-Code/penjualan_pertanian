@extends('layout/index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">

                        <div class="box-title m-4">
                            Tambah Pengguna
                        </div>
                    </div>
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="box-body m-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Masukkan Username" value="{{ old('username') }}">
                                        @error('username')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp">Telepon</label>
                                        <input type="text" name="notelp" id="notelp" class="form-control"
                                            placeholder="Masukkan Telepon" value="{{ old('notelp') }}">
                                        @error('notelp')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Masukkan Password" value="{{ old('password') }}">
                                        @error('password')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Masukkan Telepon" value="{{ old('email') }}">
                                        @error('email')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            placeholder="Masukkan nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option>~ Pilih Jabatan ~</option>
                                            <option>Direktur</option>
                                            <option>Manager Lapangan</option>
                                            <option>Manager Keuangan</option>
                                            <option>Admin Gudang</option>
                                        </select>
                                        @error('jabatan')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer m-4">
                            <a href="{{ route('users.index') }}" class="btn btn-warning mr-2">KEMBALI</a>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
