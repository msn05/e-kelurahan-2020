<div class="row">
   <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Halaman ini menampung data pesan masuk layanan.</h4>
            <table id="datatable" class="tabelPesan table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready( function () {
        let Role = <?=$_SESSION['session_role'];?>;
        $('.tabelPesan').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
                "url": "../../../api/message_entrance/show.php",
                "type": "POST"
            },
            "aoColumns" : [
            { "data": "id_message", "title": "No", "name": "id_message","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
            }},
            { "data": "entrance_service_id", "title": "Kode Pengajuan", "name": "entrance_service_id" },
            { "data": "message", "title": "Pesan", "name": "message" },
            { "data": "staf", "title": "Nama Staf", "name": "staf" },
            {"data": "id_message", "title":"Aksi", "name":"id_message", "render": function(data,type,rows){

                if(Role == 3)
                    return `<a href=?Halaman=pesan&Aksi=form&id=${rows.id_message} class="btn btn-outline-info " title="Lihat Histori Data"><i class=" bx bx-history "></i> Histori</a>
                `
                else
                return `<a href=?Halaman=verifikasi&id=${rows.entrance_service_id}&kode=${rows.kode} class="btn btn-outline-warning" title="Info dan Verifikasi Data"><i class="bx bx-window-close "></i> Lihat Dan Verifikasi</a> <a href=?Halaman=pesan&Aksi=form&id=${rows.id_message} class="btn btn-outline-info " title="Lihat Histori Data"><i class=" bx bx-history "></i> Histori</a>`;
            }
        }

        ]
    });



    } );
</script>