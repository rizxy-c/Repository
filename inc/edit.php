<form action="../index.php?aksi=edit" method="POST">
<?php
require_once "../app/Membr.php";

$member = new Member();

// foreach($member->edit($_GET['id']) as $d){

    if(isset($_GET["idmemb_membr"])){
        $idmemb = $member->setMembrNo($_GET["idmemb_membr"]);
        foreach($member->edit($idmemb) as $d);

    }
    // foreach($mhsw->edit($_GET['id']) as $d){
?>
<table>
<fieldset>
        <p>
            <label>No:</label>
            <input type="text" name="no" value="<?php echo $d['membr_no'] ?>"/>
        </p>
        <p>
            <label>ID:</label>
            <input type="text" name="idmemb" value="<?php echo $d['membr_idmemb'] ?>"/>
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $d['membr_nama'] ?>"/>
        </p>
        <p>
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $d['membr_alamat'] ?>" />
        </p>

        <p>
            <input type="submit" name="submit" value="Edit" />
        </p>
        </fieldset>
</table>
</form>