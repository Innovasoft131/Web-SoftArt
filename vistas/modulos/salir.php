<?php
session_destroy();

$url = Ruta::ctrRutaWeb();

echo '<script>
        window.location = "'.$url.'";
      </script>';
?>