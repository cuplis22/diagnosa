<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form action="/admin/user" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Name"
                        value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control @error('role')is-invalid @enderror" id="">
                            <option value="">-- Role --</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control @error('re_pass')is-invalid @enderror" name="re_pass" placeholder="Confirm Password">
                        @error('re_pass')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <a href="/admin/user" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>

                </form>

            </div>
        </div>
    </div>
</div>
