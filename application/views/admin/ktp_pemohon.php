<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>KTP_Pemohon_<?=date('Ymd_His')?></title>
</head>
<body>
 
<div id="container">
 <h1>KTP Pemohon</h1>
 
 <div id="body">
 
 <p>
    <?php foreach ($dataKTP as $key) {
        $ex = explode(".", $key);
        if (count($ex) > 1){
    ?>
        <img src="<?=base_url()?>assets/images/scan-ktp/<?=$key?>"/>
        <br/>
    <?php
        }else{
        
        echo $key."<br/>";
        }
    }?>
 </p>
 
 </div>
 
</div>
 
</body>
</html>