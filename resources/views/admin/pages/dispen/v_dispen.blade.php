@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Siswa Pelanggaran')
@section('title', 'Siswa Pelanggaran')

@section('konten')

<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahDispen">
    Tambah Data Dispen
</button>

<div style="overflow-x: auto;">
    <table class="table table-bordered table-striped table-hover" id="table-dispen">
        <thead>
            <tr>
                <th><center>No</center></th>
                <th><center>Dispen</center></th>
                <th><center>Waktu Mulai</center></th>
                <th><center>Waktu Selesai</center></th>
                <th><center>Guru</center></th>
                <th><center>Siswa</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dispen as $index => $dis)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td align="center">{{ $dis->namadispen }}</td>
                <td align="center">
                    {{ \Carbon\Carbon::parse($dis->waktumulai)->locale('id_ID')->isoFormat('D-MM-YYYY HH:mm:ss') }}
                </td>
                <td align="center">
                    {{ \Carbon\Carbon::parse($dis->waktuselesai)->locale('id_ID')->isoFormat('D-MM-YYYY HH:mm:ss') }}
                </td>
                <td align="center">{{ $dis->guru->namaguru ?? '-' }}</td>
                <td align="center">
                    @foreach ($dis->dispendetails as $detail)
                        {{ $detail->siswa->namasiswa ?? '-' }}<br>
                    @endforeach
                </td>
                <td align="center">
                    <!-- Tombol Edit -->
                    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                        data-target="#modalEdit{{ $dis->iddispen }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $dis->iddispen }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <form action="/dispen/edit/{{ $dis->iddispen }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Dispen</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="iddispen" class="col-sm-3 col-form-label text-left">ID Dispen</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="iddispen" name="iddispen" value="{{ $dis->iddispen }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="namadispen" class="col-sm-3 col-form-label text-left">Nama Dispen</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="namadispen" name="namadispen" value="{{ $dis->namadispen }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label>Waktu Mulai</label>
                                            <input type="datetime-local" name="waktumulai" class="form-control" value="{{ $dis->waktumulai }}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label>Waktu Selesai</label>
                                            <input type="datetime-local" name="waktuselesai" class="form-control" value="{{ $dis->waktuselesai }}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="idguru" class="col-sm-3 col-form-label text-left">Nama Guru</label>
                                            <div class="col-sm-9">
                                                <select name="idguru" class="form-control" required>
                                                    <option value="">Pilih Guru</option>
                                                    @foreach ($guru as $g)
                                                        <option value="{{ $g->idguru }}" {{ $dis->idguru == $g->idguru ? 'selected' : '' }}>{{ $g->namaguru }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @php
                                            $selectedSiswaIds = $dis->siswa->pluck('idsiswa')->toArray();
                                        @endphp

                                        <div class="form-group row">
                                            <label for="idsiswa" class="col-sm-3 col-form-label text-left">Nama Siswa</label>
                                            <div class="col-sm-9">
                                                <select name="idsiswa[]" class="form-control select2 select-siswa-edit" multiple="multiple" required>
                                                    @foreach ($siswa as $s)
                                                        <option value="{{ $s->idsiswa }}" {{ in_array($s->idsiswa, $selectedSiswaIds) ? 'selected' : '' }}>
                                                            {{ $s->namasiswa }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus{{ $dis->iddispen }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modalHapus{{ $dis->iddispen }}" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <form action="/dispen/hapus/{{ $dis->iddispen }}" method="GET">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Dispen</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data dispen <strong>{{ $dis->namadispen ?? '' }}</strong>?</p>
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
<div class="modal fade" id="modalTambahDispen" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="/dispen/tambahaksi" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dispen</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Dispen</label>
                        <input type="text" name="iddispen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Dispen</label>
                        <input type="text" name="namadispen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Mulai</label>
                        <input type="datetime-local" name="waktumulai" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Selesai</label>
                        <input type="datetime-local" name="waktuselesai" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="idguru" class="form-control" required>
                            <option value="">Pilih Nama Guru</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->idguru }}">{{ $g->namaguru }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select name="idsiswa[]" class="form-control select2" multiple required>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                            @endforeach
                        </select>
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
    $('#table-dispen').DataTable();
});
</script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for edit modals
        $('.select-siswa-edit').each(function() {
            $(this).select2({
                placeholder: "Ketik untuk mencari siswa...",
                width: '100%',
                allowClear: true,
                dropdownParent: $(this).closest('.modal')
            });
        });

        // Initialize Select2 for add modal
        $('#modalTambahDispen select.select2').select2({
            placeholder: "Ketik untuk mencari siswa...",
            width: '100%',
            allowClear: true,
            dropdownParent: $('#modalTambahDispen')
        });
    });
</script>

@endsection
