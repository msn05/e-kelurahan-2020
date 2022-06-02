 <div class="row">
  	<div class="col-md-12 col-xl-10">
        <div class="card">
             <div class="card-body">
                 <div class="profile-widgets py-3">
                         <div class="card-body">
                            <h5 class="card-title mb-3">Informasi Account</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Nama </p>
                                <h6 class="nama">StaceyTLopez@armyspy.com</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Alamat</p>
                                <h6 class="alamat">001 951-402-8341</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Pekerjaan</p>
                                <h6 class="pekerjaan">2240 Denver Avenue Los Angeles, CA 90017</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Username </p>
                                <h6 class="username">StaceyTLopez@armyspy.com</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Status Akun</p>
                                <h6 class="aktif">001 951-402-8341</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Tanggal Bergabung</p>
                                <h6 class="tgl">2240 Denver Avenue Los Angeles, CA 90017</h6>
                            </div>
                            </div>
                                <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Nomor Nik </p>
                                <h6 class="nik">StaceyTLopez@armyspy.com</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Nomor WA</p>
                                <h6 class="nowa">001 951-402-8341</h6>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Nomor HP</p>
                                <h6 class="hp">2240 Denver Avenue Los Angeles, CA 90017</h6>
                            </div>
                            </div>
                            </div>
                            <div class="mt-3">
                           <a href="?Halaman=public" class="btn btn-danger waves-effect waves-light"><i class="bx bx-block font-size-16 align-middle mr-2"></i> Kembali</a>
                        </div>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<script>
    let dataID = {
        id_users : "<?=$_GET['id'];?>"
    };

    $.ajax({
        type  : "POST",
        data  : JSON.stringify(dataID),
        url   : "../../../api/data_users/public/show.php",
        processData:false,
        dataType : 'json',
            success: function (respone)
                {
                    console.log(respone);
                    $('.nama').html(respone.data['full_name']);
                    $('.alamat').html(respone.data['address']);
                    $('.pekerjaan').html(respone.data['profession']);
                    $('.nowa').html(respone.data['phone_number_whatshapp']);
                    $('.hp').html(respone.data['phone_number']);
                    $('.nik').html(respone.data['number_identification_card']);
                }
    });

    let dataAkun = {
        id_users : "<?=$_GET['id'];?>"
    };

      $.ajax({
        type  : "POST",
        data  : JSON.stringify(dataAkun),
        url   : "../../../api/users/show.php",
        processData:false,
        dataType : 'json',
            success: function (respone)
                {
                    console.log(respone);
                    $('.username').html(respone.data['username']);
                    $('.aktif').html(respone.data['status']);
                    $('.tgl').html(respone.data['created_at']);
                }
    })

</script>
