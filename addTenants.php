<div class="alert alert-success" role="alert">
  <h1 class='h1' style='text-align: center;'>درج کرایه نشین</h1>
</div>
<form action='./phpCon.php' method='post'>
        <div class="form-row" >
          <div class="form-group col-md-6">
            <label for="inputEmail4">اسم کرایه نشین</label>
            <input type="name" name='fname' class="form-control" id="inputName" placeholder="اسم کرایه نشین">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">نمبرتذکره</label>
            <input type="name" name='nid' class="form-control" id="inputName" placeholder="نمبرتذکره">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">ولایت</label>
            <input type="name" name='province' class="form-control" id="inputName" placeholder="ولایت">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">شماره تماس</label>
            <input type="name" name='tel' class="form-control" id="inputName" placeholder="شماره تماس">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">ایمیل ادرس</label>
            <input type="name" name='email' class="form-control" id="inputName" placeholder="ایمیل ادرس">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">تعداد نفر</label>
            <select id="inputPerson" name='pnums' class="form-control">
            <script>
                for (i = 1; i < 16; i++) {
                  $("#inputPerson").append("<option> "+ i +"</option>");
                }
              </script>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">تاریخ ورود</label>
          <input type="Date" name='indate' class="form-control" id="inputDate1" placeholder="تاریخ ورود">
        </div>
        <!-- <div class="form-group">
          <label for="inputAddress2">تارخ خروج</label>
          <input disabled type="date" name='outdate' class="form-control" id="inputDate2" placeholder="تارخ خروج">
        </div> -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">حالت فعلی</label>
            <select id="inputStatus" name='status' class="form-control">
            <script>
                for (i = 0; i < 2; i++) {
                  if(i==0)
                    $("#inputStatus").append("<option value="+ i +"> موچودنیست </option>");
                  else
                    $("#inputStatus").append("<option selected value="+ i +"> موجوداست </option>");
                }
            </script>
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
            <label for="inputZip">اپارتمان انتخاب شده</label>
            <input type="text" disabled class="form-control" id="inputZip">
          </div>
        </div>
        <button type="submit" name='save' class="btn btn-primary">ذخیره</button>
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