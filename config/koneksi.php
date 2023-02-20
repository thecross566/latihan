<?php
try {
    $filename = file_exists("config/DB/config.json") ? "config/DB/config.json" : "../config/DB/config.json";
    $configJSON = json_decode(file_get_contents($filename));
    $DB = $configJSON->DB;
    if ($DB->host == "") {
?>
        <meta http-equiv="refresh" content="0; url=setup-DB.php">
    <?php
    } else {

        $koneksi = new mysqli("$DB->host", "$DB->username", $DB->password);
        var_dump($koneksi);
    }
} catch (\Throwable $th) {
    ?>
    <meta http-equiv="refresh" content="0; url=setup-DB.php">
<?php
}
