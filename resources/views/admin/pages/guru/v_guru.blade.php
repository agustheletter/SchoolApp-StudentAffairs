<!--awal konten dinamis-->
@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Guru')
@section('title', 'Guru')

<!--awal isi konten dinamis-->
@section('konten')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahGuru">
        Tambah Data Guru
    </button>

    {{-- <a href="/guru/tambahaksi" class="btn btn-primary">Tambah Data Guru</a> --}}

    <p>

        <!-- Awal membuat table-->
    <div style="overflow-x: auto;">
        <table class="table table-bordered table-striped table-hover" id="table-guru">
        <!-- Awal header table-->
        <thead>
            <tr>
                <th>
                    <center>No</center>
                </th>

                <th>
                    <center>NIP</center>
                </th>

                {{-- <th>
                    <center>NUPTK</center>
                </th> --}}

                <th>
                    <center>Nama Guru</center>
                </th>

                <th>
                    <center>Tempat Lahir</center>
                </th>

                <th>
                    <center>Tanggal Lahir</center>
                </th>

                <th>
                    <center>Jenis Kelamin</center>
                </th>

                <th>
                    <center>Alamat</center>
                </th>

                <th>
                    <center>Agama</center>
                </th>

                <th>
                    <center>Tlp Rumah</center>
                </th>

                <th>
                    <center>HP</center>
                </th>

                <th>
                    <center>Photo</center>
                </th>

                <th>
                    <center>Status Aktif</center>
                </th>

                <th>
                    <center>Aksi</center>
                </th>
            </tr>
        </thead>

        <!-- Akhir header table-->

        <!-- Awal menampilkan data dalam table-->
        <tbody>
            @foreach ($guru as $index=> $g)
                <tr>
                    <td align="center" scope="row">{{ $index + 1 }}</td>
                    <td align="center">{{ $g->nip }}</td>
                    {{-- <td align="center">{{ $g->nuptk }}</td> --}}
                    <td data-toggle="modal" data-target="#modalguruEdit{{ $g->idguru }}">{{ $g->gelardepan}}{{$g->namaguru}}, {{ $g->gelarbelakang}}</data-toggle=></td>

                    <td>{{ $g->tempatlahir }}</td>
                    <td align="right">{{ \Carbon\Carbon::parse($g->tgllahir )->locale('id_ID')->isoFormat('D-MM-YYYY') }}</td>
                    {{-- <td>{{ \Carbon\Carbon::parse($g->tgllahir )->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td> --}}
                    {{-- <td align="right">{{ $g->tgllahir }}</td> --}}
                    <td>{{ $g->jk }}</td>

                    <td>{{ $g->alamat }}</td>
                    <td>{{ $g->agama->agama }}</td>
                    <td>{{ $g->tlprumah }}</td>
                    <td>{{ $g->hpguru }}</td>
                    <td><img width="60px" src="{{ url('/PhotoGuru/' . $g->photoguru) }}"></td> -
                    <td align="center">{{ $g->statusaktif }}</td>

                    <td align="center">
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                            data-target="#modalguruEdit{{ $g->idguru }}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Awal Modal EDIT data GURU -->
                        <div class="modal fade" id="modalguruEdit{{ $g->idguru }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalguruEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalguruEditLabel">Form Edit Data Guru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="formguruedit" id="formguruedit" action="/guru/edit/{{ $g->idguru }}" method="post" enctype="multipart/form-data">
                                            <!--z@csrf-->
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group row">
                                                <label for="idguru" class="col-sm-3 col-form-label text-left">ID Guru</label>
                                                <div class="col-sm-9 text-left">
                                                    <input type="text" class="form-control" id="idguru" name="idguru" value="{{ $g->idguru }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="namaguru" class="col-sm-3 col-form-label text-left">Nama Guru</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namaguru" name="namaguru" value="{{ $g->namaguru }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nuptk" class="col-sm-3 col-form-label text-left">NUPTK</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="nuptk" name="nuptk" value="{{ $g->nuptk }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nip" class="col-sm-3 col-form-label text-left">NIP</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="nip" name="nip" value="{{ $g->nip }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="jk" class="col-sm-3 col-form-label text-left">Jenis Kelamin</label>
                                                <div class="col-sm-9 input-group">
                                                    <div class="input-group-text">
                                                        <input type="radio" id="jk" name="jk" value="L" {{ $g->jk == 'L' ? 'checked' : '' }}>
                                                    </div>
                                                    Laki-laki

                                                    <div class="input-group-text">
                                                        <input type="radio" id="jk" name="jk" value="P" {{ $g->jk == 'P' ? 'checked' : '' }}>
                                                    </div>
                                                    Perempuan
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-3 col-form-label text-left">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $g->alamat }}">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="tempatlahir" class="col-sm-3 col-form-label text-left">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="{{ $g->tempatlahir }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tgllahir" class="col-sm-3 col-form-label text-left">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="tgllahir" name="tgllahir" value="{{ $g->tgllahir }}">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="idagama" class="col-sm-3 col-form-label text-left">Agama</label>
                                                <div class="col-sm-9">
                                                    <select type="text" class="form-control" id="idagama" name="idagama">
                                                        @foreach ($agama as $a)
                                                            @if ($a->idagama == $g->idagama)
                                                                <option value="{{ $a->idagama }}" selected>{{ $a->agama }}</option>
                                                            @else
                                                                <option value="{{ $a->idagama }}">{{ $a->agama }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="tlprumah" class="col-sm-3 col-form-label text-left">Telepon Rumah</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="tlprumah" name="tlprumah" value="{{ $g->tlprumah }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hpguru" class="col-sm-3 col-form-label text-left">HP</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="hpguru" name="hpguru" value="{{ $g->hpguru }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="npwp" class="col-sm-3 col-form-label text-left">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $g->npwp }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="photo" class="col-sm-3 col-form-label text-left">Photo</label>
                                                <div class="col-sm-9 text-left">
                                                    <img src="{{ url('/PhotoGuru/'.$g->photoguru) }}" width="120px" height="160px">
                                                    <p>
                                                    <input type="file" id="photoguru" name="photoguru">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="statusaktif" class="col-sm-3 col-form-label text-left">Status Aktif</label>
                                                <div class="col-sm-9 input-group">
                                                    @if ($g->statusaktif == "Aktif")
                                                        <div class="input-group-text">
                                                            <input type="radio" id="statusaktif" name="statusaktif" value="Aktif" checked>
                                                        </div>
                                                        Aktif

                                                        <div class="input-group-text">
                                                            <input type="radio" id="statusaktif" name="statusaktif" value="Tidak Aktif">
                                                        </div>
                                                        Tidak Aktif
                                                    @else
                                                        <div class="input-group-text">
                                                            <input type="radio" id="statusaktif" name="statusaktif" value="Aktif" >
                                                        </div>
                                                        Aktif

                                                        <div class="input-group-text">
                                                            <input type="radio" id="statusaktif" name="statusaktif" value="Tidak Aktif" checked>
                                                        </div>
                                                        Tidak Aktif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="guruedit" class="btn btn-success" onclick="return confirm('Data Guru Sudah benar?')">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data guru -->


                        |
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                            data-target="#modalguruHapus{{ $g->idguru}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <!-- Awal Modal hapus data guru -->
                        <div class="modal fade" id="modalguruHapus{{ $g->idguru }}" tabindex="-1"
                            aria-labelledby="modalguruHapusLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalguruHapusLabel">Hapus Data Guru</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Yakin Mau menghapus data Guru ?</h5>
                                        <h3>
                                            <font color="red"><span>{{ $g->namaguru }} </span></font>
                                        </h3>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/guru/hapus/{{ $g->idguru }}" method="get">
                                            <button type="submit" name="guruhapus" class="btn btn-danger">Hapus</a></button>
                                        </form>
                                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal"
                                            class="float-right">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal hapus data guru -->
                    </td>
                </tr>
            @endforeach
        <tbody
        <!-- Akhir menampilkan data dalam table-->
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-guru').DataTable();
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#table-guru').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ asset('ssp') }}/loaddata.php",
            } );
        } );
    </script> --}}

    <!-- Akhir membuat table-->

    {{-- <!--awal pagination-->
    Halaman : {{ $guru->currentPage() }} <br />
    Jumlah Data : {{ $guru->total() }} <br />
    Data Per Halaman : {{ $guru->perPage() }} <br />

    {{ $guru->links() }}
    <!--akhir pagination--> --}}

    <!-- Awal Modal Tambah data GURU -->

    <a href="/guru" class="btn btn-secondary">Kembali</a>

    <p>

    <div class="modal fade" id="modalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="modalTambahGuruLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="/guru/tambahaksi" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahGuruLabel">Tambah Data Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Form inputs -->
          <div class="form-group">
              <label for="idguru">ID Guru</label>
              <input type="text" name="idguru" class="form-control" required>
          </div>

          <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" name="nip" class="form-control" required>
          </div>

          <div class="form-group">
              <label for="nuptk">NUPTK</label>
              <input type="text" name="nuptk" class="form-control" required>
          </div>

          <div class="form-group">
              <label for="namaguru">Nama Guru</label>
              <input type="text" name="namaguru" class="form-control" required>
          </div>

          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="tempatlahir">Tempat Lahir</label>
                  <input type="text" name="tempatlahir" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="tgllahir">Tanggal Lahir</label>
                  <input type="date" name="tgllahir" class="form-control" required>
              </div>
          </div>

          <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select name="jk" class="form-control" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
              </select>
          </div>

          <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control" rows="2" required></textarea>
          </div>

          <div class="form-group">
              <label for="idagama">Agama</label>
              <select name="idagama" class="form-control" required>
                  <option value="">Pilih Agama</option>
                  @foreach($agama as $a)
                      <option value="{{ $a->idagama }}">{{ $a->agama }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="tlprumah">Telepon Rumah</label>
                  <input type="text" name="tlprumah" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="hpguru">HP Guru</label>
                  <input type="text" name="hpguru" class="form-control" required>
              </div>
          </div>

          <div class="form-group">
              <label for="photoguru">Foto Guru</label>
              <input type="file" name="photoguru" class="form-control-file" required>
          </div>

          <div class="form-group">
              <label for="statusaktif">Status Aktif</label>
              <select name="statusaktif" class="form-control" required>
                  <option value="">Pilih Status</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Nonaktif">Nonaktif</option>
              </select>
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
    <!-- Akhir Modal Tambah data GURU -->

@endsection
<!--akhir isi konten dinamis-->

<!--akhir konten dinamis-->
