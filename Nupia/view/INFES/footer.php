</div>
<script type="text/javascript" src="../view/js/materialize.min.js"></script>
<script type="text/javascript" src="../view/js/jquery.js"></script>
<script>
  $(window).on('load', function() {
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(5).fadeOut('slow');
    $('body').delay(5).css({
      'overflow': 'visible'
    });
  })
  M.AutoInit();
  $(document).ready(function() {
    $('#load').hide();
    if ($(document).width() <= 992) {
      $('#home').hide();
      $('#eixos').hide();
      $('#projetos').hide();
      $('#cadastra').hide();
      $('#pesquisa').hide();
      $('#pesquisaIco').hide();
    }
    $('.sidenav').sidenav();
    M.updateTextFields();
  });
  $('#filtros').click(function() {
    $('#shaco').toggle();
  });
</script>
</body>

</html>