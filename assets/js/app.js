// INICIO //////////////
/////////////////////////





// GENERAL //////////////
/////////////////////////

function goBack() {
  window.history.back();
}

function spin(is){
  if(is == true){
    $('body').toggleClass('loading')
  }else{
    $('body').removeClass('loading')
  }
}

function Anim(elementId, animClasses) {
    $(elementId).addClass(animClasses);
    setTimeout( function(){
        $(elementId).removeClass(animClasses)},
        1300
    );
}

function snack(text) {

  var x = $('#snackbar'); 
          $('#snackbar').html(text);
  x.addClass("show");
  setTimeout(function(){ x.removeClass("show"); }, 3000);
}



  function clockTick() {
    var currentTime = new Date(),
        month = currentTime.getMonth() + 1,
        day = currentTime.getDate(),
        year = currentTime.getFullYear(),
        hours = currentTime.getHours(),
        minutes = currentTime.getMinutes(),
        seconds = currentTime.getSeconds(),
        dma_hms = (day + "/" + month + "/" + year + ' ' + hours + ':' + minutes + ':' + seconds);
        d = (day + "/" + month);
        h = (hours + ':' + minutes);
        amd = (year + "-" + month + "-" + day);

        document.getElementById('day').innerHTML = d;
        document.getElementById('hour').innerHTML = h;
        document.getElementById('addOrderDate').value = dma_hms;
        document.getElementById('date_amd').value = amd;

  }





// APP //////////////
/////////////////////////

function initAll(){

  var user_name = localStorage.getItem("user_name");  

  if (user_name) {
    $('#user-name').html(user_name);            
  }else{
    $('#modalSelectUser').modal('show',{backdrop: 'static', keyboard: false})
  }


  var cart_title = localStorage.getItem("cart_title");  
  var cart_title_right = localStorage.getItem("cart_title_right");

  if(cart_title_right){
    $('#cart-title').html(cart_title);        
    $('#cart-title-right').html(cart_title_right); 

  }else{
    $('#cart-title').html('');            
    localStorage.setItem('cart_title_right',`
      <button class="btn btn-transparent text-white" onclick="$('#modalSelectType').modal('show')">
        <i class="fa fa-plus"></i> 
      </button>
    `);     
    $('#cart-title-right').html(cart_title_right);    
  }
}




function modalSelectUser(){
  $('#modalSelectUser').modal('show',{backdrop: 'static', keyboard: false});
}

function selUser(id, name) {
  $('#changeuser_uid').val(id);
  $('#changeuser_name_title').html(name);
  $('#changeuser_name').val(name);
  $('#users_content').addClass('collapse');
  $('#code_content').removeClass('collapse');
}

function selUserBack() {

  $('#changeuser_uid').val('');
  $('#changeuser_name_title').html('');
  $('#changeuser_name').val(''); 
  $('#changeuser_code').val(''); 
  $('#users_content').removeClass('collapse');
  $('#code_content').addClass('collapse');  
}

function loginuser() {
  spin(true);
  var uid = $('#changeuser_uid').val();
  var code = $('#changeuser_code').val();
  var name = $('#changeuser_name').val();

  $( "#ticket" ).load( "./inc/chek_user.php", { uid: uid, code: code }, function(data) {
      if(data === 'ok'){
          selUserBack();
          spin(false);
          localStorage.setItem("user_name", name);
          localStorage.setItem("user_id", uid);
          $('#user-name').html(localStorage.getItem("user_name"));     
          menuAdminView();         
          $('#modalSelectUser').modal('hide');
          snack('Cambio de usuario ' + '('+name+')');
      }else{
          spin(false);
          snack('Codigo incorrecto');
          $('#changeuser_code').val(''); 
          
      }
    }
  );




}




function menuAdminView(){
  if(localStorage.getItem("user_name") === 'Admin'){
    $('#btn_menu_admin').removeClass('collapse');
  }else{
    $('#btn_menu_admin').addClass('collapse');
  }
}  





function getList(){
  if(!localStorage.getItem("order")){

    localStorage.setItem("order_total", parseFloat(0.00).toFixed(3));
    $('#total').html(parseFloat(0.00).toFixed(3));          
    $('#order').html('');          
    $('#cart-title').html('');          

  }else{
    
    $('#total').html(JSON.parse(localStorage.getItem("order_total")));    

    var order = JSON.parse(localStorage.getItem("order"));

    var item = '';

    for (var i in order) {
          item += `
    

          <div id="item-`+order[i].id+`" class="bg-danger mb-1">
            <div class="row m-0"> 

              <div class="p-0 bg-dark" style="width:30px;">    
                <button class="btn btn-sm btn-dark text-white" onclick="qtyItem('up',`+i+`, `+order[i].qty+`, `+order[i].price+`)">
                  <i class="fa fa-chevron-up"></i>
                </button> 
                <button class="btn btn-sm btn-dark text-white" onclick="qtyItem('down',`+i+`, `+order[i].qty+`, `+order[i].price+`)">
                  <i class="fa fa-chevron-down"></i>
                </button>                
              </div>  

            <div class="row m-0" style="width:260px;">
              <small class="col-8 text-left m-0 pl-2 pt-2"> <strong> <span class="badge bg-p">`+order[i].qty+`</span>
</strong> `+order[i].name+`</small>

           
              <div class="col-4 p-0 text-right ">    
                <button class="btn btn-sm text-white" onclick="removeItem(`+i+`, `+order[i].id+`, `+order[i].price+`)">
                  <i class="fa fa-times"></i>
                </button>  
              </div> 
              <span class="col-12 text-right m-0 p-0 mb-2">$`+order[i].price+`</span>   

            </div>
          </div>

 
        </div>`;
    }

       document.getElementById("order").innerHTML = item;


  }
}




function addItem(id, name, price){

        var order = JSON.parse(localStorage.getItem("order"));
        var order_type = localStorage.getItem("order_type")

        if(!order.length && !order_type){ 
           order = []; 
            //muestra modal para indecar si es delivery o salon, si es delivery agrega direccion y busca si existe el cliente si es salon selecciona el numero de mesa.
            $('#modalSelectType').modal('show');

            addItemFinish(id, name, price);

        }else{

          var exist = order.filter(d => d.id === id);
           if(exist.length === 1){
              //Ya existe
              Anim('#item-'+id, 'animated shake');

            }else{
              //No existe y lo agrega
              addItemFinish(id, name, price);

            }
        }
}




function addItemFinish(id, name, price) {

      var order = JSON.parse(localStorage.getItem("order"));
      var order_total = parseFloat(localStorage.getItem("order_total")) + parseFloat(price);
      order_total = order_total.toFixed(3)
      localStorage.setItem("order_total", order_total);     
      
      var item = { 'id': id, 'name': name, 'price': price, 'qty': 1 };               
      order.push( item );
      localStorage.setItem("order", JSON.stringify(order)); 

      getList();
            Anim('#item-'+id, 'animated bounceInRight');
}







function selectSalon() {
    localStorage.setItem("order_type",'salon');
    $('#modalSelectType').modal('hide');
    $('#modalSalon').modal('show');    
}






function selectTable(table){

    localStorage.setItem("order_table",table);
    localStorage.setItem('cart_title','<strong class="text-white">Mesa '+table+'</strong>'); 

    localStorage.setItem('cart_title_right',`<button class="btn btn-transparent text-white" onclick="$('#modalSelectType').modal('show')"> <i class="fa fa-exchange-alt"></i> </button>`); 

    $('#cart-title').html(localStorage.getItem("cart_title")); 
    $('#cart-title-right').html(localStorage.getItem("cart_title_right"));    


    $('#modalSalon').modal('hide');  
}



function clearList(){
  snack('Se elimino la lista completa.');
  //localStorage.removeItem("list");     
  localStorage.setItem("order",'[]');        
  localStorage.setItem("order_total", 0.00);
  localStorage.setItem('order_type','');
  localStorage.setItem('order_table','');

  localStorage.setItem('cart_title','');
  $('#cart-title').html(''); 

  localStorage.setItem('cart_title_right',`
    <button class="btn btn-transparent text-white" onclick="$('#modalSelectType').modal('show')">
      <i class="fa fa-plus"></i> 
    </button>
  `);   
  $('#cart-title-right').html(localStorage.getItem("cart_title_right"));    
  getList();
}





function qtyItem(e, index, qty, price) {


    var array = JSON.parse(localStorage.getItem("order"));

if(e === 'up'){

    var newQty = qty + 1;
    array[index].qty = newQty;  
    var val = parseFloat(price) / qty * newQty; 
    array[index].price = val;  
    var order_total = parseFloat(localStorage.getItem("order_total")) + val - price;


}else{

  if(e === 'down' && qty !== 1){
      array[index].qty = qty - 1;  
      var val = parseFloat(price) / qty; 

      array[index].price = parseFloat(price) - val ;  
      var order_total = parseFloat(localStorage.getItem("order_total")) - val;
  }

 
}

    localStorage.setItem("order", JSON.stringify(array));   
    order_total = order_total.toFixed(3)
    localStorage.setItem("order_total", order_total);  
    getList();




}







function removeItem(index, id, price) {
    
    Anim('#item-'+id, 'animated bounceOutRight');


    var array = JSON.parse(localStorage.getItem("order"));
    array.splice(index, 1);

    var order_total = parseFloat(localStorage.getItem("order_total")) - parseFloat(price);
    order_total = order_total.toFixed(2)

    localStorage.setItem("order_total", order_total);      
    localStorage.setItem("order", JSON.stringify(array)); 

    var wait = window.setTimeout( function(){getList();},400);

    
}
//  for (var i = 0; i < array.length; i++) {

function addOrder(){

  var order = JSON.parse(localStorage.getItem("order"));
  var order_type = localStorage.getItem("order_type")
  var order_total = localStorage.getItem("order_total");
  var order_table = localStorage.getItem("order_table");


  if(order.length && order_type){ 

      $('#addOrderOrder').val(localStorage.getItem("order"));
      $('#addOrderType').val(order_type);
      $('#addOrderTotal').val(order_total);
      $('#addOrderTotalView').html(order_total);

      $('#addOrderTable').val(order_table);

      $('#addOrderIdClient').val('1');
      $('#addOrderIdUser').val('1');

      $( "#ticket" ).load( "./inc/ticket.php", { 
        logo: 'http://192.168.64.2/apptorant/assets/images/laroti.png', 
        title: 'La roti', 
        user: localStorage.getItem("user_name"),
        address: 'Buenos Aires, Argentina',
        date: $('#addOrderDate').val(),
        message_line1: '¡Gracias por tu compra!',
        message_line2: 'La roti',
        order: order,
        total: order_total

        }, function() {}
      );


      $('#modalAddOrder').modal('show');




  }else{
      snack('No hay productos en la lista.');
  }

}







function printTicket() {
    $('#ticket').printThis();
}








