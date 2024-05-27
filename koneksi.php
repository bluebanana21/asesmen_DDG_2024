<?php
$koneksi = new mysqli('localhost', 'root', '', 'aas_ddg');

if ($koneksi) {

} else {
    echo $koneksi->error;
}
?>