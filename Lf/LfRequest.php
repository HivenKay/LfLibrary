<?php
class LfRequest{
	/*
	*传入请求的参数名$str,错误时抛出的信息
	*判断请求的参数是否设置，为空
	*此处只做请求判断，并抛出异常，不显示页面
	*/
	static	function JudgeRequst($str){
		if (!isset($_REQUEST[$str])) {
			die($str.' hasn`t be setted');
		}
		if (empty($_REQUEST[$str])) {
			die($str.' can`t be empty');
		} else {
			return $_REQUEST[$str];
		}
	}
	//读入一个参数,并且类型是字符串,不符合要求的返回''
	static function inStr($key){
		if (!isset($_REQUEST[$key])){
			return '';
		}
		$val = $_REQUEST[$key];
        //可能是数组
		if (!is_string($val)){
			return '';
		}
		return $val;
	}

    //读入一个参数,并且类型是数值,不符合要求的返回0
	static function inNum($key){
		if (empty($_REQUEST[$key])){
			return 0;
		}
		$val = $_REQUEST[$key];
        //可能是数组
		if (!is_string($val)){
			return 0;
		}
		return intval($val);
	}
    //读入一个参数,并且类型是数组,不符合要求返回array()
    //注意此处不能保证返回的array的内部的数据结构.
	static function inArray($key){
		if (empty($_REQUEST[$key])){
			return array();
		}
		$val = $_REQUEST[$key];
		if (!is_array($val)){
			return array();
		}
		return $val;
	}

}