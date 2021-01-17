<!--Para cerrar sesion-->
<script type="text/javascript">
  $(document).ready(function () {
    $("#btn-cerrar-session").click(function (e) { 
      e.preventDefault();
      
      $.ajax({
        type: "POST",
        url: "asset/php/sesion/cerrar_sesion.php",
        success: function (response) {
          $(location).attr("href", "index.php");
        }
      });
    });
  });
</script>