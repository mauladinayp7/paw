<!DOCTYPE html>
<html>

<head>

    <title>PRAKTIKUM LARAVEL CRUD</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!--Scripts-->
</head>
@extends('layouts.app')
@section('content')
<body>
    <div class="container mt-3">
        @if (session('Sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('Sukses') }}
            </div>
        @endif
        <center><h1 class="pt-3">Data Mahasiswa</h1></center>
        <div class="row">
            <div class="col-4 my-3">
               <a href="/mahasiswa/exportpdf" class="btn btn-sm btn-success">Export PDF</a>
            </div>
            <div class="col-5 my-4">
                @csrf
                <form class="d-flex" action="/mahasiswa/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari" placeholder="Cari Data Mahasiswa . ." value="{{ old('cari') }}">
                    <button class="btn btn-outline-succes" type="submit">Cari</button>
                </form>
            </div>
            <div class="col-3 my-4" align="right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>

            @if ($mahasiswa->count() > 0)
            @else
                <center>
                    <font color="red">
                        <h3>!! Tidak ditemukan data yang sesuai dengan kata kunci !!</h3>
                    </font>
                </center>
            @endif
            <div class="table-responsive">
                <table class="table table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>NAMA</th>
                            <th>NIM</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($mahasiswa as $mahasiswa)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>
                                    <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning bgn-sm">Edit</a>
                                    <a href="/mahasiswa/delete/{{$mahasiswa->id}}" class="btn btn-danger bgn-sm" onclick="return confirm('Yakin menghapus data?')">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                
                <br>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.mhs') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp"placeholder="Nama">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIM</label>
                                <input name="nim" type="text" class="form-control" id="exampleInputEmail1"aria-describedby="EmailHelp"placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control"id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </from>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"crossorigin="anonymous"></script>
</body>
@endsection

</html>