


<center>
<div id="contenu" style=" background: rgba(221, 220, 220, 0.5); width: 1000px; border-style: solid;
border-radius: 10px;">
<br />

<?php
session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit();
?>

<br />
<br />
</div>
</center>
</body>
<br />
<br /><br />
<br /><br />
<br />


</html>