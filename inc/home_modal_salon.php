
<!-- Modal Add Item-->
<div class="modal fade" id="modalSalon" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog " role="document">
    <div class="modal-content bg-s">

      <div class="modal-body">
      <div class="row">


        <span class="text-white col-6 text-center">Sector A</span>
        <span class="text-white col-6 text-center">Sector B</span>

      <div class="col-6">

        <div class="row m-3">
        <?php 
        foreach(getTables('a') as $r){ 
          if($r['active']=== 'true' ){
            $active = "danger"; //Si esta ocupada agregar producto al pedido de esa mesa.
          }else{
            $active = "success";
          } 
        ?>
        <div class=" p-2 ">
              <button class="btn btn-lg btn-<?php echo $active; ?> pl-3 pr-3" onclick="selectTable('<?php echo $r['number']; ?>')" >
                <small> <?php echo $r['number']; ?> </small>
              </button>   
        </div>
        <?php  }?>
        </div>

      </div>

      <div class="col-6">

        <div class="row  m-3">

        <?php foreach(getTables('b') as $r){ 
          if($r['active']=== 'true' ){
            $active = "danger";
          }else{
            $active = "success";
          } 
        ?>
        <div class="p-2 ">
              <button class="btn btn-lg btn-<?php echo $active; ?>  pl-3 pr-3" onclick="selectTable('<?php echo $r['number']; ?>')" >
                <small> <?php echo $r['number']; ?> </small>
              </button>   
        </div>
        <?php  }?>
        </div>

      </div>
      </div>
      <hr>
          <small class="text-c p-2 pl-4 "> 
            <h6 class="badge bg-danger badge-lg text-danger mr-1">#</h6>  Ocupado 
            <h6 class="badge bg-success ml-4 text-success mr-1">#</h6>  Desocupado

          </small>
      </div>

    </div>
  </div>
</div>