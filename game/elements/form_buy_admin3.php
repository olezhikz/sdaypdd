<h3><? echo content('buy_admin_server',$content_buy);?> <span style="color:#000;"><? echo $data_server[0]['name'];?></span></h3>
<table align="center"  border="0" cellpadding="0" cellspacing="0" class="serv_tab">
  <tr class="nochet">
    <td><? echo content('nick');?></td>
    <td><? if(isset($dataForm['nik']))echo $dataForm['nik']?></td>
  </tr>
  <tr>
    <td><? echo content('age');?></td>
    <td><? if(isset($dataForm['age']))echo $dataForm['age']?></td>
  </tr>
  <tr class="nochet">
    <td><? echo content('ip');?></td>
    <td><? if(isset($dataForm['ip']))echo $dataForm['ip']?></td>
  </tr>
  <tr>
    <td><? echo content('steam_id');?></td>
    <td><? if(isset($dataForm['steam_id']))echo $dataForm['steam_id']?></td>
  </tr>
  <tr class="nochet">
    <td><? echo content('email');?></td>
    <td><? if(isset($dataForm['email']))echo $dataForm['email']?></td>
  </tr>
  <tr>
    <td><? echo content('password');?></td>
    <td><? if(isset($dataForm['pass']))echo $dataForm['pass']?></td>
  </tr>
  <tr class="nochet">
    <td><? echo content('server');?></td>
    <td><? echo $data_server[0]['name']?></td>
  </tr>
  <tr>
    <td><? echo content('lasts');?></td>
    <td><? if(isset($dataForm['days']))echo $dataForm['days'],' ',content('dayc',$content_buy);?></td>
  </tr>

  <tr class="nochet">
    <td><? echo content('privilege');?></td>
    <td><?
function get_priv_desk($bd){
	global $data_server;
	$def_desc=$bd->select('*','priv_default_desk',array('type'=>$data_server[0]['type']));
	$privileges=$bd->select('*','privileges',array('id_server'=>$data_server[0]['id']));
	$privileges=$privileges[0];
	$def_desc=$def_desc[0];
	unset($def_desc['type']);
	foreach($def_desc as $key=>$value){
		if($privileges[$key.'d']=='')
			$privileges[$key.'d']=$value;
	}
	return $privileges;
}
$privd=get_priv_desk($bd);
function get_flgs_desk($flags){
	$str='';
	global $privd;
	$arr=explode(',',$flags);
	$sd=sizeof($arr);
	for($i=0;$i<$sd;$i++){
		$str.='<b>'.$arr[$i].'</b> - '.$privd[$arr[$i].'d'];
		if(($i+1)<$sd)$str.='<br>';
	}
	return $str;
}
echo get_flgs_desk($dataForm['flags']);
	?></td>
  </tr>
   <tr>
    <td><? echo content('summ',$content_tr);?></td>
    <td><b><? echo $dataForm['days']*$dataForm['summ_day']?></b></td>
  </tr>
</table><br>
<table align="center"  border="0">
  <tr>
    <td><form  method="post" action="<?php echo $host;?>/buy_admin.php?server=<? echo $data_server[0]['id'];?>&step=2&ch=1&sess_id=<? echo $_GET['sess_id'];?>">
     <input name="" class="button"  type="submit" value="<? echo content('back');?>" /></form></td><td>
 <form  method="post" action="<?php echo $host;?>/buy_admin.php?server=<? echo $data_server[0]['id'];?>&step=4&sess_id=<? echo $_GET['sess_id'];?>">
    <input name="" class="button" type="submit" value="<? echo content('pay');?>" /></form></td>
  </tr>
</table>
