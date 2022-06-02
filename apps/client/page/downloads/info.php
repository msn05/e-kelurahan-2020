
<div class="row">
   <div class="col-12">
    <div class="alert alert-danger " role="alert">
        <h4 class="card-title">Silakan Cek Berkas Dengan Menggunakan Fungsi Filter Dibawah Ini </h4>
    </div>
</div>
</div>

<div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-12">
                    <label for="email">Nama Pelayanan</label>
                    <select id="SelectStatus" name="SelectStatus" class="form-control" >
                        <option value="" selected="selected">Pilih Jenis Surat</option>
                    </select>
                </div>
                <div class="form-group col-12 ">
                    <button type="submit" id="simpanPelayanan" class="form-control btn btn-success waves-effect waves-light ">Filter</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row" id="Data">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan .</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="tabelrole table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    const Tabel = $('#Data').hide();
    let Select = $('#SelectStatus').select2();

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


    $('#simpanPelayanan').on('click',(function(e){
        e.preventDefault();
        let Berkas = $('#SelectStatus').val();
        if(Berkas != '' ){
            Tabel.show();
            TabelDownloads.ajax.reload();
        }else{
            SwalError.fire({text: "Silakan Pilih Jenis Berkas Terlebih Dahulu.!"})
        }
    }));

    $.fn.dataTable.ext.errMode = 'none';
    const TabelDownloads = $('.tabelrole').DataTable({
        "paging" : false,
        "searching" : false,
        "serverSide": true,
        "autoWidth": false,
        "scrollCollapse" : true,
        "scrollX": true,
        "scrollY":true,
        "ajax": {
            "url": "../../../api/downloads/requestPublic.php",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "JenisSurat": $('#SelectStatus').val()
                } );
            },
        },
        "aoColumns" : [
        { "data": "id_download", "title": "No", "name": "id_download","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
        }},
        { "data": "CetakPrint", "title": "Kode Cetak", "name": "CetakPrint" },
        { "data": "file", "title": "File Data", "name": "file","render" :function(data,type,rows){
            return `<a href=../../../file_manager/file_request/${rows.file} target=_blank>${rows.file}</a> `
        }
    },
    { "data" : "AksiDownloads", "title" : "Status" , "name" : "AksiDownloads"},
    { "data" : "id_download", "title" : "Aksi" , "name" : "id_download",
    "render" : function(data, type, row, meta){
         if(row.DownloadsFile == 2)
        return '<a href=../../../file_manager/file_request/'+row["file"]+' target=_blank class="btn btn-outline-primary" title="Downloads Data"><i class="mdi mdi mdi-file-account"></i> Downloads</a>';
    else return ``;
    }
}

]

});

</script>
