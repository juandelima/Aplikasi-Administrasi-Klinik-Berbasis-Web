@extends('template')
@section('main')
<h2>Data Kategori Pasien</h2>
<h5>Menu ini digunakan untuk menambahkan kategori pasien</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});">
	<i class="entypo-user-add"></i>Tambah Kategori Pasien
</a>
<br/>
<br/>
@if(session('message'))
    <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function()
						{
							var opts = {
								"closeButton": true,
								"debug": false,
								"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
								"toastClass": "black",
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
					
							toastr.success("{{session('message')}}", opts);
						}, 5);
					});
    			</script>
@endif
@if(session('message2'))
    <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function()
						{
							var opts = {
								"closeButton": true,
								"debug": false,
								"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
								"toastClass": "black",
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};
					
							toastr.error("{{session('message2')}}", opts);
						}, 5);
					});
    			</script>
@endif
<div class="row">
	<div class="col-md-12">
		<br/>
		<script type="text/javascript">
				jQuery( document ).ready( function( $ ) {
					var $table4 = jQuery( "#table-1" );
					$table4.DataTable( {
						dom: 'Bfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						]
					} );
						} );
		</script>
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th >Nama Kategori</th>
					<th width="25%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($kategories as $kategori)
				<tr>
					<td><center>{{$no++}}</center></td>
					<td>{{$kategori->nama_kategori}}</td>
					<td>
						<div align="center">
							<form action="#" method="post">
								@csrf
								<a href="javascript:;" onclick="jQuery('#modal-7{{$kategori->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-green btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Ubah
								</a>

								<a href="javascript:;" onclick="jQuery('#modal-8{{$kategori->id}}').modal('show', {backdrop: 'static'});" class="btn btn-sm btn-danger btn-icon icon-left">
										<i class="entypo-trash"></i>
										Hapus
								</a>
								{{-- <button href="javascript:;" onclick="jQuery('#modal-8{{$kategori->id}}').modal('show', {backdrop: 'static'});" type="submit" class="btn btn-sm btn-danger btn-icon icon-left">
					                <i class="entypo-trash"> </i>
					                    Hapus
                  				</button> --}}
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- Modal 6 (Long Modal)-->
		<div class="modal fade" id="modal-6">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Kategori Pasien</h4>
					</div>
					
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form action="{{route('masterdata.pasien.kategori.insert')}}" method="post">
									@csrf
									<div class="form-group">
										<label for="field-1" class="control-label">Nama Kategori</label>
										<input type="text" class="form-control" name="nama_kategori" placeholder="nama kategori" required>
									</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						<i class="entypo-check"></i>
						Simpan</button>
					</div>
							</form>
				</div>
			</div>
		</div>
		@foreach($kategories as $kategori)
			<div class="modal fade" id="modal-7{{$kategori->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Ubah Kategori Pasien</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.pasien.kategori.update', $kategori->id)}}" method="post">
										@csrf
										<div class="form-group">
											<label for="field-1" class="control-label">Nama Kategori</label>
											<input type="text" class="form-control" name="nama_kategori" placeholder="nama kategori" required value="{{$kategori->nama_kategori}}">
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
							<i class="entypo-check"></i>
							Ubah</button>
						</div>
								</form>
					</div>
				</div>
			</div>
		@endforeach

		@foreach($kategories as $kategori)
		<div class="modal fade" id="modal-8{{$kategori->id}}">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Kategori Pasien</h4>
						</div>
						
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('masterdata.pasien.kategori.delete', ['id' => $kategori->id]) }}" method="post">
										@csrf
										<div class="row">
											<div class="col-md-12">
												<center><h4>Anda Yakin Akan Menghapus Kategori {{$kategori->nama_kategori}}!</h4></center>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" name="simpan" id="simpan" class="btn btn-danger btn-icon icon-left col-left">
							<i class="entypo-trash"></i>
							Ya</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('input').on('keydown', function(event) {
		        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
		           var $t = $(this);
		           event.preventDefault();
		           var char = String.fromCharCode(event.keyCode);
		           $t.val(char + $t.val().slice(this.selectionEnd));
		           this.setSelectionRange(1,1);
		        }
	    });
	});
</script>
@endsection