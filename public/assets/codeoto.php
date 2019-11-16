<?php  
class code_id{
	function createRandomId(){
		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '';
		while ($i <= 7) {
			$num = rand() % 64;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}
}
$Id = new code_id();
//$no_order = "ORDER-".date('dmhis')."-".$order->createRandomOrder();
$id_galeri = "GAL-".$Id->createRandomId();
$id_tempat  = "LOK-".$Id->createRandomId();
print_r($id_tempat.$id_galeri);


?>