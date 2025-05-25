<!--awal konten dinamis-->
@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Kehadiran')
@section('title', 'Data Kehadiran')

<!--awal isi konten dinamis-->
@section('konten')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKehadiran">
        Tambah Data Kehadiran
    </button>

    <p>

        <!-- Awal membuat table-->
    <div style="overflow-x: auto;">
        <table class="table table-bordered table-striped table-hover" id="table-kehadiran">
        <!-- Awal header table-->
        <thead>
            <tr>
                <th>
                    <center>No</center>
                </th>

                <th>
                    <center>Jenis Kehadiran</center>
                </th>

                <th>
                    <center>Keterangan</center>
                </th>

                <th>
                    <center>Siswa</center>
                </th>

                <th>
                    <center>Hari</center>
                </th>

                <th>
                    <center>Tanggal</center>
                </th>

                <th>
                    <center>Aksi</center>
                </th>
            </tr>
        </thead>

        <!-- Akhir header table-->

        <!-- Awal menampilkan data dalam table-->
        <tbody>
            @foreach ($kehadiran as $index=> $k)
                <tr>
                    <td align="center" scope="row">{{ $index + 1 }}</td>
                    <td align="center">{{ $k->jeniskehadiran }}</td>
                    <td>{{ $k->keterangan }}</td>
                    <td>{{ $k->siswa->namasiswa }}</td>
                    <td>{{ $k->hari }}</td>
                    <td align="right">{{ \Carbon\Carbon::parse($k->tanggal )->locale('id_ID')->isoFormat('D-MM-YYYY') }}</td>

                    <td align="center">
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                            data-target="#modalkehadiranEdit{{ $k->idkehadiran }}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Awal Modal EDIT data Kehadiran -->
                        <div class="modal fade" id="modalkehadiranEdit{{ $k->idkehadiran }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalkehadiranEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalkehadiranEditLabel">Form Edit Data Kehadiran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="formkehadiranedit" id="formkehadiranedit" action="/kehadiran/edit/{{ $k->idkehadiran }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group row">
                                                <label for="jeniskehadiran" class="col-sm-3 col-form-label text-left">Jenis Kehadiran</label>
                                                <div class="col-sm-9">
                                                    <select name="jeniskehadiran" id="jeniskehadiran" class="form-control" required>
                                                        <option value="">-- Pilih Jenis Kehadiran --</option>
                                                        <option value="Alpha" {{ $k->jeniskehadiran == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                                        <option value="Izin" {{ $k->jeniskehadiran == 'Izin' ? 'selected' : '' }}>Izin</option>
                                                        <option value="Sakit" {{ $k->jeniskehadiran == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                                        <option value="dispen" {{ $k->jeniskehadiran == 'dispen' ? 'selected' : '' }}>Dispen</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="keterangan" class="col-sm-3 col-form-label text-left">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <textarea name="keterangan" class="form-control" required>{{ $k->keterangan }}</textarea>
                                                </div>
                                            </div>

                                            @php
                                                // Get selected student IDs from attendance data (if editing)
                                                $selectedSiswaIds = [$k->idsiswa];
                                            @endphp

                                            <div class="form-group row">
                                                <label for="idsiswa" class="col-sm-3 col-form-label text-left">Nama Siswa</label>
                                                <div class="col-sm-9">
                                                    <select name="idsiswa" class="form-control select2" required style="width: 100%;">
                                                        <option value="">Pilih Siswa</option>
                                                        @foreach ($siswa as $s)
                                                            <option value="{{ $s->idsiswa }}" {{ in_array($s->idsiswa, $selectedSiswaIds) ? 'selected' : '' }}>
                                                                {{ $s->namasiswa }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hari" class="col-sm-3 col-form-label text-left">Hari</label>
                                                <div class="col-sm-9">
                                                    <select name="hari" id="hari" class="form-control" required>
                                                        <option value="">-- Pilih Hari --</option>
                                                        <option value="Senin" {{ $k->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                                        <option value="Selasa" {{ $k->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                                        <option value="Rabu" {{ $k->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                                        <option value="Kamis" {{ $k->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                                        <option value="Jumat" {{ $k->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                                        <option value="Sabtu" {{ $k->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                                        <option value="Minggu" {{ $k->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tanggal" class="col-sm-3 col-form-label text-left">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $k->tanggal }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="kehadiranedit" class="btn btn-success" onclick="return confirm('Data Kehadiran Sudah benar?')">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Kehadiran -->

                        |
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                            data-target="#modalkehadiranHapus{{ $k->idkehadiran }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <!-- Awal Modal hapus data kehadiran -->
                        <div class="modal fade" id="modalkehadiranHapus{{ $k->idkehadiran }}" tabindex="-1"
                            aria-labelledby="modalKehadiranLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalkehadiranHapusLabel">Hapus Data Kehadiran</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Yakin Mau menghapus data Kehadiran?</h5>
                                        <h3>
                                            <font color="red"><span>{{ $k->jeniskehadiran }}</span></font>
                                        </h3>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/kehadiran/hapus/{{ $k->idkehadiran }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="kehadiranhapus" class="btn btn-danger">Hapus</button>
                                        </form>
                                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Akhir Modal hapus data kehadiran -->
                    </td>
                </tr>
            @endforeach
        </tbody
        <!-- Akhir menampilkan data dalam table-->
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-kehadiran').DataTable();
        });
    </script>

    <a href="/kehadiran" class="btn btn-secondary">Kembali</a>

    <p>

    <div class="modal fade" id="modalTambahKehadiran" tabindex="-1" role="dialog" aria-labelledby="modalTambahKehadiranLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="/kehadiran/tambahaksi" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahKehadiranLabel">Tambah Data Kehadiran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Form inputs -->
            <div class="form-group">
                <label for="jeniskehadiran">Jenis Kehadiran</label>
                <select name="jeniskehadiran" class="form-control" required>
                    <option value="">Pilih Jenis Kehadiran</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="dispen">dispen</option>
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="2" required></textarea>
            </div>

            <div class="form-group">
                <label>Nama Siswa</label>
                <select name="idsiswa[]" class="form-control select2" multiple required>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="hari">Hari</label>
                <select name="hari" class="form-control" required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="form-group">
                <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
    <!-- Akhir Modal Tambah data KEHADIRAN -->
<!--akhir isi konten dinamis-->

<!--akhir konten dinamis-->

<!-- In your Kehadiran view, replace the entire script section at the bottom with: -->

@push('script')
<script>
    $(document).ready(function () {
        $('#table-dispen').DataTable();
    });
</script>
@endpush

<script>
    $(document).ready(function() {

        $('.select2-multiple').select2({
            placeholder: "Ketik untuk mencari siswa...",
            width: '100%',
            allowClear: true,
            dropdownParent: $('#modalEditKehadiran')
        });

        // Initialize Select2 for multiple selection (create modal)
        $('#modalTambahKehadiran select.select2').select2({
            placeholder: "Ketik untuk mencari siswa...",
            width: '100%',
            allowClear: true,
            dropdownParent: $('#modalTambahKehadiran')
        });
    });
</script>

@endsection
