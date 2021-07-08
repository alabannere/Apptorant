  <!-- Footer -->

  <footer class="pt-2 pb-2 fixed-bottom shadow">

    <div id="btn_menu_admin" class=" text-left pl-4"> 
      <button  type="button" data-toggle="collapse" data-target="#header" aria-controls="header" aria-expanded="false" 
      class="btn btn-sm btn-light shadow position-absolute">
        <small>Admin</small>
      </button>
    </div> 

    <div class="text-right pr-4"> 
        <small class="text-dark text-capitalize">
          <i class="fa fa-user"></i>  <?php echo $_SESSION["username"]; ?>
        </small> 

        <small class="ml-5 text-dark">
          <i class="fa fa-calendar-alt"></i>  <span class="text-dark" id="day">00/00</span>
        </small> 

        <small class="ml-5 text-dark">
          <i class="fa fa-clock"></i>  <span class="" id="hour">00:00</span>
        </small> 
  </div>    
  </footer>


  <script src="assets/js/app.js"></script>
  <!-- jQuery, then Popper.js, then Bootstrap JS -->
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="assets/js/printThis/printThis.js"></script>
  <script>  
    menuAdminView();         
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- el bundle ya incluye el popper -->

</body>
</html>
  