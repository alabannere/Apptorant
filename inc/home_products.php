<?php  
  session_start();
  include '../config-site.php';
  include "functions.php"; 
?>

<?php 

  if (isset($_GET['category'])) {
      $category = $_GET['category'];
  }
?>


<?php 
    foreach(getProducts($category) as $r){
?>
<a onclick="addItem('<?php echo $r['ID']; ?>', '<?php echo $r['name']; ?>', '<?php echo $r['price']; ?>')" data-filter-item data-filter-name="<?php echo strtolower($r['name']); ?>" class="col-md-3 product_box animated fadeIn" href="#" >
  <figure class="card hover border-0">
      <img class="w-100" src="<?php echo $r['image'] ?>">

       <div class="price card-img-overlay bg-p shadow-sm p-1 pr-2">
          <h6 class="text-white ">$<?php echo $r['price'] ?></h6>
       </div> 

    <div class="bg-danger p-1 text-center text-white">
        <small><?php echo $r['name'] ?></small>
    </div>    
  </figure>
</a> <!-- col // -->      
<?php 
    }
?>


<script>

$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready  

$(".hover").hover(
  function() {
    $(this).addClass('shadow-lg').css('cursor', 'pointer'); 
  }, function() {
    $(this).removeClass('shadow-lg');
  }
);
  



// document ready  
});




</script>