<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login(); 
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email_user' => $this->session->userdata('email_user')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['pengiriman'] = $this->ModelPengiriman->getPengiriman()->result_array();
        $data['supir'] = $this->ModelSupir->getSupir()->result_array();
        $data['kendaraan'] = $this->ModelKendaraan->getKendaraan()->result_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }
}