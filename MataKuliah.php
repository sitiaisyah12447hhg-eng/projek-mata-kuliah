<?php
class MataKuliah {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Menampilkan semua data mata kuliah
    public function getAll() {
        $stmt = $this->db->query(
            "SELECT * FROM mata_kuliah ORDER BY IdMataKuliah DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil data berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM mata_kuliah WHERE IdMataKuliah = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan data baru
    public function create($d) {
        $sql = "INSERT INTO mata_kuliah
        (KodeMataKuliah, NamaMataKuliah, ProgramStudi, Semester, SKS, Status)
        VALUES (:kode, :nama, :prodi, :smt, :sks, :status)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':kode' => $d['kode'],
            ':nama' => $d['nama'],
            ':prodi' => $d['prodi'],
            ':smt' => $d['smt'],
            ':sks' => $d['sks'],
            ':status' => $d['status']
        ]);
    }

    // Mengubah data
    public function update($id, $d) {
        $sql = "UPDATE mata_kuliah SET
        KodeMataKuliah = :kode,
        NamaMataKuliah = :nama,
        ProgramStudi = :prodi,
        Semester = :smt,
        SKS = :sks,
        Status = :status
        WHERE IdMataKuliah = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':kode' => $d['kode'],
            ':nama' => $d['nama'],
            ':prodi' => $d['prodi'],
            ':smt' => $d['smt'],
            ':sks' => $d['sks'],
            ':status' => $d['status']
        ]);
    }

    // Menghapus data
    public function delete($id) {
        $stmt = $this->db->prepare(
            "DELETE FROM mata_kuliah WHERE IdMataKuliah = ?"
        );
        return $stmt->execute([$id]);
    }
}
?>