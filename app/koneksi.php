<?php
$koneksi = new mysqli('localhost', 'root', '', 'aas_ddg');

if ($koneksi) {
    echo "connection succesfull";
} else {
    echo $koneksi->error;
}
?>