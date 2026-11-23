<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #1e3a8a;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }

        .radio {
            width: auto;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Tambah Mata Kuliah</h2>

    <form method="POST" action="index.php?action=create">

        <label>Kode Mata Kuliah</label>
        <input type="text" name="kode"
               placeholder="Contoh: SKA-0309" required>

        <label>Nama Mata Kuliah</label>
        <input type="text" name="nama"
               placeholder="Masukkan nama mata kuliah" required>

        <label>Program Studi</label>
        <select name="prodi" required>
            <option value="">-- Pilih Program Studi --</option>
            <option value="D3 Komputerisasi Akuntansi">
                D3 Komputerisasi Akuntansi
            </option>
            <option value="S1 Sistem Informasi">
                S1 Sistem Informasi
            </option>
            <option value="S1 Rekayasa Perangkat Lunak">
                S1 Rekayasa Perangkat Lunak
            </option>
        </select>

        <label>Semester</label>
        <input type="number" name="smt"
               min="1" max="8" required>

        <label>SKS</label>
        <input type="number" name="sks"
               min="1" max="6" required>

        <label>Status Mata Kuliah</label>

        <input class="radio" type="radio"
               name="status" value="Aktif"
               checked required>
        Aktif

        <input class="radio" type="radio"
               name="status" value="Tidak Aktif">
        Tidak Aktif

        <br>

        <button type="submit">Simpan Data</button>

        <a href="index.php">Kembali</a>

    </form>

</div>

</body>
</html>