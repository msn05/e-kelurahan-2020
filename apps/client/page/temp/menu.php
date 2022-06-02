<?php 
$Menu = @$_SESSION['session_role'];
include __DIR__.'/akses_menu.php';

?>
<div id="sidebar-menu">
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li><a href="index.php" class="waves-effect">
            <i class="mdi mdi-airplay"></i><span>Dashboard</span>
        </a>
    </li>
    <?=$dataMenu;?>
    <li>
       <a id="logout" class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span>Logout </span></a>
   </li>

</ul>
</div>
</div>
</div>


<script>

    $(document).ready(function(){

        let role = "<?=@$_SESSION['session_role'];?>";
        let data = {
            id_users : "<?=@$_SESSION['users_id']?>",
        };

        if(role != 3){
         $('button#page-header-user-dropdown ').remove();
         $('.profile-public').remove();
         $.ajax({
            type : 'POST',
            data : JSON.stringify(data),
            url  : '../../../api/data_users/administrator/show.php',
            processData: false,
            dataType:"json",
            success :function(results) {
                    // console.log(results);
                    let name_user   = results.data['name_employee'];
                    let posisi      = results.data['position'];
                    // let name_user = js[0]['name_employee'];
                    // console.log(name_user);
                    $('.nameuser').html(name_user);
                    $('.posisi').html(posisi);

                }


            });


     }else{
        $('.profile-public').show();

        $('li#Users').empty();
        $.ajax({
            type : 'POST',
            data : JSON.stringify(data),
            url  : '../../../api/data_users/public/show.php',
            processData: false,
            dataType:"json",
            success :function(results) {
                let name_user = results.data['full_name'];
                let work      = results.data['profession'];
                $('.nameuser').html(name_user);
                $('.posisi').html(work);
            }
        });
    }
    $('li#logout, #logout').on('click',(function(e){
        e.preventDefault();

        $.ajax({
            type : 'POST',
            data : JSON.stringify(data),
            url  : '../../../api/logout/index.php',
            processData:false,
            dataType: "json",
            success: function (respone)
            {
                SwalOk.fire({text: respone.messages })
                .then((respone)=>{
                    window.location='../../login.php';
                });
            },
            error:function(jqXHR, textStatus, errorThrown){
                let msg = JSON.parse(jqXHR.responseText);
                SwalError.fire({text: msg.messages })
            }
        })
    }));
})
</script> 





