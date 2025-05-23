@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Siswa Pelanggaran')
@section('title', 'Siswa Pelanggaran')

@section('konten')
<div class="container">
    <h4 class="mb-4">Data Jenis Pelanggaran</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
        <i class="fas fa-plus"></i> Tambah
    </button>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tingkat</th>
                    <th>Deskripsi</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenispelanggaran as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tingkat }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->idjenispelanggaran }}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $item->idjenispelanggaran }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $item->idjenispelanggaran }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form name="formjenisedit" id="formjenisedit" action="/jenispelanggaran/edit/{{ $item->idjenispelanggaran }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- karena edit pakai method PUT -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Jenis Pelanggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="{{ $item->nama }}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tingkat">
                                        <select name="tingkat" class="form-control" required>
                                            <option value="">Pilih Tingkat Pelanggaran</option>
                                            <option value="Ringan">Ringan</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Berat">Berat</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" required>{{ $item->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="modalHapus{{ $item->idjenispelanggaran }}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="modalHapusLabel">Hapus Data Jenis Pelanggaran</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Yakin mau menghapus data pelanggaran?</h5>
                                <h3><font color="red"><span>{{ $item->nama }}</span></font></h3>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('/jenispelanggaran/hapus/' . $item->idjenispelanggaran) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <form action="/jenispelanggaran/tambahaksi" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jenis Pelanggaran</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tingkat</label>
                            <label for="tingkat">
                            <select name="tingkat" class="form-control" required>
                                <option value="">Pilih Tingkat Pelanggaran</option>
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

