@extends('layout/index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary p-3">
                    <div class="box-header pt-3 pb-4">
                        <div class="box-title">
                            Edit Pengguna
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PATCH">
                    {{-- <form action="{{ url('user/' . $users->id) }}" method="POST" enctype="multipart/form-data"> --}}
                    <form action="{{ route('users.update', $users->id) }}" method="POST" value="PATCH" name="method">
                        <div class="box-body">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ $users->username }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password
                                        </label>
                                        <input readonly type="password" name="password" id="password" class="form-control"
                                            value="{{ $users->password }}">

                                    </div>
                                    <div class="form-group">
                                        <label for="notelp">Telepon</label>
                                        <input type="text" name="notelp" id="notelp" class="form-control"
                                            value="{{ $users->notelp }}">
                                        {{-- @error('noHp')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $users->nama }}">
                                        {{-- @error('noHp')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="{{ $users->email }}">
                                        {{-- @error('noHp')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror --}}
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan">jabatan</label>
                                        <select class="form-control ml-2 mr-2" name="jabatan" id="jabatan">
                                            <option value="{{ $users->jabatan }}" hidden>
                                                {{ $users->jabatan }}
                                            </option>
                                            <option>~ Pilih Jabatan ~</option>
                                            <option value="Manager Lapangan"
                                                {{ $users->jabatan == 'Manager Lapangan' ? 'selected' : '' }}>Manager
                                                Lapangan</option>
                                            <option value="Manager Proyek"
                                                {{ $users->jabatan == 'Manager Proyek' ? 'selected' : '' }}>Manager
                                                Proyek</option>
                                            <option value="Admin" {{ $users->jabatan == 'Admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="Direktur"
                                                {{ $users->jabatan == 'Direktur' ? 'selected' : '' }}>Direktur
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('users.index') }}" class="btn btn-warning mr-2">KEMBALI</a>
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </div>
                        <div class="box-footer">
                            {{-- <a href="{{ route('users.index') }}" class="btn btn-primary mr-2">Back</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
