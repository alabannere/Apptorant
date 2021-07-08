<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>





<div class="row ">


<div class="col-4 pt-4 text-center"> 

  <div class="bg-s pl-3">
    <strong class="text-white">Agregar Usuario</strong>
    <hr>
    <input type="hidden" id="user_id">
    <input type="text" class="form-control mb-4 text-capitalize" placeholder="Nombre de usuario" id="user_name">
    <input type="text" class="form-control mb-4" placeholder="Codigo (solo numeros)" id="user_code">
    <button class="btn btn-block btn-danger" onclick="setUser()">Guardar</button>
  </div>

</div>





<div id="list_users" class="bg-p col-8 pl-3 pr-4 pt-3 _scroll"> 
</div>





</div>

<script>

users();

function users(){
  spin(true);
  $.ajax({
    type:"get",
    url:"./inc/admin_users.php",
    datatype:"html",
    success:function(data){
      $('#list_users').html(data);
      spin(false);
    }
  }); 
}

</script>



<script>
/////////////////////////////////////////
//////// FUNCTIONS
/////////////////////////////////////////



function deleteUser(id){
  spin(true);
  $.post("./inc/action.php?act=deleteUser",
  {id:id},
  function(data){
   if(data === 'ok'){
    users();
   }
  });
}

function setUser(){
  var id = $('#user_id').val();
  if(id){
    updateUser();
  }else{
    saveUser();
  }
}

function saveUser(){
  spin(true);
  var name = $('#user_name').val();

  $.post("./inc/action.php?act=setUser",{name:name, code:$('#user_code').val()},
      function(data){
      if(data === 'ok'){
        $('#user_name').val('');
        $('#user_code').val('');
        users();
      }else{
      spin(false);
      $('#user_name').val('');
      $('#user_code').val('');      
      snack(name+' ya existe');
    }
  });
}

function updateUser(){
  spin(true);
  var id = $('#user_id').val();
  var name = $('#user_name').val();
  var code = $('#user_code').val();

  $.post("./inc/action.php?act=updateUser", {id:id, name:name, code:code},
  function(data){
   if(data === 'ok'){
    $('#user_id').val('');
    $('#user_name').val('');
    $('#user_code').val('');     
    users();
    snack('Usuario actualizado');
   }
  });
}



function editUser(id, name, code){
  $('#user_id').val(id);
  $('#user_name').val(name);
  $('#user_code').val(code);
}



</script>