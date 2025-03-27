@extends('layout.main')

@section('container')
    <h2 class="text-center mb-4">{{ $judul }}</h2>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8 col-lg-6">
            <form action="/petugass/{{ $petugas->id }}" method="POST" class="p-4 border rounded bg-light custom-form-ae">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="namePetugas">Nama</label>
                    <input type="text" class="form-control @error('namaPetugas') is-invalid @enderror" id="namePetugas"
                        name="namePetugas" required autofocus value="{{ old('namePetugas', $petugas->name) }}">
                    @error('namePetugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="usernamePetugas">Username</label>
                    <input type="text" class="form-control @error('usernamePetugas') is-invalid @enderror"
                        id="usernamePetugas" name="usernamePetugas" required
                        value="{{ old('usernamePetugas', $petugas->username) }}">
                    @error('usernamePetugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailPetugas">Email</label>
                    <input type="email" class="form-control @error('emailPetugas') is-invalid @enderror" id="emailPetugas"
                        name="emailPetugas" required value="{{ old('emailPetugas', $petugas->email) }}">
                    @error('emailPetugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="passwordPetugas">Kata Sandi</label>
                    <input type="password" class="form-control @error('passwordPetugas') is-invalid @enderror"
                        id="passwordPetugas" name="passwordPetugas" required placeholder="Masukkan kata sandi lama/baru">
                    @if ($errors->has('passwordPetugas'))
                        <div class="invalid-feedback">
                            {{ $errors->first('passwordPetugas') }}
                        </div>
                    @else
                        <p class="text-muted mt-1" style="font-size: 15px;">Masukkan kata sandi lama atua baru untuk menyimpan perubahan.</p>
                    @endif

                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_id" id="admin" value="1" required
                            {{ $petugas->role_id == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="admin">Admin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_id" id="non-admin" value="2"
                            {{ $petugas->role_id == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="non-admin">Non-Admin</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/petugass" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
