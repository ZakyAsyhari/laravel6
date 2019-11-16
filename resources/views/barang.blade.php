@extends('adminHome')
@section('content-wrapper')
<div class="panel-heading bg-white">
    <div class="row">
        <div class="col-md-8">
          <h3>Data Praduct</h3>
          @if(Session::has('alert-success'))
            <div class="alert alert-success">
                <strong>{{\Illuminate\Support\Facades\Session::get('alert-success')}}</strong>
            </div>
            @endif
        </div>
		<div class="col-md-4">
			<div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" name="cari" placeholder="Cari ..." autocomplete="off" value="">
                </div>
            </div>
		  </div>
    </div>
    <div class="row">
      <div class="col-lg-12">      		
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="bg-blue-600">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>information</th>
                    <th>Categoris</th>
                    <th>Price</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $no=1; @endphp
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dt->nama_produk }}</td>
                    <td>{{ $dt->keterangan }}</td>
                    <td>{{ $dt->kategori }}</td>
                    <td>{{ $dt->harga }}</td>
                    <td>{{ $dt->qty }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-data{{ $dt->id }}"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus{{ $dt->id }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <button type="button" data-toggle="modal" data-target="#add-data" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
</div>
<!----Modal Add--->
    <div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <hr>
            <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name Product" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                            <input type="texte" class="form-control" placeholder="Information" id="info" name="info" required>
                        </div>
                        <div class="form-group">
                            <select name="kategori" id="kategori" class="form-control" aria-placeholder="Select Category" required>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Sport">Sport</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Price" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                                <input type="number" class="form-control" placeholder="Stock" id="qty" name="qty" required>
                        </div>
                        <div class="form-group">
                            <label for="qty">Picture</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="simpan" class="btn btn-md btn-primary">Submit</button>
                            <button type="reset" data-dismiss="modal" class="btn btn-md btn-danger">Cancel</button>
                        </div>
            </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    <!----Modal Edit--->
    @foreach ($data as $dt)
<div class="modal fade" id="edit-data{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <hr>
            <form action="{{ route('barang.update',$dt->id) }}" method="post">
            {{csrf_field() }} {{method_field('PUT')}}
                <div class="form-group">
                    <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$dt->nama_produk}}">
                </div>
                <div class="form-group">
                            <label for="info">information</label>
                            <input type="texte" class="form-control" id="info" name="info" value="{{$dt->keterangan}}">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Categori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="Elektronik">Elektronik</option>
                                <option value="Sport">Sport</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="{{$dt->harga}}">
                        </div>
                        <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="text" class="form-control" id="qty" name="qty" value="{{$dt->qty}}">
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            <button type="reset" data-dismiss="modal" data-dismiss="modal" class="btn btn-md btn-danger">Cancel</button>
                        </div>
            </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    @endforeach
    <!----Modal Delete--->
    @foreach ($data as $dt)
    <div class="modal fade" id="hapus{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delet Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <form action="{{ route('barang.destroy', $dt->id) }}" method="post">{{ csrf_field() }} {{method_field('DELETE')}}
                    <p>Yakin inign mengapus {{ $dt->nama_produk }}</p>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
