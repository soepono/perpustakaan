<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MTransaksi','MBuku','MUser'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MTransaksi->total_rows($q);
        $transaksi = $this->MTransaksi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('transaksi/transaksi_list', $data);
    }

    function pinjam()
    {
        $submit = $this->input->post('submit',TRUE);
        if ($submit){
            // tambah tanggal
            $lama_pinjam = 7; // tujuh hari
            $sekarang = date('Y-m-d H:i:s');
            $tanggal_kembali = Date('Y-m-d H:i:s', strtotime('+7 days'));
            $data = array(
                'kode_buku' => $this->input->post('kode_buku',TRUE),
                'nomor_anggota' => $this->input->post('nomor_anggota',TRUE),
                'tanggal_kembali' => $tanggal_kembali,
                'denda' => '0',
            );
            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Peminjaman Selesai');
            redirect(site_url('transaksi/pinjam'));            
        }
        $data['list_trx'] = $this->MTransaksi->get_all();
        $data['list_buku'] = $this->MBuku->get_all();
        $data['list_anggota'] = $this->MUser->get_all();
        $data['page'] = 'transaksi/pinjam';
        $this->load->view('template', $data);
    }

    function kembali($id_trx)
    {
        if ($id_trx){
            $data = array(
                'tanggal_kembali' => date('Y-m-d H:i:s'),
                'status' => 'Kembali',
            );
            $this->MTransaksi->update($id_trx, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi/pinjam'));            
        }
    }


    public function read($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_buku' => $row->kode_buku,
		'nomor_anggota' => $row->nomor_anggota,
		'tanggal_pinjam' => $row->tanggal_pinjam,
		'tanggal_kembali' => $row->tanggal_kembali,
		'status' => $row->status,
		'denda' => $row->denda,
	    );
            $this->load->view('transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id' => set_value('id'),
	    'kode_buku' => set_value('kode_buku'),
	    'nomor_anggota' => set_value('nomor_anggota'),
	    'tanggal_pinjam' => set_value('tanggal_pinjam'),
	    'tanggal_kembali' => set_value('tanggal_kembali'),
	    'status' => set_value('status'),
	    'denda' => set_value('denda'),
	);
        $this->load->view('transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_buku' => $this->input->post('kode_buku',TRUE),
		'nomor_anggota' => $this->input->post('nomor_anggota',TRUE),
		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
		'tanggal_kembali' => $this->input->post('tanggal_kembali',TRUE),
		'status' => $this->input->post('status',TRUE),
		'denda' => $this->input->post('denda',TRUE),
	    );

            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'kode_buku' => set_value('kode_buku', $row->kode_buku),
		'nomor_anggota' => set_value('nomor_anggota', $row->nomor_anggota),
		'tanggal_pinjam' => set_value('tanggal_pinjam', $row->tanggal_pinjam),
		'tanggal_kembali' => set_value('tanggal_kembali', $row->tanggal_kembali),
		'status' => set_value('status', $row->status),
		'denda' => set_value('denda', $row->denda),
	    );
            $this->load->view('transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_buku' => $this->input->post('kode_buku',TRUE),
		'nomor_anggota' => $this->input->post('nomor_anggota',TRUE),
		'tanggal_pinjam' => $this->input->post('tanggal_pinjam',TRUE),
		'tanggal_kembali' => $this->input->post('tanggal_kembali',TRUE),
		'status' => $this->input->post('status',TRUE),
		'denda' => $this->input->post('denda',TRUE),
	    );

            $this->MTransaksi->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $this->MTransaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_buku', 'kode buku', 'trim|required');
	$this->form_validation->set_rules('nomor_anggota', 'nomor anggota', 'trim|required');
	$this->form_validation->set_rules('tanggal_pinjam', 'tanggal pinjam', 'trim|required');
	$this->form_validation->set_rules('tanggal_kembali', 'tanggal kembali', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('denda', 'denda', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pinjam");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Kembali");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Denda");

	foreach ($this->MTransaksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_buku);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pinjam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_kembali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->denda);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-21 10:40:19 */
/* http://harviacode.com */