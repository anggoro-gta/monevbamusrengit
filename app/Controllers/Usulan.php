<?php

namespace App\Controllers;

use Myth\Auth\Password;
use App\Models\tbusulanmusrenModel;

class Usulan extends BaseController
{
    protected $usulanModel;

    public function __construct()
    {
        $this->usulanModel = new tbusulanmusrenModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Data Usulan'
        ];

        return view('usulan/index', $data);
    }

    public function datatable()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['data'=>[]]);
        }

        $opdId = user()->kode_user;
        $tahun = session('years');           // pastikan sudah dipilih
        if (!$tahun) {
            return $this->response->setJSON(['data'=>[]]);
        }

        // Ambil data dari model kamu
        $rows = $this->usulanModel->getusulanbyopd($opdId, $tahun);

        // Bentuk array untuk DataTables (paling gampang: array of arrays)
        $data = [];
        $no = 1;
        foreach ($rows as $r) {
            $data[] = [
                'id'        => (int)($r['id'] ?? 0),
                'id_usulan' => $r['id_usulan'] ?? '-',
                'kecamatan' => $r['kecamatan'] ?? '-',
                'masalah'   => $r['masalah'] ?? '-',
                'alamat'    => $r['alamat'] ?? '-',
                'opd'       => $r['opd_tujuan'] ?? '-',
                'sipd'      => $r['sipd'] ?? '-',
                'anggaran'  => (float)($r['perkiraan_anggaran'] ?? 0),
            ];
        }

        // Jika CSRF aktif & regenerate, kirim token baru (opsional)
        $resp = ['data' => $data];
        if (function_exists('csrf_hash')) $resp['csrf'] = csrf_hash();

        return $this->response->setJSON($resp);
    }
}
