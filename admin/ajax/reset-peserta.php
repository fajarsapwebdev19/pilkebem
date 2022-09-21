Fitur ini akan me-reset akun/user yang digunakan oleh orang lain.
<form method="post" autocomplete="off">
  <label for="username" class="mt-2">NIM / Nama Dosen</label>
  <input type="text" name="username" id="username" class="form-control">
  <div class="mt-3">
    <button type="button" id="reset" class="tmb tmb-danger"><em class="fas fa-user-times"></em> Reset User</button>
  </div>
</form>
<script type="text/javascript" src="../assets/admindek-html/files/bower_components/jquery/js/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    //reset peserta action
    $('#reset').on('click', function(){
      var username = $('#username').val();
      $.ajax({
        url: 'ajax/reset-peserta-pilkebem.php',
        type: 'post',
        data: {username: username},
        success:function(respond)
        {
          $('#message-reset').load('ajax/validasi.php');
          $('#reset-peserta').load('ajax/reset-peserta.php');
        }
      });
    });

    window.setTimeout(function(){
        $("#auto-close").fadeTo(500,0).slideUp(500, function(){
          $(this).remove();
        });
    }, 5000);
  });
</script>