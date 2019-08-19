<form action="" method="post">
<div class="row justify-content-center">
   <div class="col-md-6 col-sm-10 col-xs-10 form_window">
     <br>
     <h1>Авторизация</h1>
		 <br>

		 <div class="form-group row">
	     <label for="inputPassword" class="col-sm-4 col-form-label">Логин</label>
	     <div class="col-sm-8">
	       <input type="text" name="login" class="form-control" placeholder="Логин" required>
	     </div>
	   </div>

	   <div class="form-group row">
	     <label for="inputPassword" class="col-sm-4 col-form-label">Пароль</label>
	     <div class="col-sm-8">
	       <input type="password" name="password" class="form-control" placeholder="Пароль" required>
	     </div>
	   </div>

		 <input name="btn" class="btn btn-outline-primary full_width" type="submit" required value="Отправить">
	 <br>
	 <br>

	 </div>
 </div>
</form>


<div class="row justify-content-center">
   <div class="col-md-6 col-sm-10 col-xs-10">
<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($login_status=="access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>
</div>
</div>
