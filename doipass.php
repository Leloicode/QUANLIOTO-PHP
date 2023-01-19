
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        SETTING
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-4 pt-4">
        <!-- Sidebar Backgrounds -->
        
        <h4 style="text-align:center;">ĐỔI MẬT KHẨU</h4>
        <div class="card-body" >
             
             <form action="" method="post" >
             
             <div class="input-group input-group-outline" style="margin-top:20px; margin-left:-50px; width:320px;">
                 <label class="form-label">Mật khẩu cũ</label>
                 <input type="password" name="mkcu" class="form-control"   onfocus="focused(this)" required onfocusout="defocused(this)">
                     
             </div>
             <div class="input-group input-group-outline" style="margin-top:20px; margin-left:-50px; width:320px;">
                 <label class="form-label">Mật khẩu mới</label>
                 <input type="password" name="mkmoi" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                     
             </div>
             <div class="input-group input-group-outline" style="margin-top:20px; margin-left:-50px; width:320px;">
                 <label class="form-label">Xác nhận mật khẩu </label>
                 <input type="password" name="xnmk" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                     
             </div>
            
            
             <button type="submit" class="btn btn-primary" name="doipass"  style=" margin-top:10px;margin-left:-50px; width:320px;">
             Đổi 
             </button>
             
             
             </form>
             <?php 
             if (isset($_POST['doipass'])) {
                $mkcu = $_POST['mkcu'];
                $mkmoi=$_POST['mkmoi'];
                $xnmk=$_POST['xnmk'];
                $doipass= $ketnoi->checkpass($_SESSION['taikhoanadmin']);
                $row = mysqli_fetch_assoc($doipass);
                if ($doipass) {
                  if ($row['password'] == $mkcu) {
                      if ($mkmoi == $xnmk) {
                        $updatepass = $ketnoi->updatepass($mkmoi,$_SESSION['taikhoanadmin']);
                        $thongbao =  "Thay đổi mật khẩu thành công";
                        ?>
                        <script>alert("Thay đổi mật khẩu thành công");</script>
                        <?php 
                      }
                      else {
                        $thongbao =  "Xác nhận mật khẩu không giống nhau";
                        ?>
                        <script>alert("Xác nhận mật khẩu không giống nhau");</script>
                        <?php 
                      }
                  }
                  else {
                    $thongbao =  "Mật khẩu cũ không đúng";
                    ?>
                    <script>alert("Mật khẩu cũ không đúng");</script>
                    <?php 
                  }
                }
             }
             
             ?>
            <p style=" color:red; "><?php if (isset($thongbao)) {
              echo $thongbao; 
            } ?></p>
             
             </div>










      </div>
    </div>
  </div>