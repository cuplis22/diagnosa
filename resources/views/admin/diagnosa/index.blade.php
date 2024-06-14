<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form action="/admin/diagnosa/create-pasien" method="post">

                    @csrf
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" required name="name" placeholder="Nama Pasien">
                    </div>

                        <div class="form-group">
                            <label for="">Umur</label>
                            <input type="number" class="form-control" required name="umur" placeholder="Umur">
                        </div>

                            <button type="submit" class="btn btn-primary"> Diagnosa <i class="fas fa-arrow-right"></i></button>
                        {{-- <a href="/admin/diagnosa/pilih-gejala" class="btn btn-primary"> Diagnosa <i class="fas fa-arrow-right"></i></a> --}}

                </form>

            </div>
        </div>
    </div>
</div>
