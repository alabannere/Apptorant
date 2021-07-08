<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>





<div class="row ">


<div class="col-4 pt-4 text-center"> 

  <div class="bg-s pl-3">
    <strong class="text-white">Agregar categoria</strong>
    <hr>
    <input type="text" class="form-control mb-4" placeholder="Nombre">
    <input type="text" class="form-control mb-4" placeholder="Icono">

    <button class="btn btn-block btn-danger">Guardar</button>
  </div>

</div>





<div id="list_categories" class="bg-p col-8 pl-3 pr-4 pt-3 _scroll"> 
</div>





</div>

<script>

cats();

function cats(){
  spin(true);
  $.ajax({
    type:"get",
    url:"./inc/admin_categories.php",
    datatype:"html",
    success:function(data){
      $('#list_categories').html(data);
      spin(false);
    }
  }); 
}

</script>



<script>
/////////////////////////////////////////
//////// FUNCTIONS
/////////////////////////////////////////


function editCat(id){
  alert(id);
}


function activeCat(id, active){
  spin(true);
  $.post("./inc/action.php?act=activeCat",
  {id:id, active: active},
  function(data){
   if(data === 'ok'){
    cats();
   }
  });


}

function setCat(name, icon){
  spin(true);
  $.post("./inc/action.php?act=setCat",
  {name:name, icon:icon},
  function(data){
   if(data === 'ok'){
    cats();
   }
  });
}


function updateCat(name, icon){
  spin(true);
  $.post("./inc/action.php?act=updateCat",
  {name:name, icon:icon},
  function(data){
   if(data === 'ok'){
    cats();
   }
  });
}
</script>