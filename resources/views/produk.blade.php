@extends('layouts.app')
@section('content')
    <h2 class="text-center">Produk</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Foto Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Kategori</th>
                <th scope="col">Petugas</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $produk)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $produk->nama_produk }}</td>
                    <td><img src="{{ asset('storage/'.$produk->foto) }}" alt="" width="100px"></td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->desc_produk }}</td>
                    <td>{{ $produk->kategori->nama_kategori }}</td>
                    <td>{{ $produk->users_id }}</td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$produk->id}}">Edit</button></td>
                    <td><a href="{{url('delpro/'.$produk->id)}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>

                {{-- BEGIN MODAL EDIT --}}
                <div class="modal fade" id="edit{{$produk->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Update Produk</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produk.update',$produk->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label class="form-label">Nama produk</label>
                                        <input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto</label><br>
                                        <img src="{{ asset('storage/'.$produk->foto) }}" alt="" width="300px">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="harga" value="{{$produk->harga}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi produk</label>
                                        <input type="text" class="form-control" name="desc_produk" value="{{$produk->desc_produk}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Petugas</label>
                                        <input type="text" class="form-control" name="users_id" value="{{ Auth::User()->id }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control" name="kategori_id">
                                            <option value="" >Pilih Kategori</option>
                                            @foreach ($data2 as $item)
                                            <option value="{{ $item->id }}" @selected($produk->kategori_id==$item->id) >{{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
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
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah produk</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label><br>
                        <input type="file" class="form-control" name="foto" required> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        Rp.<input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi produk</label>
                        <input type="text" class="form-control" name="desc_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Petugas</label>
                        <input type="text" class="form-control" name="users_id" value="{{ Auth::User()->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($data2 as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
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