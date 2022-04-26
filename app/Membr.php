<?php
abstract class Membr {
 public $db;
 public function __construct()
 {
 try {

 $this->db =
 new PDO("mysql:host=localhost;dbname=db_memberwarnet", "root", "");
 } catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
 }
 abstract public function setMembrNo($no);  
 abstract public function setMembrIdmemb($idmemb);  
 abstract public function setMembrName($name);  
 abstract public function setAlamat($alamat);  
 abstract public function setTanggal($tanggal);

 abstract public function tampil();
 abstract public function simpan($no, $idmemb, $name, $alamat, $tanggal);
 abstract public function delete($idmemb);
 abstract public function edit($idmemb);
 abstract public function update($no, $idmemb, $name, $alamat, $tanggal);

 }
class Member extends Membr {

    
public function setMembrNo($no) {
    return $no;
}	

public function setMembrIdmemb($idmemb) {
    return $idmemb;
}	

public function setMembrName($name) {
    return $name;
}	

public function setAlamat($alamat) {
    return $alamat;
}

public function setTanggal($tanggal) {
    return $tanggal;
}		

public function tampil()
{
    $sql = "SELECT * FROM tb_membr";
    $stmt = $this->db->prepare($sql);
   
    $stmt->execute();
   
    $data = [];
    while ($rows = $stmt->fetch()) {
    $data[] = $rows;
    }
    return $data;
    }


public function simpan($no, $idmemb, $name, $alamat, $tanggal)
	{
		try{
			$sql = "INSERT INTO tb_membr VALUES('".$no."', '".$idmemb."', '".$name."', '".$alamat."', '".$tanggal."')";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			echo "$sql berhasil di simpan";
		} catch (Exception $e) {
		 die ("Maaf Error, " . $e->getMessage());

		}
	}

    public function delete($idmemb){
		$sql = "DELETE FROM `tb_membr` WHERE `tb_membr`.`membr_idmemb` = $idmemb";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
			echo "$sql berhasil di hapus";
	}
    

    public function edit($idmemb){
		$sql = "SELECT * FROM tb_membr WHERE membr_idmemb='$idmemb'";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
		$data[] = $rows;
		}
		return $data;
	}
    public function update($no, $idmemb, $name, $alamat, $tanggal){
		$sql = "UPDATE tb_membr SET 'membr_idmemb'='$idmemb', 'membr_nama'='$name', 'membr_alamat'='$alamat', 'no_tanggal'='$tanggal' WHERE `tb_membr`.'membr_idmemb'='$idmemb'";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}

 }
