<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                @isset($user)

                <form action="/admin/user/{{ $user->id }}" method="POST">
                    @method('PUT')
                @else
                <form action="/admin/user" method="POST">
                @endisset
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Name"
                        value="{{ isset($user)? $user->name : old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ isset($user)? $user->email : old('email') }}" placeholder="Email" readonly>
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
                            <option value="admin" {{ isset($user)? $user->role == 'admin' ? 'selected' : '' : '' }}>Admin</option>
                            <option value="user" {{ isset($user)? $user->role == 'user' ? 'selected' : '' : '' }}>User</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Password"
                        value="{{ isset($user)? $user->password : old('password') }}" readonly>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <a href="/admin/user" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>

                </form>
            </form>

            </div>
        </div>
    </div>
</div>
