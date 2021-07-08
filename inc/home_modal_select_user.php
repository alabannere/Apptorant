
<!-- Modal Add modalSelectType-->
<div class="modal fade" id="modalSelectUser" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog " role="document">
    <div class="modal-content bg-s">

      <div class="modal-body text-center">

<div id="users_content" class="row p-2">

<?php 
    foreach(getUsers() as $r){
?>
  <button class="btn btn-lg btn-danger p-3 ml-2" onclick="selUser('<?php echo $r['ID'] ?>', '<?php echo $r['user_name'] ?>')">
    <i class="fa fa-user"></i><br> <small><?php echo $r['user_name'] ?></small>
  </button>    

<?php 
    }
?>

</div>

<div id="code_content" class="collapse p-2 text-left">

  <button class="btn btn-sm btn-danger text-white" onclick="selUserBack()">
    <i class="fa fa-users"></i>
  </button> 

   <input id="changeuser_uid" type="hidden">
   <input id="changeuser_name" type="hidden">
   <strong id="changeuser_name_title" class="text-white"></strong>
   <hr>
   <div>
   <input id="changeuser_code" type="password" class="bg-s text-c w-100 border-0 text-center" style="font-size:30px; " autofocus autocomplete="new-password" placeholder="Codigo">
   <hr>

<div class=" text-center">
    <button class="btn  btn-dark text-white col-2" onclick="$('#changeuser_code').val($('#changeuser_code').val()+1)" >1</button> 
    <button class="btn  btn-dark text-white col-2" onclick="$('#changeuser_code').val($('#changeuser_code').val()+2)" >2</button> 
    <button class="btn  btn-dark text-white col-2" onclick="$('#changeuser_code').val($('#changeuser_code').val()+3)" >3</button> 
    <button class="btn  btn-dark text-white col-2" onclick="$('#changeuser_code').val($('#changeuser_code').val()+4)" >4</button> 
    <button class="btn  btn-dark text-white col-2" onclick="$('#changeuser_code').val($('#changeuser_code').val()+5)" >5</button> 
    <button class="btn  btn-dark text-white col-2 mt-1" onclick="$('#changeuser_code').val($('#changeuser_code').val()+6)" >6</button> 
    <button class="btn  btn-dark text-white col-2 mt-1" onclick="$('#changeuser_code').val($('#changeuser_code').val()+7)" >7</button> 
    <button class="btn  btn-dark text-white col-2 mt-1" onclick="$('#changeuser_code').val($('#changeuser_code').val()+8)" >8</button> 
    <button class="btn  btn-dark text-white col-2 mt-1" onclick="$('#changeuser_code').val($('#changeuser_code').val()+9)" >9</button> 
    <button class="btn  btn-dark text-white col-2 mt-1" onclick="$('#changeuser_code').val($('#changeuser_code').val()+0)" >0</button> 
    <button class="btn btn-dark text-white col-8 mt-2" onclick="loginuser()" autofocus>
      <small>Ingresar</small>
    </button> 
</div>

</div>

</div>



    </div>
  </div>
</div>
</div>
