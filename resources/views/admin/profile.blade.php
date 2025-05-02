@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profil Akun</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" class="user">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="exampleInputName"
                                placeholder="Masukan nama" value="{{ old('name', Auth::user()->name) }}">
                            @error('name')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Masukan email" value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="old_password" id="exampleInputOldPassword"
                                placeholder="Masukan password lama">
                            @error('old_password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword"
                                placeholder="Masukan password baru (opsional)">
                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleInputPasswordConfirmation"
                                placeholder="Konfirmasi password baru">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan Perbubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
