<?php

class MataKuliahController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Menampilkan seluruh data
    public function index() {
        $mata_kuliah = $this->model->getAll();
        include 'views/index.php';
    }

    // Menambahkan data
    public function create() {
        $prodi = '';
        $status = 'Aktif';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => trim($_POST['kode'] ?? ''),
                'nama' => trim($_POST['nama'] ?? ''),
                'prodi' => $_POST['prodi'] ?? '',
                'smt' => (int) ($_POST['smt'] ?? 0),
                'sks' => (int) ($_POST['sks'] ?? 0),
                'status' => $_POST['status'] ?? 'Aktif'
            ];

            $this->model->create($data);

            header('Location: index.php?msg=created');
            exit;
        }

        include 'views/create.php';
    }

    // Mengedit data
    public function edit() {
        $id = (int) ($_GET['id'] ?? 0);
        $mk = $this->model->getById($id);

        if (!$mk) {
            header('Location: index.php');
            exit;
        }

        $prodi = $mk['ProgramStudi'];
        $status = $mk['Status'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => trim($_POST['kode'] ?? ''),
                'nama' => trim($_POST['nama'] ?? ''),
                'prodi' => $_POST['prodi'] ?? '',
                'smt' => (int) ($_POST['smt'] ?? 0),
                'sks' => (int) ($_POST['sks'] ?? 0),
                'status' => $_POST['status'] ?? 'Aktif'
            ];

            $this->model->update($id, $data);

            header('Location: index.php?msg=updated');
            exit;
        }

        include 'views/edit.php';
    }

    // Menghapus data
    public function delete() {
        $id = (int) ($_GET['id'] ?? 0);

        if ($id > 0) {
            $this->model->delete($id);
        }

        header('Location: index.php?msg=deleted');
        exit;
    }
}
?>