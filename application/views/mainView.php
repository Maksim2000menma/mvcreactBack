<h1>Добро пожаловать!</h1>
<a href="/">Главная</a>
<br>



<?php if($_SESSION['login'] == ''){?>
<div class="norm_mar_vert">
  <div class="small_mar_vert">
    <center><a href="/registration"><button class="btn btn-outline-primary size_button"><p class="big_size ">Регистрация</p></button></a></center>
  </div>

  <div class="small_mar_vert">
    <center><a href="/login"><button class="btn btn-outline-primary size_button"><p class="big_size">Авторизация</p></button></a></center>
  </div>
</div>
<?php } else { ?>
  <br>
  <p class="big_size">Тут была Регистрация и Авторизация но сейчас в этом нет нужны т к ты авторизирован</p>
<?php }?>
