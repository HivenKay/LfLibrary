<?php
class LfDateAndWeek {
	static function GetWeek() {
		$data = date('w');
		switch ($data) {
			case 1:
				$week = '星期一';
				break;
			case 2:
				$week = '星期二';
				break;
			case 3:
				$week = '星期三';
				break;
			case 4:
				$week = '星期四';
				break;
			case 5:
				$week = '星期五';
				break;
			case 6:
				$week = '星期六';
				break;
			case 0:
				$week = '星期日';
				break;
		}
		return $week;
	}
//传入时间戳，返回时间差
	static function timediff($begin_time, $end_time) {
		if ($begin_time < $end_time) {
			//判断传入的时间哪一个大
			$starttime = $begin_time;
			$endtime = $end_time;
		} else {
			$starttime = $end_time;
			$endtime = $begin_time;
		}
		$timediff = $endtime - $starttime; //获取整个时间差
		$days = intval($timediff / 86400); //除以86400获得相差的天数
		$remain = $timediff % 86400; //获得除以86400余数
		$hours = intval($remain / 3600); //获取小时差
		$remain = $remain % 3600;
		$mins = intval($remain / 60); //获取分钟数差
		$secs = $remain % 60;
		$res = array("day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs);
		return $res;
	}
		/*
	 * 根据当前日期获取本周或上周的日期
	 * time = 0 返回本周的所有日期
	 * time = 1 返回上周的所有日期
	 * 返回日期格式为时间戳
	 */
	static function GetDateForWeek($time = 0)
	{
		$week = date("w");
		$date = array();
		for ($i = 1; $i < 8; $i++) {
			if ($i < $week && $time == 0) {
				$date[] = strtotime(date("Y-m-d", time() - ($week - $i) * 24 * 3600));
			}
			if ($i < $week && $time == 1) {
				$date[] = strtotime(date("Y-m-d", time() - ($week - $i + 7) * 24 * 3600));
			}
			if ($i >= $week && $time == 0) {
				$date[] = strtotime(date("Y-m-d", time() - ($week - $i) * 24 * 3600));
			}
			if ($i >= $week && $time == 1) {
				$date[] = strtotime(date("Y-m-d", time() - ($week - $i + 7) * 24 * 3600));
			}
		}
		return $date;
	}

	/*
	 * 根据当前日期获取本月的日期
	 * time = 0 返回本月四周的所有开始日期
	 * time = 1 返回上月四周的所有开始日期
	 * date("Y") 为本月结束时间
	 * 返回日期格式为时间戳
	 */
	static function GetDateForMonth($time = 0)
	{
		//本月开始时间戳
		$MonthBeginDay = mktime(0, 0, 0, date("m") - $time, 1, date("Y"));
		for ($i = 0; $i < 5; $i++) {
			$date[] = $MonthBeginDay + $i * 7 * 24 * 3600;
		}
		return $date;
	}

	/*
    * 获取本年的所有月的日期
    * time = 0 返回本年的所有月的开始日期
    * time = 1 返回上一年的所有月的开始日期
	 * 返回日期格式为时间戳
    */
	static function GetDateForYear($time = 0)
	{
		for ($i = 1; $i <= 12; $i++) {
			$date[] = mktime(0, 0, 0, $i, 1, date("Y") - $time);
		}
		return $date;
	}
}