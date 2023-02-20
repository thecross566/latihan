<?php
$file = "../config/DB/config.json";
$configJSON = json_decode(file_get_contents($file));
$DB = $configJSON->DB;

try {
  // GET POST
  $username = $_POST['username'];
  $password = $_POST['password'];
  $host = $_POST['host'];
  $name = $_POST['DB'];

  $DB->host = $host;
  $DB->username = $username;
  $DB->password = $password;
  $DB->name_db = $name;



  $koneksiCreate = new mysqli($host, $username, $password);
  if ($koneksiCreate->connect_errno) {
?>
<script>
alert("PASTIKAN host username dan password sudah sesuai dengan server mysql")
</script>
<meta http-equiv="refresh" content="0; url=../setup-DB.php">
<?php
    exit;
  }
  $query = $koneksiCreate->query("CREATE DATABASE IF NOT EXISTS $name ;");
  if ($query) {
    $koneksiCreate->select_db($name);
    $queryQ = "CREATE TABLE IF NOT EXISTS `user` (
    id VARCHAR(100) PRIMARY KEY NOT NULL,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    level CHAR(1) NOT NULL,
    id_petugas VARCHAR(100) NOT NULL UNIQUE);
    
    CREATE TABLE IF NOT EXISTS `guru` (
    `id` VARCHAR(100) PRIMARY KEY NOT NULL,
    `nip` INT(11) NOT NULL UNIQUE,
    `nama` VARCHAR(50) NOT NULL,
    `jenis_kelamin` CHAR(1) NOT NULL,
    `alamat` TEXT NOT NULL,
    `tanggal_lahir` DATE NOT NULL,
    `is_active` CHAR(1) NOT NULL);
    
    CREATE TABLE IF NOT EXISTS  `siswa` (
    `id` VARCHAR(100) PRIMARY KEY NOT NULL,
    `nama` VARCHAR(50) NOT NULL,
    `jenis_kelamin` CHAR(1) NOT NULL,
    `alamat` TEXT NOT NULL,
    `kontak` VARCHAR(255) NOT NULL,
    `tanggal_lahir` DATE NOT NULL,
    `id_kelas` VARCHAR(100) NOT NULL);
    
    CREATE TABLE IF NOT EXISTS `kelas` (
    id VARCHAR(100) PRIMARY KEY NOT NULL,
    nama_kelas VARCHAR(50) NOT NULL,
    guru_id VARCHAR(100) NOT NULL);
    
    CREATE TABLE IF NOT EXISTS iuran_sekolah (
    id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    jumlah INT(11) NOT NULL,
    siswa_id VARCHAR(100) NOT NULL,
    tanggal_pembayaran DATE NOT NULL,
    guru_id VARCHAR(100) NOT NULL,
    status VARCHAR NOT NULL DEFAULT 'Wait');
    
    ALTER TABLE `user` ADD CONSTRAINT user_id_petugas_guru_id FOREIGN KEY (id_petugas) REFERENCES guru(id);
    ALTER TABLE `siswa` ADD CONSTRAINT siswa_id_kelas_kelas_id FOREIGN KEY (id_kelas) REFERENCES kelas(id);
    ALTER TABLE `kelas` ADD CONSTRAINT kelas_guru_id_guru_id FOREIGN KEY (guru_id) REFERENCES guru(id);
    ALTER TABLE `iuran_sekolah` ADD CONSTRAINT iuran_sekolah_siswa_id_siswa_id FOREIGN KEY (siswa_id) REFERENCES siswa(id);
    ALTER TABLE `iuran_sekolah` ADD CONSTRAINT iuran_sekolah_guru_id_guru_id FOREIGN KEY (guru_id) REFERENCES guru(id);";





    $res = $koneksiCreate->multi_query($queryQ) or die($koneksiCreate->error);
    // var_dump($res);
    if ($res) {
      // SEND TO JSON
      file_put_contents($file, json_encode($configJSON));
    ?>
<meta http-equiv="refresh" content="0; url=../index.php">
<?php
    }
  }
} catch (\Throwable $th) {
  ?>
<script>
alert("PASTIKAN host username dan password sudah sesuai dengan server mysql")
</script>
<meta http-equiv="refresh" content="0; url=../setup-DB.php">
<?php

}