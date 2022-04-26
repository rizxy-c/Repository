<?php
/*
 require_once "app/Person.php";


include "app/Member.php";
include "inc/Member.php";
include "layouts/Member.php";


$app = new App\Member;
$inc = new Inc\Member;
$layout = new Layout\Member;

*/
require_once "app/Membr.php";

// $membr = new Membr();
$member = new Member();
    $rows = $member->tampil();

    if(isset($_POST["submit"])){
        $no = $member->setMembrNo($_POST["no"]);
        $idmemb = $member->setMembrIdmemb($_POST["idmemb"]);
        $nama = $member->setMembrName($_POST["nama"]);
        $alamt = $member->setAlamat($_POST["alamat"]);
        $tgl = $member->setTanggal($_POST["tanggal"]);
        $member->simpan($no,$idmemb,$nama,$alamt,$tgl,"1");
    }    
    if(isset($_GET["idmemb_membr"])){
        $idmemb = $member->setMembrIdmemb($_GET["idmemb_membr"]);
        $member->delete($idmemb);
    }
    if(isset($_POST["aksi"])){
        $member->update($_POST['no'],$_POST['idmemb'],$_POST['nama'],$_POST['alamat'],$_POST['tanggal'],$_POST['1']);
    }
?>

    <form action="?" method="POST">
        <fieldset>
        <p>
            <label>No:</label>
            <input type="text" name="no" placeholder="no..." />
        </p>
        <p>
            <label>ID Member:</label>
            <input type="text" name="idmemb" placeholder="id member..." />
        </p>
        <p>
            <label>Nama Member:</label>
            <input type="text" name="nama" placeholder="nama member..." />
        </p>
        <p>
            <label>Alamat Member:</label>
            <input type="text" name="alamat" placeholder="alamat member..." />
        </p>

        <p>
            <label>Tanggal Gabung:</label>
            <input type="date" name="tanggal" placeholder="tanggal gabung..." />
        </p>

        <p>
            <input type="submit" name="submit" value="Save" />
        </p>
        </fieldset>
    

<table border="1" cellpadding="10">
<tr>
<td>NO</td>
<td>ID</td>
<td>NAMA</td>
<td>ALAMAT</td>
<td>TANGGAL JOIN</td>
</tr>

<?php foreach ($rows as $row) { ?>
<tr>
<td><?php echo $row['membr_no']; ?></td>
<td><?php echo "<input type='text' name='idmemb_membr' value ='".$row['membr_idmemb']."' readonly/>"; ?></td>
<td><?php echo $row['membr_nama']; ?></td>
<td><?php echo $row['membr_alamat']; ?></td>
<td><?php echo $row['no_tanggal']; ?></td>
<td><a href="inc/edit.php?idmemb_membr=<?php echo $row['membr_idmemb']; ?>">Edit</a>
<td><a href="index.php?idmemb_membr=<?php echo $row['membr_idmemb']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>

</form>