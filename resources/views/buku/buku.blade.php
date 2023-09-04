@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buku</h1>
            <div class="section-header-button">
                <a href="/tambahbuku" class="btn btn-success">Add New</a>
            </div>

            <div class="section-body">
            </div>
    </section>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>List Buku</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Rak Buku</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Image</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            
                            $no = 1;
                        @endphp
                        @foreach ($buku as $bku)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $bku->judul }}</td>
                                <td>{{ $bku->rak_buku['rak_buku'] }}</td>
                                <td>{{ $bku->kategori['nm_kategori'] }}</td>
                                <td>{{ $bku->penerbit['nm_penerbit'] }}</td>
                                <td>{{ $bku->penulis }}</td>
                                <td>{{ $bku->thn_terbit }}</td>
                                <td>{{ $bku->image }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <div>
                                            <a href="/editBuku/{{ $bku->id }}"
                                                class="btn btn-md bg-primary text-light btn-rounded mr-2"><i
                                                    class="fa-solid fas fa-pen"></i></a>
                                        </div>
                                        <div>
                                            <form action="/deleteBuku/{{ $bku->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-md bg-danger text-light btn-rounded"><i
                                                        class="fa-solid fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
