@extends('adminHome')
@section('content-wrapper')
<div class="panel-heading bg-white">
    <div class="row">
        <div class="col-md-8">
          <h3>Data Kontak</h3>
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
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Alamt</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->email }}</td>
                        <td>{{ $datas->nohp }}</td>
                        <td>{{ substr($datas->alamat,0,10) }}</td>
                        <td colspan="2">
                        <form action="{{ route('kontak.destroy',$datas->id) }}" method="post">{{ csrf_field() }} {{ method_field('DELETE') }}
                        <button type="button" data-toggle="modal" data-target="#edit-data{{ $datas->id }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Anda yakin menghapus data?')"><i class="fa fa-trash"></i></button>
                        </form>
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

    <!------Modal Add data----->
    <div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Data Contack</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <hr>
        <form action="{{ route('kontak.store') }}" method="post">
        {{csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" id="usr" name="nama" required>
            </div>
            <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nomor Telephone" id="nohp" name="nohp" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Address" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-md btn-danger">Cancel</button>
                    </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
<!------Modal edit data----->
     @foreach($data as $dt) 
    <div class="modal fade" id="edit-data{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <h1>Add Data Contack</h1>
        <hr>
        <form action="{{ route('kontak.update', $datas->id) }}}" method="post">
        {{csrf_field() }}
        {{ method_field('PUT') }}
            <div class="form-group">
                <label for="nama">Nama : </label>
            <input type="text" class="form-control" value="{{ $dt->nama }}" id="usr" name="nama" required>
            </div>
            <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" value="{{ $dt->email }}" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No Hp:</label>
                        <input type="text" class="form-control" value="{{ $dt->nohp }}" id="nohp" name="nohp" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $dt->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-md btn-danger">Cancel</button>
                    </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
    @endforeach


@endsection