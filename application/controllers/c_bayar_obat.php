<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_bayar_obat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->library('access');
		$this->load->library('template');
		
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	/***Default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
	
		//if ($this->session->userdata('logged_in') == false)
			//redirect('login');
		//else
		//	redirect('admin/dashboard');
		if ($this->session->userdata('logged_in') == true)
			redirect('admin/dashboard');
		else
			redirect('login');
			
	}
	
	
	
//////////////////////////////*  PEMBAYARAN OBAT  */////////////////////////////////
	function bayar_obat($par1 = '', $par2 = '', $par3 = '')
	{
		if (!$this->session->userdata('logged_in') == true)
		{
			redirect('login');
		}
		
		if ($par1 == 'tambah' && $par2 == 'do_update') {
		
			redirect('c_bayar_obat/bayar_obat', 'refresh');
			
		} else if ($par1 == 'tambah') {
			
			$data['pembayaran_obat'] = $this->m_crud->get_obat_by_id($par2);
		}
		if ($par1 == 'ubah' && $par2 == 'do_update') {
			$data['kodebayar'] = $this->input->post('kodebayar');
			$data['tgl_bayar'] = $this->input->post('tgl_bayar');
			$data['keterangan'] = $this->input->post('keterangan');
			
			$this->m_crud->perbaharui('kd_bayar', $par3, 'bayar_obat', $data);
			$this->session->set_flashdata('flash_message', 'Data Transaksi Obat berhasil diperbaharui!');
			redirect('c_bayar_obat/bayar_obat', 'refresh');
			
		} else if ($par1 == 'ubah') {
			$data['edit_bayar_obat'] = $this->m_crud->get_bayar_obat_by_id($par2);
		}
		
		if ($par1 == 'hapus') {
			$id = $this->uri->segment(4); // $this->input->post('id');
			
			$text = "SELECT * FROM bobat_header WHERE kd_bayar='$id'";
			$hasil = $this->m_crud->manualQuery($text);
			if($hasil->num_rows()>0){
				$text = "DELETE FROM bobat_detail
						WHERE kd_bayar='$id'";
				$this->m_crud->manualQuery($text);
				$text = "DELETE FROM bobat_header WHERE kd_bayar='$id'";
				$this->m_crud->manualQuery($text);
				$this->session->set_flashdata('flash_message', 'Data Pembayaran Obat berhasil dihapus!');
				redirect('c_bayar_obat/bayar_obat', 'refresh');
			}
		}
		
		
		
		$data['tgl_bayar']			= date('d-m-Y');
		$data['kodebayar']			= $this->m_crud->MaxkodebayarObat(); 
		$data['page_name']  		= 'pembayaran';
		$data['page_title']	 		= 'Transaksi Pembayaran Obat';
		$data['kd_obat']	 		= '';
		$data['keterangan']	 		= '';
		$data['nama_obat']	 		= '';
		$data['nik']	 			= '';
		$data['bio_nama']	 		= '';
		$data['jml']	 			= '';
		$data['total']	 			= '';
		
		
		$data['bayar_obat']		= $this->m_crud->get_all_bayar_obat();
		$data['list_obat']			= $this->m_crud->get_list_obat('1');
		$data['list_satuan_kecil']	= $this->m_crud->get_list_sat_kecil();
				
		$this->template->display('bayar_obat', $data);
		
	}



	
//////////////////////* TAMPIL DATA PEMBAYARAN OBAT *////////////////////////////////////////////	
	public function DataDetailObat()
	{
			if (!$this->session->userdata('logged_in') == true)
			{
				redirect('login');
			}
			
			$id = $this->input->post('kode');
			
			$text = "SELECT * FROM bobat_detail WHERE kd_bayar='$id'";
			$d['data'] = $this->db->query($text);
				
			$this->template->tampil_bayar_obat('daftar_bayar_obat',$d);
	
	}

/////////////////////* SIMPAN PEMBAYARAN OBAT */////////////////////////////////////////////////	
	public function simpan_obat()
	{
			///////* simpan ke table header * ///////////////
			$tgl_bayar 				= $this->input->post('tgl_bayar');
			
			$up['kd_bayar'] 		= $this->input->post('kodebayar');
			$up['tgl_bayar'] 		= $this->m_crud->tgl_sql($this->input->post('tglbayar'));
			$up['nik'] 				= $this->input->post('nik');
			$up['nama_pasien'] 		= $this->input->post('bio_nama');
			$up['total'] 			= $this->input->post('total');
			$up['bayar'] 			= $this->input->post('bayar');
			$up['kembalian'] 		= $this->input->post('kembalian');
			
			/////* simpan ke table detail *//////////////
			
			$ud['kd_bayar'] 		= $this->input->post('kodebayar');
			$ud['kd_obat']			= $this->input->post('kd_obat');
			$ud['nama_obat']		= $this->input->post('nama_obat');
			$ud['jml'] 				= $this->input->post('jml');	
			$ud['harga_jual'] 		= str_replace(",","",$this->input->post('harga_jual'));	
			$ud['sat_kecil_obat']	= $this->input->post('sat_kecil_obat');
			$ud['tgl_bayar'] 		= $this->m_crud->tgl_sql($this->input->post('tglbayar'));
			$ud['nik'] 				= $this->input->post('nik');
			
			
			$kd_bayar 				= $this->input->post('kodebayar');
			$kd_obat				= $this->input->post('kd_obat');
			
			$id['kd_bayar'] 			= $this->input->post('kodebayar');
			
			$id_d['kodebayar'] 		= $this->input->post('kd_bayar');
			$id_d['kd_obat'] 		= $this->input->post('kd_obat');
			
			$hasil = $this->m_crud->getSelectedData("bobat_header",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->m_crud->updateData("bobat_header",$up,$id);
				$text = "SELECT * FROM bobat_detail WHERE kd_bayar='$kd_bayar' AND kd_obat='$kd_obat'";
				$hasil = $this->m_crud->manualQuery($text);
				if($hasil->num_rows()>0){
					$this->m_crud->updateData("bobat_detail",$ud,$id_d);
				}else{
					$this->m_crud->insertData("bobat_detail",$ud);
				}
				echo "Data sukses diubah";
			}else{
				$this->m_crud->insertData("bobat_header",$up);
				$this->m_crud->insertData("bobat_detail",$ud);
				echo "Data sukses disimpan";
				
			}
			
		
	}
	
	
	
	
	public function HapusDetail()
	{
			$nomor = $this->uri->segment(3);//$exp[0];
			$kode = $this->uri->segment(4); //$exp[1];
			
			$id_usaha = $this->session->userdata('id');
			
			$text = "SELECT * FROM bobat_detail,bobat_header 
					WHERE bobat_detail.kd_bayar=bobat_header.kd_bayar AND
					bobat_detail.kd_bayar='$nomor' AND bobat_detail.kd_obat='$kode'";
			$hasil = $this->m_crud->manualQuery($text);
			if($hasil->num_rows()>0){
				$text = "DELETE FROM bobat_detail
					 WHERE 	kd_bayar='$nomor' AND kd_obat='$kode'";
				$this->m_crud->manualQuery($text);
			//echo "Data Sukses dihapus";
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/c_bayar_obat/bayar_obat/ubah/$nomor'>";			
			}else{
				echo "Tidak Ada data yang dapat dihapus";
			}
	}
	
	public function cetak()
	{
			$id = $this->uri->segment(3); //$this->session->userdata('id');
			$id_p = $this->session->userdata('id');
			
			$d['id'] = $id;
				
			$text = "SELECT *
					FROM bobat_header 
					WHERE kd_bayar='$id'";
			$hasil = $this->m_crud->manualQuery($text);
			foreach($hasil ->result() as $t){
				$d['tgl_bayar'] = $this->m_crud->tgl_indo($t->tgl_bayar);
				$d['nama_pasien'] = $t->nama_pasien;
			}
			
			$text = "SELECT sum(jml*harga_jual) as total
					FROM bobat_detail 
					WHERE kd_bayar='$id'";
			$hasil = $this->m_crud->manualQuery($text);
			foreach($hasil ->result() as $t){
				$d['total'] = $t->total;
			}
			
			$text = "SELECT * FROM bobat_detail, bobat_header
					WHERE bobat_detail.kd_bayar=bobat_header.kd_bayar AND bobat_detail.kd_bayar='$id'";

			$d['data'] = $this->m_crud->manualQuery($text);
			
			
			$this->template->tampil_cetak_obat('cetak_nota_obat',$d);
							
			
	}
	
	
	
}
