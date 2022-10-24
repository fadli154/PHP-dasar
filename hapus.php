<?php

require "function.php";

$nisn = $_GET["nisn"];

mysqli_query($conn, "DELETE FROM data_peserta_didik WHERE nisn = $nisn");

header("Location: index.php");
?>