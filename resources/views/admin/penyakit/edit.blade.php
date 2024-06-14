<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                @isset($penyakit)

                <form action="/admin/penyakit/{{ $penyakit->id }}" method="POST">
                    @method('PUT')
                @else
                <form action="/admin/penyakit" method="POST">
                @endisset
                    @csrf

                    <div class="form-group">
                        <label for="">Kode Penyakit</label>
                        <input type="kode_penyakit" class="form-control @error('kode_penyakit')is-invalid @enderror" name="kode_penyakit" placeholder="Kode Penyakit"
                        value="{{ isset($penyakit) ? $penyakit->kode_penyakit : old('kode_penyakit') }}" readonly>
                        @error('kode_penyakit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Nama Gejala"
                        value="{{ isset($penyakit) ? $penyakit->name : old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="desc" class="form-control @error('desc')is-invalid @enderror" id="" cols="30" rows="10">
                            {{ isset($penyakit) ? $penyakit->desc : old('desc') }}
                        </textarea>
                        @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Penanganan</label>
                        <textarea name="penanganan" class="form-control @error('penanganan')is-invalid @enderror" id="" cols="30" rows="10">
                            {{ isset($penyakit) ? $penyakit->penanganan : old('penanganan') }}
                        </textarea>
                        @error('penanganan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <a href="/admin/gejala" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>

                </form>
            </form>

            </div>
        </div>
    </div>
</div>
