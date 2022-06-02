<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="alert alert-info mb-0" role="alert">
     <h4 class="card-title"><strong>Halaman ini menampung data persyaratan pelayanan.</strong></h4>
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
            <div class="form-group col-lg-4">
                <label for="email">Nama Pelayanan</label>
                <select id="namePelayanan" name="namePelayanan" class="form-control" >
                    <option value="" selected="selected">Pilih Jenis Surat</option>
                </select>
            </div>
            <div class="form-group col-lg-4">
                <label for="email">Status</label>
                <select id="Status" name="Status" class="form-control" >
                    <option value="">Pilih Filter</option>
                    <option value="Berlaku">Belaku</option>
                    <option value="Tidak Berlaku">Tidak Berlaku</option>
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
         <table id="datatable" class="tabelPersyaratan table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         </table>
     </div>
 </div>
</div>
</div>

<script>
    $(document).ready( function () {

        $('#keseluruhanPelayanan').on('click',(function(e){
         $('#namePelayanan').val('').select2();
         $('#Status').val('');
         TabelPersyaratan.ajax.reload();
     }));


        $('#simpanPelayanan').on('click',(function(e){
            e.preventDefault();
            let name = $('#namePelayanan').val();
            let status = $('#Status').val();
            TabelPersyaratan.ajax.reload();

        }));


        let Select = $('#namePelayanan').select2();
        let dataSelect =    $.ajax({
            type : 'POST',
            url  : '../../../api/service_categories/list_update.php',
            success : function(result){
                dataPelayanan      = result.data;
                for (var key in dataPelayanan) {
                    data_id = dataPelayanan[key]['id_service_categori'];
                    dataText = dataPelayanan[key]['name'];
                    var option = new Option(dataText, data_id);
                    Select.append(option).trigger('change');
                }
            }
        });




        const TabelPersyaratan = $('.tabelPersyaratan').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
                "url": "../../../api/file_requietments/show.php",
                "type": "POST",
                "data": function ( d ) {
                   return $.extend( {}, d, {
                     "name": $('#namePelayanan').val(),
                     "status": $('#Status').val()
                 } );
               }

           },
           "aoColumns" : [
           { "data": "id_file_requietmens", "title": "No", "name": "id_file_requietmens","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
           }},
           { "data": "name", "title": "Nama Pelayanan", "name": "name" },
           { "data": "name_file", "title": "File Persyaratan", "name": "name_file" },
           { "data": "created_atFile", "title": "Tanggal Dibuat", "name": "created_atFile" },
           { "data": "statusFile", "title": "Status", "name": "statusFile" },
           {"data": "id_file_requietmens", "title":"Aksi", "name":"id_file_requietmens", "render": function(data,type,rows){
            return '<a href=?Halaman=persyaratan&Aksi=form&if=edit&id='+rows["id_file_requietmens"]+' class=" btn btn-outline-warning waves-effect waves-light"  title="Edit Data"><i class="mdi mdi-account-edit-outline"></i> Ubah</a>';
        }
    }

    ],
});



    } );
</script>