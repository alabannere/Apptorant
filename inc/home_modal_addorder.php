<!-- Modal Add modalSelectType-->
<div class="modal fade" id="modalAddOrder" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content bg-s">

      <div class="modal-body row text-center">

<div class="col-7">

<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-dark btn-sm active">
    <input type="radio" name="pay_type" id="Efectivo" autocomplete="off" checked>
		<i class="fa fa-money-bill-alt"></i><br>
		<small>Efectivo</small>
  </label>
  <label class="btn btn-dark btn-sm">
    <input type="radio" name="pay_type" id="Credito" autocomplete="off">
		<i class="fa fa-credit-card"></i><br>
		<small>Credito</small>    
  </label>
  <label class="btn btn-dark btn-sm">
    <input type="radio" name="pay_type" id="Debito" autocomplete="off">
  		<i class="fa fa-id-card"></i><br>
  		<small>Debito</small>    
  </label>
</div>


</div>

<div class="col-5">
	<div id="ticket" class="ticket-hide bg-white"></div>

</div>
<input type="hidden" id="addOrderDate">

<input type="hidden" id="addOrderOrder" name="order">
<input type="hidden" id="addOrderTotal" name="total">
<input type="hidden" id="addOrderType" name="type"> 
<input type="hidden" id="addOrderTable" name="table">
<input type="hidden" id="addOrderIdClient" name="client">
<input type="hidden" id="addOrderIdUser" name="user">

</div>



<div class="modal-footer p-2 border-dark">
<div class="mr-auto">
<div class="text-left pl-2">
    <h4 class="text-white "> $<span id="addOrderTotalView">00.00</span> </h4>  
</div>
</div>

<div class="text-right pr-2">

      	<button onclick="setOrder()" class="btn btn-sm btn-dark text-white">
      		<i class="fa fa-save"></i>
      		<small> Guardar</small>
      	</button>

      	<button class="btn btn-sm btn-success text-white ml-2 oculto-impresion" 
      	onclick="printTicket()">
      		<i class="fa fa-print"></i>
      		<small> Imprimir y guardar</small>
      	</button>
</div>
</div>


    </div>
  </div>
</div>

<script type="text/javascript">
date();	
  function date() {
    var currentTime = new Date(),
        month = currentTime.getMonth() + 1,
        day = currentTime.getDate(),
        year = currentTime.getFullYear(),
        hours = currentTime.getHours(),
        minutes = currentTime.getMinutes(),
        seconds = currentTime.getSeconds(),
        dma_hms = (day + "/" + month + "/" + year + ' ' + hours + ':' + minutes + ':' + seconds);
        document.getElementById('addOrderDate').value = dma_hms;
  }


</script>




<script>
      function setOrder(){
        $('#modalAddOrder').modal('hide');
        var order = JSON.parse(localStorage.getItem("order"));
        var order_type = localStorage.getItem("order_type")
        var order_total = localStorage.getItem("order_total");
        var order_table = localStorage.getItem("order_table");


          $.ajax({
            type: 'POST',
            url: './inc/action.php?act=setOrder',
            data: {
              "type": order_type, 
              "table": order_table, 
              "order": order, 
              "total": order_total
            },
            success: function (data) {
                clearList();
                page('_orders');
            }
          });

       };
</script>