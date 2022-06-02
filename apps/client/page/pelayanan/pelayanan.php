<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="alert alert-info mb-0" role="alert">
     <h4 class="card-title"><strong>Halaman ini menampung pelayanan.</strong></h4>
     <span class="text-danger">Silakan jika ingin mencari data, bisa menggunakan fungsi filter diatas tabel.</span>
 </div>
</div>
</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-5">
                <label for="email">Status</label>
                <select id="Status" name="Status" class="form-control" >
                    <option value="">Pilih Filter</option>
                    <option value="Show">Masih Berlaku</option>
                    <option value="Hide">Tidak Berlaku</option>
                </select>
            </div>
            <div class="form-group mt-4">
               <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light mt-1">Filter</button>
               <button type="submit" id="keseluruhanPelayanan" class="btn btn-info waves-effect waves-light mt-1">Seluruh Data</button>

           </div>
       </div>

   </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Halaman ini menampung pelayanan.</h4> -->
                <table id="datatable" class="tabelPelayanan table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#keseluruhanPelayanan').on('click',(function(e){
           let status = $('#Status').val('');
           TabelPelayanan.ajax.reload();
       }));


        $('#simpanPelayanan').on('click',(function(e){
            e.preventDefault();
            let status = $('#Status').val();
            if(status != ''){
            // console.log(status);
            TabelPelayanan.ajax.reload();
        }else{
            SwalError.fire({text: "Silakan Pilih Filter Data.!"})
        }

    }));

        const TabelPelayanan =  $('.tabelPelayanan').DataTable({
            "searching" : false,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
                "url": "../../../api/service_categories/show.php",
                "type": "POST",
                "data": function ( d ) {
                   return $.extend( {}, d, {
                     "status": $('#Status').val()
                 } );
               }
           },
           "aoColumns" : [
           { "data": "id_service_categori", "title": "No", "name": "id_service_categori","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
           }},
           { "data": "names", "title": "Nama Pelayanan", "name": "names" },
           { "data": "status", "title": "Status", "name": "status" },
           { "data": "created_at", "title": "Tanggal Dibuat", "name": "created_at" },
           { "data": "name_employees", "title": "Nama User", "name": "name_employees" },
           {"data": "id_service_categori", "title":"Aksi", "name":"id_service_categori", "render": function(data,type,rows){
            return '<a href=?Halaman=pelayanan&Aksi=form&if=edit&id='+rows["id_service_categori"]+' class=" btn btn-outline-warning waves-effect waves-light"  title="Edit Data"><i class="mdi mdi-account-edit-outline"></i> Ubah</a> <button id="hapus" value="'+rows["id_service_categori"]+'" data-load="" class=" btn btn-outline-danger waves-effect waves-light" title="Delete Data"><i class="mdi mdi-trash-can"></i></i> Hapus</button> ';
        }
    }

    ]
});

        $(document).on('click','#hapus',(function(){
            let data = {
                id_service_categori  : $(this).val(),
            }; 
            Swal.fire({
              title: 'Anda Yakit?',
              text: 'Data Tidak Bisa Dikembalikan.!',
              icon: 'question',
              showCancelButton: true,
              confirmButtonText: 'Lanjutkan',
              cancelButtonText: 'Batalkan'
          }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({
                    type : 'DELETE',
                    data : JSON.stringify(data),
                    url  : '../../../api/service_categories/delete.php',
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