@extends('template')
@section('main')
<h2>Lihat Pemeriksaan Pasien</h2>
<ol class="breadcrumb bc-3">
	<li>
		<a href="{{ route('medis.pemeriksaan.index') }}"><i class="entypo-home"> Daftar Pemeriksaan</i></a>
	</li>
	<li class="active">
		<strong>Lihat Pemeriksaan Pasien</strong>
	</li>
</ol>
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{ route('medis.pemeriksaan.save') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" class="form-control datepicker" name="tgl" data-format="dd MM yyyy" placeholder="tanggal" required="" value="{{date("d M Y", strtotime($pemeriksaan->tgl))}}" readonly="">
										
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Faktur</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_faktur" name="no_faktur" placeholder="no faktur" value="{{$pemeriksaan->no_faktur}}" required readonly />
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. RM</label>
						<input type="hidden" name="reservasi_id" id="reservasi_id">
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="nomor rm" value="{{ $pemeriksaan->reservasi->no_rm }}" required readonly />
						</div>
						{{-- <a class="btn btn-white" href="javascript:;" onclick="jQuery('#modal-5').modal('show', {backdrop: 'static'});">	
	                       	<i class="entypo-search" ></i>        
						</a> --}} 
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pasien" name="pasien" placeholder="nama pasien" value="{{ $pemeriksaan->reservasi->pasien->nama_pasien }}" required readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Pasien</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jenis_pasien" name="jenis_pasien" placeholder="jenis pasien" value="{{ $pemeriksaan->reservasi->pasien->kategoripasien->nama_kategori}}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Jenis Kelamin</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="kelamin" name="kelamin" placeholder="jenis kelamin" value="{{ $pemeriksaan->reservasi->pasien->jenis_kelamin }}" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tanggal Reservasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="tgl_reservasi" name="tgl_reservasi" placeholder="tanggal reservasi" value="{{date("d M Y", strtotime($pemeriksaan->reservasi->created_at))}}" data-format="dd MM yyyy" required readonly/>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;No. Reservasi</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="no_reservasi" name="no_reservasi" placeholder="nomor reservasi" value="{{$pemeriksaan->reservasi->kd_res}}" required readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Poli</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="poli" name="poli" placeholder="poli" value="{{$pemeriksaan->reservasi->poli->nama_poli}}" required readonly/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Dokter/Bidan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="dokter" name="dokter" placeholder="nama dokter" value="{{$pemeriksaan->reservasi->dokter->nama}}" required readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Nama Pemeriksaan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pemeriksaan" name="nama_pemeriksaan" placeholder="nama pemeriksaan" value="{{$pemeriksaan->nama_pemeriksaan}}" required readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Tarif</label>
						<div class="col-sm-5">
							<input type="text" class="form-control numbers" id="tarif" name="tarif" value="{{$pemeriksaan->tarif}}" required readonly/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" style="text-align:left;">&emsp;Diskon</label>
						<div class="row">
							<div class="col-sm-1">
								<input type="text" class="form-control" id="disc" name="disc" value="{{$pemeriksaan->disc}}" required readonly />
							</div>
							<label for="field-1" class="col-sm-1 control-label" style="margin-left: -4.9%;">%</label>
							<div class="col-xs-3">
								<input type="text" style="width: 116.9%;" class="form-control numbers" id="disc_result" name="disc_result" value="{{$pemeriksaan->subtotal}}" required readonly />
							</div>
						</div>
					</div>
					

					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<a href="{{ route('medis.pemeriksaan.index') }}" class="btn btn-red btn-icon icon-left">
								Kembali
							<i class="entypo-cancel"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function () {

		// $("#dokter_id").change(function(){
		// 	var nama = $(this).find('option:selected').text();
		// 	var id = $(this).val();
		// 	$.get(home_url + '/perekaman_aktivitas/medis/pendaftaran/search_spesialisasi/' + id, function(data) {
		// 		$('#spesialisasi').val(data);
		// 	});
		// });

		$("#jml").keyup(function() {
			var tarif = $("#tarif").val();
			var jml = $("#jml").val();
			var hasil = tarif * jml;
			$("#total").val(hasil);
			$("#subtotal").val(hasil);
		});

		$("#tarif").keyup(function() {
			var tarif = 0;
			var jml = $("#jml").val();
			$("#tarif").each(function() {
				var num = parseFloat(this.value.replace(/,/g, ''));
				if (!isNaN(num)) {
					tarif += num;
				}

				$("#total, #subtotal").val(tarif * jml);
			});
		});

		$("#disc").keyup(function() {
			var tarif = parseFloat($("#tarif").val());
			var total = parseFloat($("#total").val());
			var disc = parseInt($("#disc").val());
			var subtotal = parseFloat($("#subtotal").val());
			var hasil_diskon = parseFloat((tarif*(disc/100)));
			$("#disc_result").val(hasil_diskon);
			$("#subtotal").val(subtotal - (tarif*(disc/100)));

			if ($(this).val().trim().length===0) {
			 	$("#subtotal").val(total);
			} 
		});

		$('#disc').keyup(function(e) {
                var num = $(this).val();
                if (e.which!=8) {
                    num = sortNumber(num);
                   if(isNaN(num)||num<0 ||num>100) {
                       alert("Tidak boleh melebihi 100% !");
                       $(this).val(sortNumber(num.substr(0,num.length-1)));
                   }
                else
                    $(this).val(sortNumber(num));
                }
                else {
                    if(num < 2)
                        $(this).val("");
                    else
                        $(this).val(sortNumber(num.substr(0,num.length-1)));
                }
            });
            function sortNumber(n){
                var newNumber="";
                for(var i = 0; i<n.length; i++)
                    if(n[i] != "%")
                        newNumber += n[i];
                return newNumber;
            }

		$('.datatable').DataTable({
	      "oLanguage": {
	       "sSearch": "Search:",
	       "oPaginate": {
	         "sPrevious": "Previous &emsp;",
	         "sNext": "Next"
					 }
				}
		});

	});
</script>
@endsection