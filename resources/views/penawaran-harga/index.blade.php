@extends('layouts.minia.header')

@section('content')
{{-- Modal Import --}}
<div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Penawaran Harga Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="ImportForm" enctype="multipart/form-data" files="true">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_import" class="col-form-label">File Import: <b class="error">*Pastikan Format CSV/XLSX/XLS</b></label>
                        <input type="file" class="form-control" id="file_import" name="file_import">
                    </div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" aria-valuenow=""
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          0%
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END Modal Import --}}

{{-- Modal --}}
<div class="modal fade" id="PenawaranModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-heading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="PenawaranForm">
                <input type="hidden" class="form-control" id="penawaran_id" name="penawaran_id">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_obat" class="col-form-label">Nama Obat:</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="e.g: Paracetamol">
                        </div>
                        <div class="col-md-6">
                            <label for="pabrikan" class="col-form-label">Nama Pabrikan:</label>
                            <input type="text" class="form-control" id="pabrikan" name="pabrikan" placeholder="e.g: PT. Citra">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="unit" class="col-form-label">Unit:</label>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="e.g: Box 0tab">
                        </div>
                        <div class="col-md-6">
                            <label for="satuan" class="col-form-label">Satuan:</label>
                            <input type="text" class="form-control math" id="satuan" name="satuan" placeholder="e.g: 0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="harga_beli" class="col-form-label">Harga Beli:</label>
                            <input type="text" class="form-control math" id="harga_beli" name="harga_beli" placeholder="e.g: 100000">
                        </div>
                        <div class="col-md-6">
                            <label for="harga_beli_satuan" class="col-form-label">Harga Beli Satuan:</label>
                            <input type="text" class="form-control" id="harga_beli_satuan" name="harga_beli_satuan" placeholder="*otomatis terisi" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="keuntungan" class="col-form-label">Keuntungan 20%:</label>
                            <input type="text" class="form-control" id="keuntungan" name="keuntungan" placeholder="*otomatis terisi" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="harga_jual_satuan" class="col-form-label">Harga Jual Satuan:</label>
                            <input type="text" class="form-control" id="harga_jual_satuan" name="harga_jual_satuan" placeholder="*otomatis terisi" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END Modal --}}

{{-- Modal Show --}}
<div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Penawaran Harga Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_obat_show" class="col-form-label">Nama Obat:</label>
                        <input type="text" class="form-control no-outline" id="nama_obat_show" name="nama_obat_show" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pabrikan_show" class="col-form-label">Nama Pabrikan:</label>
                        <input type="text" class="form-control no-outline" id="pabrikan_show" name="pabrikan_show" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unit_show" class="col-form-label">Unit:</label>
                        <input type="text" class="form-control no-outline" id="unit_show" name="unit_show" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="satuan_show" class="col-form-label">Satuan:</label>
                        <input type="text" class="form-control no-outline" id="satuan_show" name="satuan_show">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="harga_beli_show" class="col-form-label">Harga Beli:</label>
                        <input type="text" class="form-control no-outline" id="harga_beli_show" name="harga_beli_show">
                    </div>
                    <div class="col-md-6">
                        <label for="harga_beli_satuan_show" class="col-form-label">Harga Beli Satuan:</label>
                        <input type="text" class="form-control no-outline" id="harga_beli_satuan_show" name="harga_beli_satuan_show"readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="keuntungan_show" class="col-form-label">Keuntungan 20%:</label>
                        <input type="text" class="form-control no-outline" id="keuntungan_show" name="keuntungan_show" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="harga_jual_satuan_show" class="col-form-label">Harga Jual Satuan:</label>
                        <input type="text" class="form-control no-outline" id="harga_jual_satuan_show" name="harga_jual_satuan_show"readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
{{-- END Modal Show --}}

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Penawaran Harga Obat</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Penawaran Harga Obat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex justify-content-end">
        <a href="javascript:void(0)" class="btn btn-primary btn-md waves-effect waves-light mb-1" id="btnAdd">
            <i class="fas fa-plus-circle"></i>
        </a>&nbsp;
        <a href="javascript:void(0)" class="btn btn-primary btn-md waves-effect waves-light mb-1" id="btnImport">
            <i class="fas fa-file-import"></i>
        </a>&nbsp;
        <a href="javascript:void(0)" class="btn btn-primary btn-md waves-effect waves-light mb-1" id="btnExport">
            <i class="fas fa-file-export"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dt-responsive nowrap w-100" id="PenawaranTables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Jumlah Satuan Obat</th>
                                <th>Harga Beli Satuan</th>
                                <th>Keuntungan 20%</th>
                                <th>Harga Jual Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
@endsection

@section('js')
<script>
    $(document).ready(function (){
        /* Ajax Token */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* Get data table */
        var table = $('#PenawaranTables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('penawaran.index')}}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'nama_obat', name: 'nama_obat'},
                    { data: 'satuan', name: 'satuan'},
                    { data: 'harga_beli_satuan', name: 'harga_beli_satuan'},
                    { data: 'keuntungan', name: 'keuntungan'},
                    { data: 'harga_jual_satuan', name: 'harga_jual_satuan'},
                    { data: 'action', name: 'action'}
                ],
                columnDefs: [
                    { searchable: false, orderable: false, targets: [0, 6] },
                    { width: '2%', targets: [0] },
                    { width: '10%', targets: [6] }
                ],
                order: [
                    [ 1, 'asc' ]
                ]
        });

        /* Button Import */
        $("#btnImport").click(function(){
            $('#ImportForm').trigger('reset');
            $('#ImportModal').modal('show');
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
        });

        /* Button Export */
        $("#btnExport").click(function(){
            window.location = "{{route('penawaran.export')}}";
            Swal.fire({
                title: "Export Data Penawaran Berhasil",
                icon: "success",
            });
        })

        /* Button Add */
        $("#btnAdd").click(function(){
            $('#PenawaranForm').trigger('reset');
            $('#PenawaranModal').modal('show');
            $('#penawaran_id').val("");
            $('#modal-heading').html('Tambah Data Penawaran Harga Obat');
        });

        /* Button Edit */
        $('body').on('click', '#edit-penawaran', function () {
            var this_id = $(this).data('id');
            $.get('penawaran/'+this_id, function (data) {
                $('#PenawaranModal').modal('show');
                $('#modal-heading').html('Ubah Data Penawaran Harga Obat');
                $('#penawaran_id').val(data.id);
                $('#nama_obat').val(data.nama_obat);
                $('#pabrikan').val(data.pabrikan);
                $('#unit').val(data.unit);
                $('#satuan').val(data.satuan);
                $('#harga_beli').val(data.harga_beli);
                $('#harga_beli_satuan').val(data.harga_beli_satuan);
                $('#keuntungan').val(data.keuntungan);
                $('#harga_jual_satuan').val(data.harga_jual_satuan);
            });
        });

        /* Button Show */
        $('body').on('click', '#show-penawaran', function () {
            var this_id = $(this).data('id');
            $.get('penawaran/'+this_id, function (data) {
                $('#ShowModal').modal('show');
                $('#nama_obat_show').val(data.nama_obat);
                $('#pabrikan_show').val(data.pabrikan);
                $('#unit_show').val(data.unit);
                $('#satuan_show').val(data.satuan);
                $('#harga_beli_show').val(data.harga_beli);
                $('#harga_beli_satuan_show').val(data.harga_beli_satuan);
                $('#keuntungan_show').val(data.keuntungan);
                $('#harga_jual_satuan_show').val(data.harga_jual_satuan);
            });
        });

        /* Button Delete */
        $('body').on('click', '#delete-penawaran', function () {
            var this_id = $(this).data("id");
            Swal.fire({
                    title: 'Apakah anda ingin menghapus data ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "penawaran/delete/"+this_id,
                        type: 'POST',
                        data: {
                            "id": this_id,
                        },
                        success: function (response) {
                            if (response)
                            {
                                table.ajax.reload();
                                Swal.fire({
                                    title:"Berhasil Hapus Data",
                                    icon:"success",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });

        /* Ajax Import */
        $("#ImportForm").submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            $('.progress-bar').text(percentComplete + '%');
                            $('.progress-bar').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                url: "{{route('penawaran.import')}}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response)
                {
                    $('.progress-bar').text('Uploaded');
                    $('.progress-bar').css('width', '100%');
                    table.ajax.reload();
                    Swal.fire({
                        title: "Import Data Penawaran Berhasil",
                        icon: "success",
                    }).then(function(){
                        $("#ImportModal").modal('hide');
                    });
                },
                error:function(response)
                {
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops, Muncul Kesalahan !!',
                        text: 'Terdapat kesalahan pengisian data, pastikan semua data terisi !!'
                    });
                }
            });
        });

        /* Ajax Store */
        $("#PenawaranForm").submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            if(document.getElementById("penawaran_id").value == ""){
                var message = "Berhasil Tambah Data";
            } else {
                var message = "Berhasil Ubah Data"
            }

            $.ajax({
                url: "{{route('penawaran.store')}}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response)
                {
                    table.ajax.reload();
                    $("#PenawaranModal").modal('hide');
                    Swal.fire({
                        title: message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error:function(response)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops, Muncul Kesalahan !!',
                        text: 'Terdapat kesalahan pengisian data, pastikan semua data terisi !!'
                    });
                }
            });
        });

        /* Math Input */
        $('.math').bind('keypress keydown keyup change',function(){
            var a = parseFloat($(':input[name="satuan"]').val(),10);
            var b = parseFloat($(':input[name="harga_beli"]').val(),10);

            if (!isNaN(a) && !isNaN(b)){
                var hb = (b / a);
                var kt = (hb * (20 / 100));
                var hj = (hb + kt);
            }
            $(':input[name="harga_beli_satuan"]').val(hb);
            $(':input[name="keuntungan"]').val(kt);
            $(':input[name="harga_jual_satuan"]').val(hj);
        });
    });
</script>
@endsection
