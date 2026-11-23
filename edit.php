<?php
$id = (int)($mk['IdMataKuliah'] ?? 0);
$kode = htmlspecialchars($mk['KodeMataKuliah'] ?? '', ENT_QUOTES, 'UTF-8');
$nama = htmlspecialchars($mk['NamaMataKuliah'] ?? '', ENT_QUOTES, 'UTF-8');
$prodi = $mk['ProgramStudi'] ?? '';
$semester = (int)($mk['Semester'] ?? 1);
$sks = (int)($mk['SKS'] ?? 1);
$status = $mk['Status'] ?? 'Aktif';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>

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

        h2 { color: #1e3a8a; }

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

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>Edit Data Mata Kuliah</h2>

    <form method="POST"
          action="index.php?action=edit&id=<?= $id ?>">

        <label>Kode Mata Kuliah</label>
        <input type="text" name="kode"
               value="<?= $kode ?>" required>

        <label>Nama Mata Kuliah</label>
        <input type="text" name="nama"
               value="<?= $nama ?>" required>

        <label>Program Studi</label>
        <select name="prodi" required>
            <option value="D3 Komputerisasi Akuntansi"
                <?= $prodi == 'D3 Komputerisasi Akuntansi' ? 'selected' : '' ?>>
                D3 Komputerisasi Akuntansi
            </option>

            <option value="S1 Sistem Informasi"
                <?= $prodi == 'S1 Sistem Informasi' ? 'selected' : '' ?>>
                S1 Sistem Informasi
            </option>

            <option value="S1 Rekayasa Perangkat Lunak"
                <?= $prodi == 'S1 Rekayasa Perangkat Lunak' ? 'selected' : '' ?>>
                S1 Rekayasa Perangkat Lunak
            </option>
        </select>

        <label>Semester</label>
        <input type="number" name="smt"
               min="1" max="8"
               value="<?= $semester ?>" required>

        <label>SKS</label>
        <input type="number" name="sks"
               min="1" max="6"
               value="<?= $sks ?>" required>

        <label>Status</label>
        <select name="status">
            <option value="Aktif"
                <?= $status == 'Aktif' ? 'selected' : '' ?>>
                Aktif
            </option>

            <option value="Tidak Aktif"
                <?= $status == 'Tidak Aktif' ? 'selected' : '' ?>>
                Tidak Aktif
            </option>
        </select>

        <button type="submit">Update Data</button>
        <a href="index.php">Kembali</a>

    </form>

</div>
</body>
</html>