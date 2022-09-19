<?php
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surat_Pengalihan_HKI_<?=date('Ymd_His')?></title>
    <style>
        body{
            font-size: 12px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
 
    <table border="0" width="100%">
        <tr>
            <td align="center" colspan="3"><u><b>SURAT PENGALIHAN HAK CIPTA</b></u><br/></td>
        </tr>
        <tr>
            <td align="center" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" colspan="3">Yang bertanda tangan di bawah ini :</td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">Nama</td>
            <td width="4%" valign="top" align="left">:</td>
            <td align="left">
                <p>
                    
                    <ol>
                        <li><?=@$pengusul->nama_user?></li>
                        <?php
                        foreach ($pemohon->result() as $key) {
                            if ($key->unique_id != $pengusul->nidn){
                            $dataUser = @$this->db->get_where('tbl_user', ['nidn' => $key->unique_id])->row();
                        ?>
                            <li><?=@$dataUser->nama_user?></li>
                        <?php } }?>
                    </ol>
                </p>
            </td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">Alamat</td>
            <td width="4%" valign="top" align="left">:</td>
            <td align="left">
                <p align="justify">
                    <?=@$pengusul->alamat_user?>, <?=@$pengusul->nama_kota?>, <?=@$pengusul->nama_provinsi?>, <?=@$pengusul->kode_pos?>, Indonesia
                </p>
            </td>
        </tr>

        <!---   --->

        <tr>
            <td align="left" colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="3">Adalah Pihak I selaku pencipta, dengan ini menyerahkan karya ciptaan saya kepada :</td>
        </tr>

        <tr>
            <td align="left" colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td width="8%" valign="top" align="left">Nama</td>
            <td width="4%" valign="top" align="left">:</td>
            <td align="left"><b><?=@$pemegang->nama?></b></td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">Alamat</td>
            <td width="4%" valign="top" align="left">:</td>
            <td align="left"><?=@$pemegang->alamat?></td>
        </tr>

        <tr>
            <td align="left" colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="3">
                <p align="justify">Adalah Pihak II selaku Pemegang Hak Cipta berupa <b><?=@$permohonan->nama_subjenis?></b> yang berjudul <b><?=@$permohonan->permohonan_judul?></b> untuk didaftarkan di Direktorat Hak Cipta dan Desain Industri, Direktorat Jenderal Kekayaan Intelektual, Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia.
                </p>
            </td>
        </tr>

        <tr>
            <td align="left" colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="3">
                <p align="justify">Demikianlah surat pengalihan hak ini kami buat, agar dapat dipergunakan sebagaimana mestinya.</p>
            </td>
        </tr>

        <tr>
            <td align="left" colspan="3">&nbsp;</td>
        </tr>

        <!---    --->

        <tr>
            <td colspan="3" align="right">
                <table>
                    <tr>
                        <td align="center">Kuningan, <?=tanggal_indo(date('Y-m-d'))?></td>
                    </tr>                
                </table>
            </td>
        </tr>
    </table>

    <!--     -->

    <table border="0" width="100%">
        <tr>
            <td align="left">
                <table>
                    <tr>
                        <td align="center">Pemegang Hak Cipta</td>
                    </tr>
                    <tr>
                        <td>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">(<b><?=@$pemegang->nama_pemegang_hki?></b>)</td>
                    </tr>
                    <tr>
                        <td align="center">Ketua PUSHAKI Universitas Kuningan</td>
                    </tr>
                </table>
            </td>
            <td align="right">
                <table>
                    <tr>
                        <td align="center">Pencipta 1</td>
                    </tr>
                    <tr>
                        <td>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">(<b><?=@$pengusul->nama_user?></b>)</td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <?php
            $jumlahData = $pemohon->num_rows()-1;
            $nidnUdah[] = null;

            $jumlahPerulangan = round($jumlahData/2);
            echo $jumlahPerulangan."\n\t\t";
            $no = 1;
            for ($i = 0; $i < $jumlahPerulangan; $i++){
                $max = 1;
                echo $i;
        ?>

        <?php 
        if  ($no % 2 == 1){
            echo '<tr>';
        }
        ?>
            <?php 
            foreach ($pemohon->result() as $key){
                if ($max <= 2){
                if ($key->unique_id != $pengusul->nidn && !in_array($key->unique_id, $nidnUdah)){

                    $user = @$this->db->get_where('tbl_user', ['nidn' => $key->unique_id])->row();
                    $nidnUdah[] = $user->nidn;
                    
            echo $no;
            ?>
            <td align="<?=($no%2 == 1)?'left':'right'?>">
                <table>
                    <tr>
                        <td align="center">Pencipta <?=$no+1?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">(<b><?=@$user->nama_user?></b>)</td>
                    </tr>
                </table>
            </td>
            <?php 
                if  ($no % 2 == 0){
                    echo '</tr>';
                }
            $no++; 
            $max++;
                }
            }
            } 
            ?>
        

        <?php 
            } 
        ?>
    </table>
 
</body>
</html>