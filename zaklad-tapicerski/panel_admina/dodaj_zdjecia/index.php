<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=ISO8859-2">
<title>SendFileToServer-LinkToMySQL</title>
</head>

<body>
<form action="dodaj.php" method="post" enctype="multipart/form-data"  name="form1">
<p align="center">Wysyłanie plików na serwer. </p>
<table width="422" border="1" align="center" bordercolor="#0000FF" bgcolor="#C0C0C0">
  <tr>
    <th width="444" scope="row"><input name="plik" type="file" size="50"/>
      <input name="max_file_size" type="hidden" value="1048576" /></th>
  </tr>
  <tr>
    <th scope="row"><input value="Wyślij plik" type="submit" /> </th>
  </tr>
  </table>
</form>
</body>
</html>