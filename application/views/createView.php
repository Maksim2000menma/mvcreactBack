<h1>Страница создания пользователя</h1>
<br>
<form  action="" method="post">
<div class="row justify-content-center">
  <div class="col-md-6 col-sm-10 col-xs-10 form_create">
    <br>
    <p>Необходимо заполнить все поля для создания пользователя</p>
    <br>
 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">Фамилия</label>
   <div class="col-sm-8">
     <input type="text" name="last_name" class="form-control" placeholder="Фамилия" required>
   </div>
 </div>

 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">Имя</label>
   <div class="col-sm-8">
     <input type="text" name="first_name" class="form-control" placeholder="Имя" required>
   </div>
 </div>

 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">Дата рождения</label>
   <div class="col-sm-8">
     <input type="date" name="date_b" class="form-control" placeholder="Дата рождения">
   </div>
 </div>

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

 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">О себе</label>
   <div class="col-sm-8">
     <input type="text" name="description" class="form-control" placeholder="О себе">
   </div>
 </div>

 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">Адресс проживания</label>
   <div class="col-sm-8">
     <input type="text" name="address" class="form-control" placeholder="Адресс проживания">
   </div>
 </div>

 <div class="form-group row">
   <label for="inputPassword" class="col-sm-4 col-form-label">Роль</label>
   <div class="col-sm-8">
     <select class="form-control" name="role_id">
       <option selected disabled hidden value="<?php echo $row['role_id']?>"><?php echo $row['role_id']?></option>
       <option value="1">1 (ЗП)</option>
       <option value="2">2 (Модератор)</option>
       <option value="3">3 (Админ)</option>
     </select>
   </div>
 </div>

 <input name="submitadd" class="btn btn-outline-primary full_width" type="submit" required value="Создать">
<br>
<br>
  </div>
</div>
</form>
