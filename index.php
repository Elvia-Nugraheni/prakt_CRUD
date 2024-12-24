<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after the redirect
}
?>

<style type="text/css">
    .header{
        background-color: salmon;
    }
</style>
<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC");
?>

<html>
<head>    
    <title>Sim Rs</title>
</head>
<body>
    <h1>Data Kalibrasi Alkes Elvia</h1>
    <a href="add.php" style="background-color: #C3F392; color: black; padding: 1px 1px; text-decoration: none; border-radius: 15px;">Tambah Alat</a>
    <a href="logout.php" style="background-color: yellow; color: red; padding: 1px 1px; text-decoration: none; border-radius: 15px;">Logout</a>
    <table>

<body>
    


    <table width='90%' border=1>

    <tr class="header">
         <th>No</th><th>Nama Alat</th> <th>Tahun</th> <th>Merek</th> <th>type</th> <th>no_seri</th> <th>Lokasi</th> <th>Aksi</th>
    </tr>
    <?php  
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['nama_alat']."</td>";
        echo "<td>".$user_data['tahun']."</td>";
        echo "<td>".$user_data['merek']."</td>";  
        echo "<td>".$user_data['type']."</td>"; 
        echo "<td>".$user_data['no_seri']."</td>";   
        echo "<td>".$user_data['lokasi']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>"; 
        $i++;       
    }
    ?>
    </table>
</body>
</html>