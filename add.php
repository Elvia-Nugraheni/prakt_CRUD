<html>
<head>
    <title>Add Alat</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
<p>Belajar Pemrograman Web</p>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Alat</td>
                <td><input type="text" name="nama_alat"></td>
            </tr>
            <tr> 
                <td>Tahun</td>
                <td><input type="text" name="tahun"></td>
            </tr>
            <tr> 
                <td>Merek</td>
                <td><input type="text" name="merek"></td>
            </tr>
            <tr> 
                <td>type</td>
                <td><input type="text" name="type"></td>
            </tr>
            <tr> 
                <td>no_seri</td>
                <td><input type="text" name="no_seri"></td>
            </tr>
             <tr> 
                <td>Lokasi</td>
                <td><input type="text" name="lokasi"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_alat= $_POST['nama_alat'];
        $tahun = $_POST['tahun'];
        $merek= $_POST['merek'];
        $type= $_POST['type'];
        $no_seri= $_POST['no_seri'];
        $lokasi = $_POST['lokasi'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO alat(nama_alat,tahun,merek,type,no_seri,lokasi) VALUES('$nama_alat','$tahun','$merek','$type','$no_seri','$lokasi')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Alat</a>";
    }
    ?>
</body>
</html>