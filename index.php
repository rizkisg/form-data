<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    
    <!-- Form untuk input data -->
    <form action="form.php" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea name="alamat" rows="3" required></textarea><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" name="no_hp" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" name="submit" value="Simpan">
    </form>

    <br>

    <?php
    // Proses menyimpan data ke dalam file CSV
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];

        // Nama file CSV
        $file_csv = "data_mahasiswa.csv";

        // Cek jika file tidak ada, tambahkan header
        if (!file_exists($file_csv)) {
            $header = ["NIM", "Nama", "Jenis Kelamin", "Alamat", "No HP", "Email"];
            $handle = fopen($file_csv, "w");
            fputcsv($handle, $header);
        } else {
            $handle = fopen($file_csv, "a");
        }

        // Menyimpan data ke dalam file CSV
        $data = [$nim, $nama, $jenis_kelamin, $alamat, $no_hp, $email];
        fputcsv($handle, $data);
        fclose($handle);

        echo "<p>Data berhasil disimpan!</p>";
    }
    ?>

    <!-- Link untuk mendownload file CSV -->
    <p><a href="data_mahasiswa.csv" download>Download File CSV</a></p>
</body>
</html>
