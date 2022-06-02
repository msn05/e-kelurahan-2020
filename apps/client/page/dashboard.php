<div class="row">
    <div class="col-lg-12">
        <div class="card border border-success">
            <div class="card-header bg-dark border-success">
                <h5 class="my-0 text-success"><i class="mdi mdi-check-all mr-0"></i>Success. Anda Telah berhasil pada sistem E kelurahan Sebagai </h5>
            </div>
        </div>
                <div class="col-lg-12">
                    <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow mr-3"></i>Tugas Anda</h5>
                                </div>
                                <div class="card-body">
                                    <div class="staf">
                                        <h5 class="card-title"><i class="mdi mdi-arrow-right"></i> Mengelola Data Persyaratan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengelola Data Pelayanan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengelola Data Users</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengelola Data Berkas Masuk</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengelola Data Pembuatan Berkas Surat Keterangan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Memverifikasi Berkas yang sudah diupload</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengajukan Permitaan Persetujuan TTD Lurah</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengelurkan Surat untuk di download Warga</h5>
                                </div>
                                 <div class="lurah">
                                        <h5 class="card-title"><i class="mdi mdi-arrow-right"></i> Mengelola Data Role</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Membuat TTD untuk digunakan staf</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Menyetujui pengunaan TTD</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Menerima Laporan Berkas Masuk</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Menerima Laporan Berkas Gagal</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Menerima Laporan Selesai</h5>
                                </div>
                                 <div class="warga">
                                        <h5 class="card-title text-danger"><i class="mdi mdi-arrow-right"></i> Sebelum mengajukan berkas Silakan cek data diri Akun terlebih dahulu</h5>
                                        <h5 class="card-title"><i class="mdi mdi-arrow-right"></i> Mengajukan pembuatan surat</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Mengupload berkas persyaratan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Menerima informasi pesan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Melihat Informasi pengajuan</h5>
                                        <h5 class="card-title "><i class="mdi mdi-arrow-right"></i> Download Berkas</h5>
                                          <h5 class="card-title text-danger"><i class="mdi mdi-arrow-right"></i>Untuk pembuatan berkas permohonan surat nikah, setelah mengupload berkas wajib mengisi formulir pernikahan</h5>
                                           
                                </div>

                            </div>

                                 </div>
                    </div>

</div>
</div>

<script>
    let id_role = <?=@$_SESSION['session_role'];?>;
    Role = {
        id_role : id_role
    };
    $.ajax({
        type : "post",
        data : JSON.stringify(Role),
        url  : '../../../api/role/request.php',
        dataType : false,
        success : function(respone){
            // console.log(respone);
            let name = respone.data['name'];
            // console.log(name);
            $('h5.my-0').append("<strong> "+name+" </strong>");

        }

   
    })

    if(id_role === 1){
        $('.staf').show();
        $('.lurah').remove();
        $('.warga').remove();
    } else if (id_role === 2){
        $('.lurah').show();
        $('.staf').remove();
        $('.warga').remove();
    } else {
        $('.warga').show();
         $('.staf').remove();
        $('.lurah').remove();
    }

</script>
