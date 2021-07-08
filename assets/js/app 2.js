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
        document.getElementById('day').innerHTML = d;
        document.getElementById('hour').innerHTML = h;
        document.getElementById('addOrderDate').value = 'dsdsd';
  }



