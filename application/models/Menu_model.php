<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
//---> ImageSlider
	public function ImageSlider()
    {
        //$query = "SELECT * FROM imageslider WHERE is_delete=0";
		//return $this->db->query($query)->result_array();
		$this->db->order_by('urut', 'ASC');
		$query = $this->db->get_where('imageslider', ['is_delete' => 0]);
		return $query->result_array();
        
    }
	public function getImageSlider($id)
    {
        $query = $this->db->get_where('imageslider', ['id' => $id]);
        return $query->row_array();
    }
	
//---> Profil/Umum
    public function getProfil()
    {
        $query = $this->db->get_where('profil', ['id' => 1, 'is_delete' => 0]);
        return $query->row_array();
    }
	
//---> Sejarah
    public function getSejarah()
    {
        $query = $this->db->get_where('sejarah', ['id' => 1, 'is_delete' => 0]);
        return $query->row_array();
    }
	
//---> Visi Misi
    public function getVisiMisi()
    {
        $query = $this->db->get_where('visimisi', ['id' => 1, 'is_delete' => 0]);
        return $query->row_array();
    }
	
//---> Direksi
    public function Direksi()
    {
        $query = $this->db->get_where('direksi', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getDireksi($id)
    {
        $query = $this->db->get_where('direksi', ['id' => $id]);
        return $query->row_array();
    }
	
//---> Layanan
    public function Layanan()
    {
        $query = $this->db->get_where('layanan', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getLayanan($id)
    {
        $query = $this->db->get_where('layanan', ['id' => $id]);
        return $query->row_array();
    }
	public function Layanan_Detail($id)
    {
        $query = $this->db->get_where('layanan_detail', ['layanan_id' => $id, 'is_delete' => 0]);
        return $query->result_array();
    }
	public function getLayanan_Detail($id)
    {
        $query = $this->db->get_where('layanan_detail', ['id' => $id]);
        return $query->row_array();
    }
	public function Layanan_Detail_Jenis($id,$jenis)
    {
        $query = $this->db->get_where('layanan_detail', ['layanan_id' => $id,'jenis' => $jenis, 'is_delete' => 0]);
        return $query->result_array();
    }
	
//---> Poli Klinik
    public function Poliklinik()
    {
        $query = $this->db->get_where('poliklinik', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getPoliklinik($id)
    {
        $query = $this->db->get_where('poliklinik', ['id' => $id]);
        return $query->row_array();
    }
	public function Poliklinik_Dokter($id)
    {
		//$query = "SELECT poliklinik_dokter.*, dokter.nama FROM poliklinik_dokter LEFT JOIN dokter ON poliklinik_dokter.dokter_id = dokter.id WHERE poliklinik_dokter.is_delete=0 AND poliklinik_dokter.poliklinik_id=$id";
		$query = "SELECT poliklinik_dokter.*, poliklinik.nama AS poliklinik,dokter.nama AS dokter, dokter.image FROM poliklinik_dokter JOIN poliklinik ON poliklinik_dokter.poliklinik_id = poliklinik.id JOIN dokter ON poliklinik_dokter.dokter_id = dokter.id WHERE poliklinik_dokter.is_delete = 0 AND poliklinik_dokter.poliklinik_id=$id ORDER by poliklinik_dokter.urut_hari";
		return $this->db->query($query)->result_array();
    }
	public function getPoliklinik_Dokter($id)
    {
        $query = $this->db->get_where('poliklinik_dokter', ['id' => $id]);
        return $query->row_array();
    }
	
//---> Dokter
    public function Dokter()
    {
        $query = $this->db->get_where('dokter', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getDokter($id)
    {
        $query = $this->db->get_where('dokter', ['id' => $id]);
        return $query->row_array();
    }
	public function Dokter_Jadwal($id)
    {
		//$query = "SELECT poliklinik_dokter.*, dokter.nama FROM poliklinik_dokter LEFT JOIN dokter ON poliklinik_dokter.dokter_id = dokter.id WHERE poliklinik_dokter.is_delete=0 AND poliklinik_dokter.poliklinik_id=$id";
		$query = "SELECT poliklinik_dokter.*, poliklinik.nama AS poliklinik,dokter.nama AS dokter, dokter.image FROM poliklinik_dokter JOIN poliklinik ON poliklinik_dokter.poliklinik_id = poliklinik.id JOIN dokter ON poliklinik_dokter.dokter_id = dokter.id WHERE poliklinik_dokter.is_delete = 0 AND poliklinik_dokter.dokter_id=$id ORDER by poliklinik_dokter.urut_hari";
		return $this->db->query($query)->result_array();
    }
	public function Dokter_Hari_Ini($hari)
    {
		
		//$hari=json_encode($hari);
		//echo $hari;
		$query = "SELECT poliklinik_dokter.*, poliklinik.nama AS poliklinik, dokter.nama, dokter.image FROM poliklinik_dokter INNER JOIN poliklinik ON poliklinik_dokter.poliklinik_id = poliklinik.id INNER JOIN dokter ON poliklinik_dokter.dokter_id = dokter.id WHERE poliklinik_dokter.is_delete=0 AND poliklinik_dokter.hari='$hari' ORDER by poliklinik_dokter.poliklinik_id ASC";
		return $this->db->query($query)->result_array();
    }

	//-----> Kamar
	public function Kamar()
    {
        $query = $this->db->get_where('kamar', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getKamar($id)
    {
        $query = $this->db->get_where('kamar', ['id' => $id]);
        return $query->row_array();
    }





	////////

//---> IndikatorMutu

//    public function IndikatorMutu()
//    {
//        $query = $this->db->get_where('indikatormutu', ['is_delete' => 0]);
//		return $query->result_array();
//    }
    public function IndikatorMutu()
    {
        $query = "SELECT tahun FROM indikatormutu WHERE is_delete=0 GROUP by tahun ORDER by tahun ASC";
		return $this->db->query($query)->result_array();
    }
	public function getIndikatorMutu($id)
    {
        $query = $this->db->get_where('indikatormutu', ['id' => $id]);
        return $query->row_array();
    }
	
	public function Indikatormutu_Tahun($tahun)
    {
        $query = $this->db->get_where('indikatormutu', ['tahun' => $tahun, 'is_delete' => 0]);
        return $query->result_array();
    }
	public function Indikatormutu_Detail($id)
    {
        $query = $this->db->get_where('indikatormutu_detail', ['indikatormutu_id' => $id, 'is_delete' => 0]);
        return $query->result_array();
    }
	public function getIndikatormutu_Detail($id)
    {
        $query = $this->db->get_where('indikatormutu_detail', ['id' => $id]);
        return $query->row_array();
    }
//	public function Layanan_Detail_Jenis($id,$jenis)
 //   {
//        $query = $this->db->get_where('layanan_detail', ['layanan_id' => $id,'jenis' => $jenis, 'is_delete' => 0]);
//        return $query->result_array();
//    }
	
	
//---> Foto_Kategori
    public function Foto_Kategori()
    {
        $query = $this->db->get_where('foto_kategori', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getFoto_Kategori($id)
    {
        $query = $this->db->get_where('foto_kategori', ['id' => $id]);
        return $query->row_array();
    }	
//---> Foto
	public function Foto()
    {
        //$query = $this->db->get_where('foto', ['is_delete' => 0]);
		//return $query->result_array();
		$query = "SELECT foto.*, foto_kategori.nama AS kategori,foto_kategori.urut AS urut2 FROM foto LEFT JOIN foto_kategori ON foto_kategori.id = foto.kategori_id WHERE foto.is_delete=0 AND foto_kategori.is_delete=0 ORDER by urut2, urut";
		return $this->db->query($query)->result_array();
	}
	public function getFoto($id)
    {
        $query = $this->db->get_where('foto', ['id' => $id]);
        return $query->row_array();
    }
//--->Foto 2
public function Foto2()
{
	//$query = $this->db->get_where('foto', ['is_delete' => 0]);
	//return $query->result_array();
	//$query = "SELECT foto.*, foto_kategori.nama AS kategori,foto_kategori.urut AS urut2 FROM foto LEFT JOIN foto_kategori ON foto_kategori.id = foto.kategori_id WHERE foto.is_delete=0 AND foto_kategori.is_delete=0 ORDER by urut2, urut";
	$query = "SELECT * from foto2";
	return $this->db->query($query)->result_array();
}
public function getFoto2($id)
{
	$query = $this->db->get_where('foto2', ['id' => $id]);
	return $query->row_array();
}
	
//---> Video
    public function Video()
    {
		$this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('video', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getVideo($id)
    {
        $query = $this->db->get_where('video', ['id' => $id]);
        return $query->row_array();
    }	
	
//---> Download
    public function Download()
    {
		$this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('download', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getDownload($id)
    {
        $query = $this->db->get_where('download', ['id' => $id]);
        return $query->row_array();
    }	

//---> Testimoni
    public function Testimoni()
    {
        $query = $this->db->get_where('testimoni', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getTestimoni($id)
    {
        $query = $this->db->get_where('testimoni', ['id' => $id]);
        return $query->row_array();
    }
	
	//---> Rekanan
    public function Rekanan()
    {
		$this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('rekanan', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getRekanan($id)
    {
        $query = $this->db->get_where('rekanan', ['id' => $id]);
        return $query->row_array();
    }
	public function Rekanan1()
    {
		$this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('rekanan', ['is_delete' => 0, 'asuransi' => 1]);
		return $query->result_array();
    }
	public function Rekanan0()
    {
		$this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('rekanan', ['is_delete' => 0, 'asuransi' => 0]);
		return $query->result_array();
    }
//---> Artikel
    public function Artikel()
    {
        $this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('artikel', ['is_delete' => 0]);
		return $query->result_array();
    }
	public function getArtikel($id)
    {
        $query = $this->db->get_where('artikel', ['id' => $id]);
        return $query->row_array();
    }
	public function Artikelkesehatan()
    {
        $this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('artikel', ['is_delete' => 0, 'kesehatan' => 1]);
		return $query->result_array();
    }
	public function Informasiumum()
    {
        $this->db->order_by('urut', 'ASC');
        $query = $this->db->get_where('artikel', ['is_delete' => 0, 'kesehatan' => 0]);
		return $query->result_array();
    }	
	
}
