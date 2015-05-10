<?php
class LfDealString
{

	/*
	*字符串截取，支持utf-8，一个中文按两个字符算。
	*传入字符串，以及需要截取的长度
	*返回的截取后的字符串
	*/
	static	function str_cut($string, $length, $dot = '...')
	{
		$strlen = strlen($string);
		if ($strlen <= $length) return $string;
		$string = str_replace(array(' ', '&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('', ' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
		$strcut = '';
		$length = intval($length - strlen($dot) - $length / 3);
		$n = $tn = $noc = 0;
		while ($n < strlen($string)) {
			$t = ord($string[$n]);
			if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1;
				$n++;
				$noc++;
			} elseif (194 <= $t && $t <= 223) {
				$tn = 2;
				$n += 2;
				$noc += 2;
			} elseif (224 <= $t && $t <= 239) {
				$tn = 3;
				$n += 3;
				$noc += 2;
			} elseif (240 <= $t && $t <= 247) {
				$tn = 4;
				$n += 4;
				$noc += 2;
			} elseif (248 <= $t && $t <= 251) {
				$tn = 5;
				$n += 5;
				$noc += 2;
			} elseif ($t == 252 || $t == 253) {
				$tn = 6;
				$n += 6;
				$noc += 2;
			} else {
				$n++;
			}
			if ($noc >= $length) {
				break;
			}
		}
		if ($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
		return $strcut . $dot;
	}
	static	function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	static	function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
	/*
	随机生成一个5位字符串
	*/
	static function GenerateStr(){
		$data="qwertyuioplkjhgfdsazxcvbnm";
		$str="";
		for($i=0;$i<=5;$i++){
			$str.=substr($data,rand(1,strlen($data)-1),1);
		}
		return $str;
	}

	/*
	随机生成一个5位字符串
	*/
	static function GenerateNum(){
		$data="019274834321568790276451274943769101982908907654312".mt_rand(0,100000000000);
		$str="";
		for($i=0;$i<12;$i++){
			$str.=substr($data,mt_rand(1,strlen($data)-1),1);
		}
		$arr=array(
			'111',
			'222',
			'333',
			'444',
			'555',
			'666',
			'777',
			'888',
			'999',
			'000'
		);
		foreach($arr as $a){
			str_replace($a,mt_rand(0,100),$str);
		}
		return $str;
	}
	/*
	生成一个唯一12位字符串
	*/
	static function GenerateId($namespace = null) {
		static $guid = '';
		$uid = uniqid ( "", true );

		$data = $namespace;
		$data .= $_SERVER ['REQUEST_TIME'];     // 请求那一刻的时间戳
		$data .= $_SERVER ['HTTP_USER_AGENT'];  // 获取访问者在用什么操作系统
		$data .= $_SERVER ['SERVER_ADDR'];      // 服务器IP
		$data .= $_SERVER ['SERVER_PORT'];      // 端口号
		$data .= $_SERVER ['REMOTE_ADDR'];      // 远程IP
		$data .= $_SERVER ['REMOTE_PORT'];      // 端口信息

		$hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );
		$guid=substr($hash,0,5).substr($hash,15,5).substr($hash,30,2);
		return $guid;
	}

}