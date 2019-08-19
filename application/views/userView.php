<h1>Панель администрирования</h1>
<table style="width:100%;">
  <tr>
      <th>id</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>date_b</th>

      <?php if ($_SESSION['role'] == 3){?>
      <th>login</th>
      <th>password</th>
      <?php }?>

      <th>role_id</th>
      <th>function</th>
     </tr>

     <?php foreach($data as $row){?>
      <tr>

        <td><?php echo $row['id']?></td>
        <td><?php echo $row['first_name']?></td>
        <td><?php echo $row['last_name']?></td>
        <td><?php echo $row['date_b']?></td>

        <?php if ($_SESSION['role'] == 3){?>
        <td><?php echo $row['login']?></td>
        <td><?php echo $row['password']?></td>
        <?php }?>

        <td><?php echo $row['role_id'],' - ';
        switch ($row['role_id']) {
          case 1:
           echo "ЗП";
            break;
          case 2:
            echo "Модератор";
            break;
          case 3:
            echo "Админ";
            break;
        }
        ?></td>

        <td>
          <center>
        <?php if ($_SESSION['fun_read'] == 1){?>
          <a href="/user/allinfo/<?=$row['id']?>"><img class="small_ico in_row" src="/images/more_info.jpg"></a>
        <?php }?>

        <?php if ($_SESSION['fun_edit'] == 1){?>
          <a href="/user/edit/<?=$row['id']?>"><img class="small_ico in_row" src="/images/edit_info.png"></a>
        <?php }?>

        <?php if ($_SESSION['fun_delete'] == 1){?>
          <a href="/user/delete/<?=$row['id']?>"><img class="small_ico in_row" src="/images/delete_info.png"></a>
        <?php }?>
        </center>
        </td>
      </tr>
    <?php }?>

</table>
<br>
<?php if ($_SESSION['fun_create'] == 1){?>
  <a href="/user/create"><input type="button" value="Добавить пользователя" class="btn btn-outline-primary size_button" /></a>
<?php }?>
<br>
<br>
<br>
<div id="user_table">
</div>


<script src="/js/table.jsx" type="text/babel"></script>
