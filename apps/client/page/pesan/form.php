<div class="row">
   <div class="col-10">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Halaman ini histori pesan terhadap layanan yang diajukan.</h4>
                 <table id="datatable" class="tabelPesan table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                 </table>
            </div>
         
        </div>
        <div class="row">
            <div class="col-3">
             <a href="?Halaman=pesan" title="Kembali" class="btn btn-danger waves-effect waves-light align-right"><i class="bx bx-left-arrow-alt font-size-20 align-middle mr-2"></i> Kembali</a>
                
            </div>
        </div>
    </div>

      
</div>

<script>
    $(document).ready( function () {
       
        $('.tabelPesan').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
                "data" : { message_entrance_id: "<?=$_GET['id'];?>"

                },
            "url": "../../../api/message_entrance/log.php",
                   "type": "POST"
            },
            "aoColumns" : [
                               { "data": "id_log_message", "title": "No", "name": "id_log_message","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
                                }},
                                { "data": "message", "title": "Pesan", "name": "message" },
                                { "data": "LogCreated", "title": "Nama created_at", "name": "LogCreated" }
                             
                  ]
        });


      
    } );
</script>