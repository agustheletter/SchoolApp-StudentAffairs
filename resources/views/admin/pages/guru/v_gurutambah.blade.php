<!--awal konten dinamis-->
@extends('admin/v_admin')
@section('judulhalaman', 'Daftar guru')
@section('title', 'guru')

<!--awal isi konten dinamis-->
@section('konten')
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahguru">
        Tambah Data guru
    </button> --}}

    <a href="/guru" class="btn btn-secondary">Kembali</a>

    <p>

    <form name="formgurutambah" id="formgurutambah" action="/guru/tambahaksi" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="namaguru" class="col-sm-2 col-form-label">Nama Guru</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="namaguru" name="namaguru" placeholder="Masukan Nama Guru" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="nuptk" class="col-sm-2 col-form-label">NUPTK</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="nuptk" name="nuptk" placeholder="Masukan NUTPK" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukan NIP" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9 input-group">
                <div class="input-group-text">
                    <input type="radio" name="jk" value="Laki-laki">
                </div>
                Laki-laki

                <div class="input-group-text">
                    <input type="radio" name="jk" value="Perempuan">
                </div>
                Perempuan
            </div>
        </div>

        <div class="form-group row">
            <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukan Kota Lahir" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="idagama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-3">
                <select type="text" class="form-control" id="idagama" name="idagama" required>
                    <option></option>
                    @foreach($agama as $a)
                        <option value="{{ $a->idagama }}">{{ $a->agama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="tlprumah" class="col-sm-2 col-form-label">Telepon Rumah</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="tlprumah" name="tlprumah" placeholder="Masukan Telepon Rumah">
            </div>
        </div>

        <div class="form-group row">
            <label for="hpguru" class="col-sm-2 col-form-label">HP Guru</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="hpguru" name="hpguru" placeholder="Masukan Nomor HP Guru" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukan Nomor NPWP" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="photoguru" class="col-sm-2 col-form-label text-left">Photo</label>
            <div class="col-sm-9 text-left">
                <input type="file" id="photoguru" name="photoguru">
            </div>
        </div>


        <div class="form-group row">
            <label for="statusaktif" class="col-sm-2 col-form-label">statusaktif</label>
            <div class="col-sm-9 input-group">
                <div class="input-group-text">
                    <input type="radio" name="statusaktif" value="Aktif">
                </div>
                Aktif

                <div class="input-group-text">
                    <input type="radio" name="statusaktif" value="Tidak Aktif">
                </div>
                Tidak Aktif
            </div>
        </div>

        <div class="modal-footer">
            <a href="/guru" class="btn btn-secondary">Tutup</a>
            {{-- <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button> --}}
            <button type="submit" name="tambahguru" class="btn btn-success">Tambah</button>
        </div>
    </form>


    {{--
    <!--awal pagination-->
    Halaman : {{ $guru->currentPage() }} <br />
    Jumlah Data : {{ $guru->total() }} <br />
    Data Per Halaman : {{ $guru->perPage() }} <br />

    {{ $guru->links() }}
    <!--akhir pagination--> --}}



























    <!-- Awal Modal tambah data guru -->
    <div class="modal fade" id="modalTambahguru" tabindex="-1" role="dialog" aria-labelledby="modalTambahguruLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahguruLabel">Form Input Data guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form name="formgurutambah" id="formgurutambah" action="/guru/tambah " method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="idguru" class="col-sm-3 col-form-label">ID guru</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="idguru" name="idguru" placeholder="Masukan ID guru">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="namaguru" class="col-sm-3 col-form-label">Nama guru</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namaguru" name="namaguru" placeholder="Masukan Nama guru">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namajurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control" id="idjurusan" name="idjurusan">
                                    <option></option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->idjurusan }}">{{ $j->namajurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                            <div class="col-sm-9">
                                <select type="text" class="form-control" id="idtingkat" name="idtingkat">
                                    <option></option>
                                    @foreach($tingkat as $t)
                                        <option value="{{ $t->idtingkat }}">{{ $t->tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="tambahguru" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data guru -->

@endsection
<!--akhir isi konten dinamis-->
