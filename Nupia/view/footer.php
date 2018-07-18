</div>
<script type="text/javascript" src="view/js/materialize.min.js"></script>
<script type="text/javascript" src="view/js/jquery.js"></script>
<script>
  $(window).on('load', function() {
    $('#pesquisar').focus();
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(5).fadeOut('slow');
    $('body').delay(5).css({
      'overflow': 'visible'
    });
  })
  M.AutoInit();
  $(document).ready(function() {
    $('#search').click(function() {
      $('#searchInput').focus();
    });
    if ($(document).width() <= 992) {
      $('#nav-mobile').hide();
    }
    $('#load').hide();
    $(window).on('resize', function() {
      if ($(document).width() <= 992) {
        $('#nav-mobile').hide();
      } else {
        $('#nav-mobile').show();
      }
    });
    M.updateTextFields();
  });
</script>
</body>

</html>