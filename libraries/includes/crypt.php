<?php
class Crypt {
	
	private static $key = "1234567890123456"; //16 Character Key

	public static function encrypt($decryptedData) {
		$encryptedData = NULL;
		// echo "<br/>\$decryptedData: $decryptedData";
		if (!empty($decryptedData)) {	
			// echo "<br/>\$decryptedData is not empty!";
			$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB); 
			$encryptedData = Crypt::pkcs5_pad($decryptedData, $size); 
			$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, ''); 
			$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND); 
			mcrypt_generic_init($td, Crypt::$key, $iv); 
			$encryptedData = mcrypt_generic($td, $encryptedData); 
			mcrypt_generic_deinit($td); 
			mcrypt_module_close($td); 
			$encryptedData = base64_encode($encryptedData); 
		}
		
		return $encryptedData; 
	
	} 

	private static function pkcs5_pad ($text, $blocksize) { 
		$pad = $blocksize - (strlen($text) % $blocksize); 
		return $text . str_repeat(chr($pad), $pad); 
	} 

	public static function decrypt($encryptedData) {
		$decryptedData= NULL;
		// echo "<br/>\$encryptedData: $encryptedData";
		if (!empty($encryptedData)) {	
			// echo "<br/>\$encryptedData is not empty!";
			$decryptedData = mcrypt_decrypt(
				MCRYPT_RIJNDAEL_128,
				Crypt::$key, 
				base64_decode($encryptedData), 
				MCRYPT_MODE_ECB
			);
			$dec_s = strlen($decryptedData); 
			$padding = ord($decryptedData[$dec_s-1]); 
			$decryptedData = substr($decryptedData, 0, -$padding);
		}
		return $decryptedData;
	}	
}
?>
