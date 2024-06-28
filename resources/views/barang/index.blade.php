@extends('layout.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('produk') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ 
                     Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{url('produk/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Kode</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$item->Kode}}</td>
                            <td>{{$item->Nama}}</td>
                            <td>{{$item->Harga}}</td>
                            <td>
                                <a href='{{ url('produk/'.$item->Kode.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('yakin menghapus data?')"
                                 class='d-inline' action="{{ url('produk/'.$item->Kode) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm" >Dell</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
          </div>
          <!-- AKHIR DATA -->
          @endsection
   