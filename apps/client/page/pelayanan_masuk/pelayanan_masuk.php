<div class="row">
       <div id="DataForm" class=" col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Keterangan Status</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="alert alert-success" role="alert">Selesai</div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-warning" role="alert">Dalam Proses</div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-dark" role="alert">Belum di porses Staf</div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-danger" role="alert">Gagal</div>
                        </div>
                    </div>       
                </div>
                
                <div class="card-body">
                    <h4 class="card-title">Halaman ini menampung data pelayanan masuk. Halaman ini didapatkan dari verifikasi berkas dan status surat yang dibuat</h4>
                     <table id="datatable" class="tabelPelayananMasuk table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     </table>
                </div>
                
            </div>
        </div>
</div>

<script>
    $(document).ready( function () {
   
       
        $('.tabelPelayananMasuk').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
                   "type": "POST",
                  
            "url": "../../../api/entrance_services/request.php",
            },
            "aoColumns" : [
                    { "data": "code_entrance_services", "title": "No", "name": "code_entrance_services","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
                    }},
                    { "data": "code_entrance_services", "title": "Kode Pelayanan", "name": "code_entrance_services" },
                    { "data": "namePelayanan", "title": "Nama Pelayanan", "name": "namePelayanan" },
                    { "data": "created_atPelayanaMasuk", "title": "Tanggal Masuk", "name": "created_atPelayanaMasuk" },
                    { "data": "full_name", "title": "Nama Warga", "name": "full_name" },
                    { "data": "name_employee", "title": "Nama Staf", "name": "name_employee", "render" : function(data){
                        if(data){ return data;} return 'Belum diproses staf';
                    }},
                    { "data" : "status_name", "title" : "Status" , "name" : "status_name"},
                    {"data": "code_entrance_services", "title":"Aksi", "name":"code_entrance_services", "render": function(data,type,rows){
                                    return '<a href=?Halaman=pelayanan_masuk&Aksi=info&if=edit&id='+rows["code_entrance_services"]+' class="btn btn-sm btn-info text-white" title="Cek Informasi Data"><i class="mdi mdi-account-edit-outline"></i></a>';
                                    }
                                }
                       
                  ]
        });


      
    } );
</script>