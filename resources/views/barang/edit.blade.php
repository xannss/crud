  @extends('layout.template')
  <!-- START FORM -->
  @section('konten')

  <form action='{{ url('produk/'.$data->Kode) }}' method='post'>
@csrf
@method('put')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('produk')}}" class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="Kode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                {{ $data->Kode }}
        </div>
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Nama' value="{{ $data->Nama }}" id="Nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Harga' value="{{ $data->Harga }}" id="Harga">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Harga" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->
    @endsection