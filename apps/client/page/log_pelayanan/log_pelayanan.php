             <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Halaman ini histori pelayanan.</h4>
                                    <table id="datatable" class="tabelPelayanan table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    </table>
                                </div>
                            </div>
                            <div class="row">
            <div class="col-3">
             <a href="?Halaman=pelayanan_masuk" title="Kembali" class="btn btn-danger waves-effect waves-light align-right"><i class="bx bx-left-arrow-alt font-size-20 align-middle mr-2"></i> Kembali</a>
                
            </div>
        </div>
                        </div>
                    </div>
<script>
    $(document).ready( function () {
       
        $('.tabelPelayanan').DataTable({
            "processing": true,
             "serverSide": true,
                  "autoWidth": false,
                  "scrollCollapse" : true,
                  "scrollX": true,
                  "scrollY":true,
                  "ajax": {
                  	"data" : {
                  				entrance_service_id : "<?=$_GET['id'];?>"
                  			},
                    "url": "../../../api/log_pelayanan/show.php",
                    "type": "POST"
                  },
                  "aoColumns" : [
                               { "data": "id_log_file", "title": "No", "name": "id_log_file","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
                                }},
                                { "data": "LogCreated", "title": "Tanggal", "name": "LogCreated" },
                                { "data": "status_file", "title": "Status", "name": "status_file" },
                                { "data": "name_employees", "title": "Nama User", "name": "name_employees" }
                              
                  ]
        });
      
    } );
</script>