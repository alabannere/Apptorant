<!-- Modal -->
<div class="modal fade" id="modal-calification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Calificar este usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<style type="text/css">
.star-rating i:hover,
.star-rating i.active {
    color: orange;
    font-size: 45px;
}

.star-rating i {
    color: lightgray;
    font-size: 45px;
    cursor: default;
    text-decoration: none;
    line-height: 45px;
}
.star-rating {
    padding: 2px;
}
</style>

<form id="ratingForm" method="POST" action="./inc/action.php?act=set_rating">  
<div class="container">
  <span id="rateMe2"  class="empty-stars"></span>
</div>


    <div class="form-group text-center">

        <div class="star-rating">
        <i class="fa fa-star">
        <i class="fa fa-star">
        <i class="fa fa-star">
        <i class="fa fa-star">
        <i class="fa fa-star"></i></i> </i> </i> </i> 
        </div>

        <small class="show-result mt-2">Seleccione una calificacion.</small>

        <input type="hidden" class="form-control" id="rating" name="rating" value="1">
        <input type="hidden" class="form-control" id="a_uid" name="a_uid" value="1">
        <input type="hidden" class="form-control" id="b_uid" name="b_uid" value="2">

    </div>    

    <div class="form-group">
        <label for="comment">Comentario*</label>
        <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
    </div>
     
</div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-warning" id="saveReview" >Enviar calificacion</button>
      </div>
</form>


    </div>
  </div>
</div>


<!-- //Modal Nuevo ingreso -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">

    $("div.star-rating > i").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.text-warning').removeClass('text-warning');

    $(e.target).parentsUntil("div").addClass('text-warning'); // all elements up from the clicked one excluding self
    $(e.target).addClass('text-warning');  // the element user has clicked on


        var numStars = $(e.target).parentsUntil("div").length+1;
        $('.show-result').text(numStars + (numStars == 1 ? " estrella" : " estrellas!"));
        $('#rating').val(numStars);

        
    });



    $('#ratingForm').on('submit', function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
    type : 'POST',
    url : './inc/action.php?act=set_rating',
    data : formData,
    success:function(response){
    $("#ratingForm")[0].reset();
    window.setTimeout(function(){window.location.reload()},1000)
    }
    });
    });
</script>


<?php echo mod('footer') ?>
