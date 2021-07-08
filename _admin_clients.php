<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>





<div class="row ">


<div class="col-4 pt-4 text-center"> 

  <div class="bg-s pl-3">
    <strong class="text-white">Agregar Cliente</strong>
    <hr>
    <input type="hidden" id="id">
    <input type="text" class="form-control mb-4 text-capitalize" placeholder="Nombre" id="name">
    <input type="text" class="form-control mb-4" placeholder="Telefono" id="phone">
    <input type="text" class="form-control mb-4 text-capitalize" placeholder="Direccion" id="address">
    <input type="text" class="form-control mb-4" placeholder="Correo electronico" id="email">    
    <button class="btn btn-block btn-danger" onclick="setUser()">Guardar</button>
  </div>

</div>





<div id="list_client" class="bg-p col-8 pl-3 pr-4 pt-3 _scroll"> 
</div>





</div>

<script>

users();

function users(){
  spin(true);
  $.ajax({
    type:"get",
    url:"./inc/admin_clients.php",
    datatype:"html",
    success:function(data){
      $('#list_client').html(data);
      spin(false);
    }
  }); 
}

</script>



<script>
/////////////////////////////////////////
//////// FUNCTIONS
/////////////////////////////////////////



function del(id){
  spin(true);
  $.post("./inc/action.php?act=deleteClient",
  {id:id},
  function(data){
   if(data === 'ok'){
    users();
   }
  });
}

function setClient(){
  var id = $('#id').val();
  if(id){
    update();
  }else{
    save();
  }
}

function save(){
  spin(true);
  var name = $('#name').val();
  var phone = $('#phone').val();
  var address = $('#address').val();
  var email = $('#email').val();

  $.post("./inc/action.php?act=setClient",{name:name, phone:phone, address:address, email:email},
      function(data){
      if(data === 'ok'){
        $('#name').val('');
        $('#phone').val('');
        $('#address').val('');
        $('#email').val('');        
        users();
      }else{
      spin(false);
    }
  });
}

function update(){
  spin(true);
  var id = $('#id').val();
  var name = $('#name').val();
  var phone = $('#phone').val();
  var address = $('#address').val();
  var email = $('#email').val();


  $.post("./inc/action.php?act=updateClient", {id:id, name:name, phone:phone, address:address, email:email},
  function(data){
   if(data === 'ok'){
        $('#name').val('');
        $('#phone').val('');
        $('#address').val('');
        $('#email').val('');   
    users();
    snack('Cliente actualizado');
   }
  });
}



function edit(id, name, phone, address, email){
  $('#id').val(id);
  $('#name').val(name);
  $('#phone').val(phone);
  $('#address').val(address);
  $('#email').val(email);   
}



</script>