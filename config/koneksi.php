<?php
$filename = "config/DB/config.json";
$configJSON = json_decode(file_get_contents($filename));
$DB = $configJSON->DB;
$koneksi = new mysqli($DB->host, $DB->username, $DB->password, $DB->name_db);
if ($koneksi->connect_errno) {
?>
<meta http-equiv="refresh" content="0; url=setup-DB.php">
<?php
}
?>