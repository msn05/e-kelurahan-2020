 <div class="row">
  <div class="col-12">
     <div class="card">
        <div class="alert alert-danger mb-0" role="alert">
            <h4 class="card-title">Halaman ini file yang sudah digenered otomatis pada sistem. Staf silakan mengecek berkas dan apabila sudah valid silakan diproses informasi ke warga pembuat berkas dengan mengklik tombol siap downloads</h4>
        </div>
    </div>
</div>
</div>

<div class="row">
   <div id="DataForm" class=" col-12">
    <div class="card">
        <div class="card-body">
            
            <table id="datatable" class="tabelPelayananMasuk table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            </table>
        </div>

    </div>
</div>
</div>

<script>
    $(document).ready( function () {
        let Role = <?=$_SESSION['session_role'];?>;
        $('.tabelPelayananMasuk').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
               "type": "POST",

               "url": "../../../api/downloads/request.php",
           },
           "aoColumns" : [
           { "data": "id_download", "title": "No", "name": "id_download","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
           }},
           { "data": "code_print", "title": "Kode Cetak", "name": "code_print" },
           { "data": "file", "title": "File Data", "name": "file","render" :function(data,type,rows){
            return `<a href=../../../file_manager/file_request/${rows.file} target=_blank>${rows.file}</a> `
        }
    },
    { "data" : "actions", "title" : "Status" , "name" : "actions"},
    { "data" : "id_download", "title" : "Aksi" , "name" : "id_download",
    "render" : function(data, type, row, meta){
                        // console.log(row.Aksi);
                        if(row.AksiDownloads == 2){
                            return '<a href=../../../file_manager/file_request/'+row["file"]+' target=_blank class="btn btn-outline-primary" title="Downloads Data"><i class="mdi mdi mdi-file-account"></i> Downloads</a>';
                                // console.log("data"['id']);
                                // return {"data":"file"};
                            } else {
                                return '<button id="selesai" value="'+row["id_download"]+'" data-load="" class="btn btn-outline-success " title="Selesaikan Berkas"><i class="mdi mdi-clipboard-check"></i></i> Selesaikan</button> '
                            }


                        }
                    }

                    ]
                });


        $(document).on('click','#selesai',(function(){
            let data = {
                id_download  : $(this).val(),
            }; 
            Swal.fire({
              title: 'Anda Yakit?',
              text: 'Ingin menyelesaikan berkas.!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Lanjutkan',
              cancelButtonText: 'Batalkan'
          }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(data),
                    url  : '../../../api/downloads/update.php',
                    processData:false,
                    dataType: "json",
                    success: function (respone)
                    {
                        SwalOk.fire({text: respone.messages })
                        .then((respone)=>{
                            location.reload(true); 
                        });
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        let msg = JSON.parse(jqXHR.responseText);
                        SwalError.fire({text: msg.messages })
                    }

                });
            } else {
             Swal.fire(
              'Batal',
              'Anda Telah Membatalkan :)',
              'error'
              );
         }
     });
      }));



    } );
</script>