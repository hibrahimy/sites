<?php
include('config.php');
$con->query('SET CHARACTER SET utf8');
if(isset($_GET['id']) && !empty($_GET['id'])){
  $id = $_GET['id'];
  $editq1 = "SELECT * FROM `tenants` WHERE `id`=$id";
  $rez1 = $con->query($editq1);
  $data = $rez1->fetch_assoc();
}
?>
<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>ویرایش کرایه نشین</h1>
</div>
<form action='./del.php' method='post'>
        <div class="form-row" >
          <div class="form-group col-md-6">
            <label for="inputEmail4">اسم کرایه نشین</label>
            <input type="name" name='fname' class="form-control" id="inputName" value="<?php echo $data[fname]?>" placeholder="اسم کرایه نشین">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">نمبرتذکره</label>
            <input type="name" name='nid' class="form-control" id="inputName" value="<?php echo $data[nid]?>" placeholder="نمبرتذکره">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">ولایت</label>
            <input type="name" name='province' class="form-control" id="inputName" value="<?php echo $data[province]?>" placeholder="ولایت">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">شماره تماس</label>
            <input type="name" name='tel' class="form-control" id="inputName" value="<?php echo $data[tel]?>" placeholder="شماره تماس">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">ایمیل ادرس</label>
            <input type="name" name='email' class="form-control" id="inputName" value="<?php echo $data[email]?>" placeholder="ایمیل ادرس">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">تعداد نفر</label>
            <input id="inputPerson" name='pnums' value="<?php echo $data[pnumber]?>" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">تاریخ ورود</label>
          <input type="Date" name='indate' class="form-control" id="inputDate1" value="<?php echo $data[indate]?>" placeholder="تاریخ ورود">
        </div>
        <div class="form-group">
          <label for="inputAddress2">تارخ خروج</label>
          <input type="date" name='outdate' class="form-control" id="inputDate2" value="<?php echo $data[outdate]?>" placeholder="تارخ خروج">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">حالت فعلی</label>
            <select id="inputStatus" name='status'  class="form-control">
              <option value=1 <?php if($data[status]==1) echo 'selected';?>>موجوداست</option>
              <option value=0 <?php if($data[status]==0) echo 'selected';?>>موجودانیست</option>
             </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">شماره اپارتمان</label>
            <select id="inputState" name='appnum' class="form-control" onchange="display(this.value)">
              <script>
                for (i = 1; i < 17; i++) {
                  $("#inputState").append("<option> "+ i +"</option>");
                }
                function display(i){
                  $("#inputZip").val(i);
                }
                // function showCheckOut(){
                  
                //   if(!document.getElementById("inputDate2").disabled)
                //     document.getElementById("inputDate2").disabled = true;
                //   else
                //     document.getElementById("inputDate2").disabled = false;
                // }
              </script>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip"> شماره اپارتمان قبلی  - <?php echo $data[appnum]?></label>
            <input type="text" disabled class="form-control" id="inputZip">
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <button type="submit" name='save' class="btn btn-primary">ویرایش شود</button>
      </form>
      <?php
       if(isset($_GET['success'])){

       ?>
        <div class="bs-example">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> کرایه نشین موفقانه درج سیستم گردید.. .. . . . 
          </div>
        </div>
        
        <?php
      
       }elseif(isset($_GET['failed'])){
        ?>

        <div class="bs-example">
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> . . . .  </strong> لطفا همه خانه های خالی را با معلومات دقیق خانه پری نمایید.. .. . . . 
          </div>
        </div>

        <?php
       }
      
       ?>