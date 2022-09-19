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
    <title>Surat_Pernyataan_<?=date('Ymd_His')?></title>
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
            <td align="center" colspan="2"><u><b>SURAT PERNYATAAN</b></u><br/></td>
        </tr>
        <tr>
            <td align="center" colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" colspan="2">Yang bertanda tangan di bawah ini, pemegang hak cipta:</td>
        </tr>
        <tr>
            <td width="8%"></td>
            <td align="left">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><b><?=@$pemegang->nama?></b></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td><?=@$pemegang->kewarganegaraan?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?=@$pemegang->alamat?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <!---   --->

        <tr>
            <td align="left" colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td align="left" colspan="2">Dengan ini menyatakan bahwa:</td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">1.</td>
            <td align="left">
                <table border="0">
                    <tr>
                        <td colspan="3">Karya Cipta yang saya mohonkan:</td>
                    </tr>
                    <tr>
                        <td width="10%">Berupa</td>
                        <td width="2%">:</td>
                        <td><?=@$permohonan->nama_subjenis?></td>
                    </tr>
                    <tr>
                        <td>Berjudul</td>
                        <td>:</td>
                        <td align="left"><?=@$permohonan->permohonan_judul?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td width="8%" valign="top" align="left">&nbsp;</td>
            <td align="left">
                <table>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Tidak meniru dan tidak sama secara esensial dengan Karya Cipta milik pihak lain atau obyek kekayaan intelektual lainnya sebagaimana dimaksud dalam Pasal 68 ayat (2);</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Bukan merupakan Ekspresi Budaya Tradisional sebagaimana dimaksud dalam Pasal 38;</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Bukan merupakan Ciptaan yang tidak diketahui penciptanya sebagaimana dimaksud dalam Pasal 39;</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Bukan merupakan hasil karya yang tidak dilindungi Hak Cipta sebagaimana dimaksud dalam Pasal 41 dan 42;</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Bukan merupakan Ciptaan seni lukis yang berupa logo atau tanda pembeda yang digunakan sebagai merek dalam perdagangan barang/jasa atau digunakan sebagai lambang organisasi, badan usaha, atau badan hukum sebagaimana dimaksud dalam Pasal 65 dan;</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">&#9642;</td>
                        <td colspan="2">
                            <p align="justify">Bukan merupakan Ciptaan yang melanggar norma agama, norma susila, ketertiban umum, pertahanan dan keamanan negara atau melanggar peraturan perundang-undangan sebagaimana dimaksud dalam Pasal 74 ayat (1) huruf d Undang-Undang Nomor 28 Tahun 2014 tentang Hak Cipta.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td width="8%" valign="top" align="left">2.</td>
            <td align="left"><p align="justify">Sebagai pemohon mempunyai kewajiban untuk menyimpan asli contoh ciptaan yang dimohonkan dan harus memberikan apabila dibutuhkan untuk kepentingan penyelesaian sengketa perdata maupun pidana sesuai dengan ketentuan perundang-undangan.</p>
            </td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">3.</td>
            <td align="left"><p align="justify">Karya Cipta yang saya mohonkan pada Angka 1 tersebut di atas tidak pernah dan tidak sedang dalam sengketa pidana dan/atau perdata di Pengadilan.</p>
            </td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">4.</td>
            <td align="left"><p align="justify">Dalam hal ketentuan sebagaimana dimaksud dalam Angka 1 dan Angka 3 tersebut di atas saya / kami langgar, maka saya / kami bersedia secara sukarela bahwa:</p>
            </td>
        </tr>
        <tr>
            <td width="8%" valign="top" align="left">&nbsp;</td>
            <td align="left">
                <table>
                    <tr>
                        <td valign="top" align="left">a.</td>
                        <td colspan="2">
                            <p align="justify">Permohonan karya cipta yang saya ajukan dianggap ditarik kembali; atau</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">b.</td>
                        <td colspan="2">
                            <p align="justify">Karya Cipta yang telah terdaftar dalam Daftar Umum Ciptaan Direktorat Hak Cipta, Direktorat Jenderal Hak Kekayaan Intelektual, Kementerian Hukum Dan Hak Asasi Manusia R.I dihapuskan sesuai dengan ketentuan perundang-undangan yang berlaku.</p>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left">c.</td>
                        <td colspan="2">
                            <p align="justify">Dalam hal kepemilikan Hak Cipta yang dimohonkan secara elektronik sedang dalam berperkara dan/atau sedang dalam gugatan di Pengadilan maka status kepemilikan surat pencatatan elektronik tersebut ditangguhkan menunggu putusan Pengadilan yang berkekuatan hukum tetap.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td align="left" colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="3">Demikian Surat pernyataan ini saya/kami buat dengan sebenarnya dan untuk dipergunakan sebagimana mestinya.</td>
        </tr>

        <tr>
            <td align="left" colspan="2">&nbsp;</td>
        </tr>



        <!---    --->

        <tr>
            <td colspan="3" align="right">
                <table>
                    <tr>
                        <td align="center">Kuningan, <?=tanggal_indo(date('Y-m-d'))?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">(<b><?=@$pemegang->nama_pemegang_hki?></b>)</td>
                    </tr>
                    <tr>
                        <td align="center">Pemegang Hak Cipta*</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
 
</body>
</html>