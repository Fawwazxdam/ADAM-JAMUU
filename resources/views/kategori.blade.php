@extends('layouts.app')
@section('content')
    <h2 class="text-center">Kategori</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $kategori)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->desc_kategori }}</td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$kategori->id}}">Edit</button></td>
                    <td><a href="{{url('delkat/'.$kategori->id)}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>

                {{-- BEGIN MODAL EDIT --}}
                <div class="modal fade" id="edit{{$kategori->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Update Kategori</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama_kategori" value="{{$kategori->nama_kategori}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Kategori</label>
                                        <input type="text" class="form-control" name="desc_kategori" value="{{$kategori->desc_kategori}}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Sumbit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END MODAL EDIT --}}

            @endforeach
        </tbody>
    </table>
    
    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Kategori</label>
                        <input type="text" class="form-control" name="desc_kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection