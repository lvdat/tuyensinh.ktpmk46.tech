<?
require_once 'inc/vendor/header.php';
?>
    <div class="card mb-2 shadow" style="border: none">
        <div class="card-header text-white bg-primary">
            <i class="fas fa-info-circle"></i> Cập nhật thông tin
        </div>
        <div class="card-body">
            <div class="alert alert-primary" role="alert">
              Xin chào, bạn cần cập nhật thông tin để có thể tương tác trên hệ thống này!
            </div>
            <form id="update_info">
                <div class="mb-3">
                  <label class="form-label">Bạn đang là ?</label>
                  <?
                  $sql = "SELECT * FROM type_user";
                  $kq = $lvd->query($sql);
                  echo '<select class="form-select" name="type_user" id="type_user" required>
                  <option selected disabled>Chọn một phương án</option>';
                  while($e = mysqli_fetch_assoc($kq)){
                      echo '<option value="'.$e['type'].'">'.$e['name'].'</option>';
                  }
                  echo '</select>';
                  ?>
                </div>
                <div class="mb-3" id="nganh" style="display:none">
                  <label class="form-label">Ngành bạn đang theo học ?</label>
                <?
                    $sql2 = "SELECT * FROM nganh";
                    $kq = $lvd->query($sql2);
                    echo '<select class="form-select" name="nganh" id="chon_nganh" required>
                    <option selected disabled value="0">Chọn một phương án</option>';
                    while($e = mysqli_fetch_assoc($kq)){
                      echo '<option value="'.$e['id'].'">'.$e['name'].'</option>';
                    }
                    echo '</select>';
                 ?>
                 </div>
                <button type="button" class="btn btn-success" id="submit"><i class="fas fa-save"></i> Cập nhật thông tin</button>
            </form>
            <script>
                function buttonchange(num){
                    if(num == 0){
                        $('#submit').html('<i class="fas fa-save"></i> Cập nhật thông tin');
                    }else{
                        $('#submit').html('<i class="fas fa-spinner fa-spin"></i> Đang truy vấn...');
                    }
                }
                $('#type_user').change(function(){
                    var type1 = $(this).val();
                    var nganh = $('#chon_nganh').val();
                    if(type1 == 1){
                        $('#nganh').show();
                    }else{
                        $('#nganh').hide();
                        nganh = 0;
                    }
                });
                $('#submit').click(function(){
                    buttonchange(1);
                    $.notify('Đang truy vấn..','success');
                    /*
                    var data = {type:type1,nganh:nganh};
                    $.ajax({
                        type: 'POST',
                        url: 'truyvan.php',
                        data: data,
                        success: function(res){
                            if(res == 1){
            
                            }
                        }
                    });
                    */
                });
            </script>
        </div>
    </div>

<?
require_once 'inc/vendor/footer.php';
?>