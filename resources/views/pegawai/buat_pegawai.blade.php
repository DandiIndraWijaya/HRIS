@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    
    <div class="container-fluid mt--7">
        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <!-- Tambah Pegawai -->
		<div class="modal fade" id="buatpemilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/admin/input_pegawai" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}

                            <label>NIP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nip" autocomplete="off" required="required">
							</div>

							<label>NIK</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nik" autocomplete="off" required="required">
							</div>

							<label>KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="ktp" autocomplete="off" required="required">
							</div>

							<label>Gelar Depan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="gelarDepan" autocomplete="off" required="required">
							</div>

							<label>Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nama" autocomplete="off" required="required">
							</div>
							
							<label>Foto</label>
							<div class="form-group">
								<input type="file" name="foto" required="required">
							</div>

							<label>Gelar belakang</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="gelarBelakang" autocomplete="off" required="required">
							</div>

							<label>Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="tempatLahir" autocomplete="off" required="required">
							</div>

							<label>Jenis Kelamin</label>
                            <div class="form-group">
								<select class="form-control" name="jenisKelamin" id="jenisKelamin" required="required">
								
									<option value="Laki-laki">
										Laki-laki
									</option>
									<option value="Perempuan">
										Perempuan
									</option>
								  </select>
							</div>

							<label>Agama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="agama" autocomplete="off" required="required">
							</div>
							
							<label>Alamat KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="alamatKTP" autocomplete="off" required="required">
							</div>

							<label>Provinsi KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="provinsiKTP" autocomplete="off" required="required">
							</div>

							<label>Kota KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kotaKTP" autocomplete="off" required="required">
							</div>

							<label>Kecamatan KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kecamatanKTP" autocomplete="off" required="required">
							</div>

							<label>Kelurahan KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kelurahanKTP" autocomplete="off" required="required">
							</div>

							<label>Kode Pos KTP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kodeposKTP" autocomplete="off" required="required">
							</div>

							<label>Alamat Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="alamatTinggal" autocomplete="off" required="required">
							</div>

							<label>Provinsi Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="provinsiTinggal" autocomplete="off" required="required">
							</div>

							<label>Kota Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kotaTinggal" autocomplete="off" required="required">
							</div>

							<label>Kecamatan Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kecamatanTinggal" autocomplete="off" required="required">
							</div>

							<label>Kelurahan Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kelurahanTinggal" autocomplete="off" required="required">
							</div>

							<label>Kode Pos Tinggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kodeposTinggal" autocomplete="off" required="required">
							</div>

							<label>Phone</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="phone" autocomplete="off" required="required">
							</div>

							<label>Status Perkawinan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="statusPerkawinan" autocomplete="off" required="required">
							</div>

                            <label>Status Wajib Pajak</label>
                            <div class="form-group">
								<select class="form-control" name="statusWajibPajak" id="statusWajibPajak" required="required">
								
									<option value="TK/0">
										TK/0
									</option>
									<option value="TK/1">
										TK/1
									</option>
									<option value="TK/2">
										TK/2
									</option>
									<option value="TK/3">
										TK/3
									</option>
									<option value="K/0">
										K/0
									</option>
									<option value="K/1">
										K/1
									</option>
								  </select>
							</div>

							<label>KK</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="kk" autocomplete="off" required="required">
							</div>

							<label>Scan KK</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="scanKK" autocomplete="off" required="required">
							</div>

							<label>npwp</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="npwp" autocomplete="off" required="required">
							</div>

							<label>Scan NPWP</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="scanNPWP" autocomplete="off" required="required">
							</div>

							<label>BPJSTK</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="bpjstk" autocomplete="off" required="required">
							</div>

							<label>BPJSKES</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="bpjskes" autocomplete="off" required="required">
							</div>

							<label>Golongan Darah</label>
                            <div class="form-group">
								<select class="form-control" name="golonganDarah" id="golonganDarah" required="required">
								
									<option value="A">
										A
									</option>
									<option value="B">
										B
									</option>
									<option value="AB">
										AB
									</option>
									<option value="o">
										o
									</option>
								  </select>
							</div>

							<label>Nomor Rekam Medik</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nomorRekamMedik" autocomplete="off" required="required">
							</div>

							<label>Nomor SIM</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nomorSIM" autocomplete="off" required="required">
							</div>

							<label>Nomor Rekening</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="nomorRekening" autocomplete="off" required="required">
							</div>

							<label>Akta Kematian</label>
                            <div class="form-group">
                                <input type="text" class="form-control" style="color: gray;" name="aktaKematian" autocomplete="off" required="required">
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-warning">Simpan</button>
						</div>
					</div>
				</form>
			</div>
        </div>
        
        <button type="button" class="btn btn-warning mr-5" data-toggle="modal" data-target="#buatpemilihan">
			Tambah Data Pegawai
        </button>

        <div class="row mt-1">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pegawai</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row m-1" style="width: 100%">
						@foreach ($pegawai as $c)
						<div class="col-12 col-sm-12 mb-3 col-md-12 col-lg-3 col-xl-3">
							<div class="card" >
								<img class="card-img-top" src="{{ url('/foto_pegawai/'.$c->foto) }}" height="250" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">{{ $c->nama }}</h5>
									<p class="card-text">NIP: {{ $c->nip }}</p>
									<p class="card-text">NIK: {{ $c->nik }}</p>
									<form action="/admin/hapus_pegawai" method="post">
										{{ csrf_field() }}
										<input type="text" name="id" value="{{ $c->id }}" hidden>
										<input type="text" name="foto" value="{{ $c->foto }}" hidden>
										<input type="text" name="nama" value="{{ $c->nama }}" hidden>
										<input type="submit" class="btn btn-danger btn-sm" value="Hapus">
									</form>
									<button type="button" class="btn btn-sm btn-default mt-2" data-toggle="modal" data-target="#pegawai{{ $c->id }}">
										Detail
									</button>
									<button type="button" class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#editpegawai{{ $c->id }}">
										Edit
									</button>
									</div>
							  </div>
						</div>


						<div class="modal fade" id="pegawai{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"></h3>
                                        </div> --}}
                                        <div class="modal-body">
                                            <div class="card p-1">
                                                <img class="card-img-top" src="{{ url('/foto_pegawai/'.$c->foto) }}" height="250" alt="Card image cap">
                                                <center>
                                                <div class="card-body">
												<h4 class="card-title">{{ $c->nama }}</h4>
												<p class="card-text">Jenis Kelamin: <strong>{{ $c->jenisKelamin }}</strong></p>
												<p class="card-text">Agama: <strong>{{ $c->agama }}</strong></p>
												<p class="card-text">Golongan Darah: <strong>{{ $c->golonganDarah }}</strong></p>
												<p class="card-text">Alamat KTP: <strong>{{ $c->alamatKTP }}</strong></p>
                                                <p class="card-text">NIP: <strong>{{ $c->nip }}</strong> </p>
												<p class="card-text">NIK: <strong>{{ $c->nik }}</strong></p>
												<p class="card-text">Alamat KTP: <strong>{{ $c->alamatKTP }}</strong></p>
												<p class="card-text">Alamat Tinggal: <strong>{{ $c->alamatTinggal }}</strong></p>
												<p class="card-text">Nomor Rekening: <strong>{{ $c->nomorRekening }}</strong></p>
                                                </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                            </div>
						</div>
						
						<div class="modal fade" id="editpegawai{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form method="post" action="/admin/update_pegawai" enctype="multipart/form-data">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
										</div>
										<div class="modal-body">
				 
											{{ csrf_field() }}
											
											<input type="text" value="{{ $c->foto }}" hidden name="old_foto">
											<input type="text" value="{{ $c->id }}" hidden name="id">
											<label>NIP</label>
											<div class="form-group">
												<input value="{{ $c->nik }}" type="text" class="form-control" style="color: gray;" name="nip" autocomplete="off" required="required">
											</div>
				
											<label>NIK</label>
											<div class="form-group">
												<input value="{{ $c->nip }}" type="text" class="form-control" style="color: gray;" name="nik" autocomplete="off" required="required">
											</div>
				
											<label>KTP</label>
											<div class="form-group">
												<input value="{{ $c->ktp }}" type="text" class="form-control" style="color: gray;" name="ktp" autocomplete="off" required="required">
											</div>
				
											<label>Gelar Depan</label>
											<div class="form-group">
												<input value="{{ $c->gelarDepan }}" type="text" class="form-control" style="color: gray;" name="gelarDepan" autocomplete="off" required="required">
											</div>
				
											<label>Nama</label>
											<div class="form-group">
												<input value="{{ $c->nama }}" type="text" class="form-control" style="color: gray;" name="nama" autocomplete="off" required="required">
											</div>
											
											<label>Foto</label>
											<div class="form-group">
												<input type="file" name="foto">
											</div>
				
											<label>Gelar belakang</label>
											<div class="form-group">
												<input value="{{ $c->gelarBelakang }}" type="text" class="form-control" style="color: gray;" name="gelarBelakang" autocomplete="off" required="required">
											</div>
				
											<label>Tempat Lahir</label>
											<div class="form-group">
												<input value="{{ $c->tempatLahir }}" type="text" class="form-control" style="color: gray;" name="tempatLahir" autocomplete="off" required="required">
											</div>
				
											<label>Jenis Kelamin</label>
											<div class="form-group">
												<select  class="form-control" name="jenisKelamin" id="jenisKelamin" required="required">
												
													<option value="Laki-laki" <?php if($c->jenisKelamin=="Laki-laki") echo 'selected="selected"'; ?>>
														Laki-laki
													</option>
													<option value="Perempuan" <?php if($c->jenisKelamin=="Perempuan") echo 'selected="selected"'; ?>>
														Perempuan
													</option>
												  </select>
											</div>
				
											<label>Agama</label>
											<div class="form-group">
												<input value="{{ $c->agama }}" type="text" class="form-control" style="color: gray;" name="agama" autocomplete="off" required="required">
											</div>
											
											<label>Alamat KTP</label>
											<div class="form-group">
												<input value="{{ $c->alamatKTP }}" type="text" class="form-control" style="color: gray;" name="alamatKTP" autocomplete="off" required="required">
											</div>
				
											<label>Provinsi KTP</label>
											<div class="form-group">
												<input value="{{ $c->provinsiKTP }}" type="text" class="form-control" style="color: gray;" name="provinsiKTP" autocomplete="off" required="required">
											</div>
				
											<label>Kota KTP</label>
											<div class="form-group">
												<input value="{{ $c->kotaKTP }}" type="text" class="form-control" style="color: gray;" name="kotaKTP" autocomplete="off" required="required">
											</div>
				
											<label>Kecamatan KTP</label>
											<div class="form-group">
												<input value="{{ $c->kecamatanKTP }}" type="text" class="form-control" style="color: gray;" name="kecamatanKTP" autocomplete="off" required="required">
											</div>
				
											<label>Kelurahan KTP</label>
											<div class="form-group">
												<input value="{{ $c->kelurahanKTP }}" type="text" class="form-control" style="color: gray;" name="kelurahanKTP" autocomplete="off" required="required">
											</div>
				
											<label>Kode Pos KTP</label>
											<div class="form-group">
												<input value="{{ $c->kodeposKTP }}" type="text" class="form-control" style="color: gray;" name="kodeposKTP" autocomplete="off" required="required">
											</div>
				
											<label>Alamat Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->alamatTinggal }}" type="text" class="form-control" style="color: gray;" name="alamatTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Provinsi Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->provinsiTinggal }}" type="text" class="form-control" style="color: gray;" name="provinsiTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Kota Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->kotaTinggal }}" type="text" class="form-control" style="color: gray;" name="kotaTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Kecamatan Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->kecamatanTinggal }}" type="text" class="form-control" style="color: gray;" name="kecamatanTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Kelurahan Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->kelurahanTinggal }}" type="text" class="form-control" style="color: gray;" name="kelurahanTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Kode Pos Tinggal</label>
											<div class="form-group">
												<input value="{{ $c->kodeposTinggal }}" type="text" class="form-control" style="color: gray;" name="kodeposTinggal" autocomplete="off" required="required">
											</div>
				
											<label>Phone</label>
											<div class="form-group">
												<input value="{{ $c->phone }}" type="text" class="form-control" style="color: gray;" name="phone" autocomplete="off" required="required">
											</div>
				
											<label>Status Perkawinan</label>
											<div class="form-group">
												<input value="{{ $c->statusPerkawinan }}" type="text" class="form-control" style="color: gray;" name="statusPerkawinan" autocomplete="off" required="required">
											</div>
				
											<label>Status Wajib Pajak</label>
											<div class="form-group">
												<select value={{ $c->statusWajibPajak }} class="form-control" name="statusWajibPajak" id="statusWajibPajak" required="required">
												
													<option value="TK/0" <?php if($c->statusWajibPajak=="TK/0") echo 'selected="selected"'; ?>>
														TK/0
													</option>
													<option value="TK/1" <?php if($c->statusWajibPajak=="TK/1") echo 'selected="selected"'; ?>>
														TK/1
													</option>
													<option value="TK/2" <?php if($c->statusWajibPajak=="TK/2") echo 'selected="selected"'; ?>>
														TK/2
													</option>
													<option value="TK/3" <?php if($c->statusWajibPajak=="TK/3") echo 'selected="selected"'; ?>>
														TK/3
													</option>
													<option value="K/0" <?php if($c->statusWajibPajak=="K/0") echo 'selected="selected"'; ?>>
														K/0
													</option>
													<option value="K/1" <?php if($c->statusWajibPajak=="K/1") echo 'selected="selected"'; ?>>
														K/1
													</option>
												  </select>
											</div>
				
											<label>KK</label>
											<div class="form-group">
												<input value="{{ $c->kk }}" type="text" class="form-control" style="color: gray;" name="kk" autocomplete="off" required="required">
											</div>
				
											<label>Scan KK</label>
											<div class="form-group">
												<input value="{{ $c->scanKK }}" type="text" class="form-control" style="color: gray;" name="scanKK" autocomplete="off" required="required">
											</div>
				
											<label>npwp</label>
											<div class="form-group">
												<input value="{{ $c->npwp }}" type="text" class="form-control" style="color: gray;" name="npwp" autocomplete="off" required="required">
											</div>
				
											<label>Scan NPWP</label>
											<div class="form-group">
												<input value="{{ $c->scanNPWP }}" type="text" class="form-control" style="color: gray;" name="scanNPWP" autocomplete="off" required="required">
											</div>
				
											<label>BPJSTK</label>
											<div class="form-group">
												<input value="{{ $c->bpjstk }}" type="text" class="form-control" style="color: gray;" name="bpjstk" autocomplete="off" required="required">
											</div>
				
											<label>BPJSKES</label>
											<div class="form-group">
												<input value="{{ $c->bpjskes }}" type="text" class="form-control" style="color: gray;" name="bpjskes" autocomplete="off" required="required">
											</div>
				
											<label>Golongan Darah</label>
											<div class="form-group">
												<select  class="form-control" name="golonganDarah" id="golonganDarah" required="required">
												
													<option value="A" <?php if($c->golonganDarah=="A") echo 'selected="selected"'; ?>>
														A
													</option>
													<option value="B" <?php if($c->golonganDarah=="B") echo 'selected="selected"'; ?>>
														B
													</option>
													<option value="AB" <?php if($c->golonganDarah=="AB") echo 'selected="selected"'; ?>>
														AB
													</option>
													<option value="O" <?php if($c->golonganDarah=="O") echo 'selected="selected"'; ?>>
														O
													</option>
												  </select>
											</div>
				
											<label>Nomor Rekam Medik</label>
											<div class="form-group">
												<input value="{{ $c->nomorRekamMedik }}" type="text" class="form-control" style="color: gray;" name="nomorRekamMedik" autocomplete="off" required="required">
											</div>
				
											<label>Nomor SIM</label>
											<div class="form-group">
												<input value="{{ $c->nomorSIM }}" type="text" class="form-control" style="color: gray;" name="nomorSIM" autocomplete="off" required="required">
											</div>
				
											<label>Nomor Rekening</label>
											<div class="form-group">
												<input value="{{ $c->nomorRekening }}" type="text" class="form-control" style="color: gray;" name="nomorRekening" autocomplete="off" required="required">
											</div>
				
											<label>Akta Kematian</label>
											<div class="form-group">
												<input value="{{ $c->aktaKematian }}" type="text" class="form-control" style="color: gray;" name="aktaKematian" autocomplete="off" required="required">
											</div>
				
				
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<button type="submit" class="btn btn-warning">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						@endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush