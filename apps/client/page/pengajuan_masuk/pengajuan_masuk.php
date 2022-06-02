<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="card-body">
        <div class="alert alert-info " role="alert">
            <h4 class="card-title">Halaman ini menampung data pelayanan masuk. </h4>
            <span class="text-danger">Silakan jika ingin mencari data, bisa menggunakan fungsi filter diatas tabel.</span>
        </div>
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
</div>
</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-3">
                <label for="email">Nama Pelayanan</label>
                <select id="namePelayanan" name="namePelayanan" class="form-control" >
                    <option value="" selected="selected">Pilih Jenis Surat</option>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="email">Status</label>
                <select id="Status" name="Status" class="form-control" >
                    <option value="">Pilih Filter</option>
                </select>
            </div>
            <div class="form-group col-6 mt-4">
                <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light mt-1">Filter</button>
                <button type="button" class="btn btn-dark waves-effect waves-light mt-1" data-toggle="modal" data-target=".bs-example-modal-sm"><i class=" bx bx-calendar-event "></i> Filter Tanggal</button>

                <button type="submit" id="keseluruhanPelayanan" class="btn btn-info waves-effect waves-light mt-1">Seluruh Data</button>
            </div>

        </div>

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
        <div class="col-sm-6 col-md-4 col-xl-3">
           <div class="my-4 ">
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title mt-0" id="mySmallModalLabel">Form Filter Tanggal</h5>
                      </div>
                      <div class="modal-body" id="Form">
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group position-relative">
                                   <label>Dari</label>
                                   <div class="input-group">
                                      <input type="date" name="startdate" id="startdate" class="form-control form"  required="">
                                  </div>
                              </div>
                              <div class="form-group position-relative">
                                 <div id="passwordGanti">
                                    <label>Sampai</label>
                                    <div class="input-group">
                                       <input type="date" name="enddate" id="enddate" class="form-control"  required="">
                                   </div>
                               </div>
                           </div>
                           <button type="submit" id="FilterTanggalNya" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Cari</button>
                       </div>
                   </div>
               </div>
               <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
       </div>
   </div>
</div>
</div>
</div>
</div>
</div>

<script>
    $(document).ready( function () {
     $('#simpanPelayanan').on('click',(function(e){
        e.preventDefault();
        TabelPelayananMasuk.ajax.reload();

    }));
     $('#keseluruhanPelayanan').on('click',(function(e){
        $('#Status').val('');
        $('#namePelayanan').val('');
        $('#startdate').val('');
        $('#enddate').val('');
        TabelPelayananMasuk.ajax.reload();
    }));

     $('#FilterTanggalNya').on('click',(function(e){
        e.preventDefault();
        $('#namePelayanan').val('');
        $('#Status').val('');
        let start = $('#startdate').val();
        let end = $('#enddate').val();
        if(start != '' && end != '')
            // console.log(start,end);
            TabelPelayananMasuk.ajax.reload();
            else
             SwalError.fire({text: "Silakan Isi Tanggal.!"})
     }));
     let StatusPilih = [
     {id:'1',text:'Selesai'},
     {id:'2',text:'Dalam Proses'},
     {id:'03',text:'Belum di proses'},
     {id:'4',text:'Gagal'}
     ];

     let Status = $('#Status').select2({
        data:StatusPilih
    });

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
     const TabelPelayananMasuk = $('.tabelPelayananMasuk').DataTable({
        "processing": true,
        "serverSide": true,
        "searching" : false,
        "autoWidth": true,
        "scrollCollapse" : true,
        "scrollX": true,
        "scrollY":true,
        "ajax": {

           "type": "POST",
           "data": function ( d ) {
             return $.extend( {}, d, {
               "name": $('#namePelayanan').val(),
               "status": $('#Status').val(),
               "startdate": $('#startdate').val(),
               "enddate": $('#enddate').val()
           } );
         },
         "url": "../../../api/entrance_services/request.php",
     },
     "aoColumns" : [
     { "data": "code_entrance_services", "title": "No", "name": "code_entrance_services","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "full_name", "title": "Nama Warga", "name": "full_name" },
     { "data": "namePelayanan", "title": "Pengajuan Layanan", "name": "namePelayanan" },
     { "data": "created_atPelayanaMasuk", "title": "Tanggal Masuk", "name": "created_atPelayanaMasuk" },
     { "data": "name_employee", "title": "Nama Staf", "name": "name_employee", "render" : function(data){
        if(data){ return data;} return 'Belum diproses staf';
    }},
    { "data" : "status_name", "title" : "Status" , "name" : "status_name"},
    {"data": "code_entrance_services", "title":"Aksi", "name":"code_entrance_services", "render": function(data,type,rows){
        return '<a href=?Halaman=pelayanan_masuk&Aksi=info&if=edit&id='+rows["code_entrance_services"]+' class="btn btn-outline-info " title="Cek Informasi Data"><i class="mdi mdi-account-edit-outline"></i> Lihat</a>';
    }
}

],
});



 } );
</script>