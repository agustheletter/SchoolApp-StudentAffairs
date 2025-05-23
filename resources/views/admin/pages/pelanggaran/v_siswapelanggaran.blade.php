@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Siswa Pelanggaran')
@section('title', 'Siswa Pelanggaran')

@section('konten')

<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahPelanggaran">
    Tambah Data Pelanggaran Siswa
</button>

<div style="overflow-x: auto;">
    <table class="table table-bordered table-striped table-hover" id="table-pelanggaran">
        <thead>
            <tr>
                <th><center>No</center></th>
                <th><center>Siswa</center></th>
                <th><center>Jenis Pelanggaran</center></th>
                <th><center>Keterangan</center></th>
                <th><center>Foto Bukti</center></th>
                <th><center>Tanggal</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggaran as $index => $pel)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td align="center">{{ $pel->siswa->namasiswa ?? '-' }}</td>
                <td align="center">{{ $pel->jenispelanggaran->nama ?? '-' }}</td>
                <td>{{ $pel->keterangan }}</td>
                <td align="center">
                    @if($pel->photobukti)
                        <img width="60px" src="{{ url('/PhotoBukti/' . $pel->photobukti) }}">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td align="center">{{ \Carbon\Carbon::parse($pel->tanggal)->locale('id_ID')->isoFormat('D-MM-YYYY') }}</td>
                <td align="center">
                    <!-- Tombol Edit -->
                    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                        data-target="#modalEdit{{ $pel->idpelanggaran }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $pel->idpelanggaran }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form action="/pelanggaran/edit/{{ $pel->idpelanggaran }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pelanggaran</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <select name="idsiswa" class="form-control" required>
                                                <option value="">Pilih Siswa</option>
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->idsiswa }}" {{ $pel->idsiswa == $s->idsiswa ? 'selected' : '' }}>{{ $s->namasiswa }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Pelanggaran</label>
                                            <select name="idjenispelanggaran" class="form-control" required>
                                                <option value="">Pilih Jenis Pelanggaran</option>
                                                @foreach ($jenispelanggaran as $j)
                                                    <option value="{{ $j->idjenispelanggaran }}" {{ $pel->idjenispelanggaran == $j->idjenispelanggaran ? 'selected' : '' }}>{{ $j->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" class="form-control" required>{{ $pel->keterangan }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Foto Bukti (kosongkan jika tidak ingin ganti)</label><br>
                                            @if($pel->photobukti)
                                                <img src="{{ url('/PhotoBukti/' . $pel->photobukti) }}" width="80px"><br><br>
                                            @endif
                                            <input type="file" name="photobukti" class="form-control-file">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" value="{{ $pel->tanggal }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tombol Hapus -->
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus{{ $pel->idpelanggaran }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modalHapus{{ $pel->idpelanggaran }}" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <form action="/pelanggaran/hapus/{{ $pel->idpelanggaran }}" method="GET">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Pelanggaran</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data pelanggaran siswa <strong>{{ $pel->siswa->siswa ?? '' }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahPelanggaran" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="/pelanggaran/tambahaksi" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelanggaran Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select name="idsiswa" class="form-control select2" required>
                            <option value="">Pilih Siswa</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Pelanggaran</label>
                        <select name="idjenispelanggaran" class="form-control" required>
                            <option value="">Pilih Jenis Pelanggaran</option>
                            @foreach ($jenispelanggaran as $j)
                                <option value="{{ $j->idjenispelanggaran }}">{{ $j->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Foto Bukti</label>
                        <input type="file" name="photobukti" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pelanggaran</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#table-pelanggaran').DataTable();
});
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Siswa",
            allowClear: true,
            dropdownParent: $('#modalTambahPelanggaran') // penting supaya dropdown muncul di modal dengan benar
        });
    });
</script>

@endsection
