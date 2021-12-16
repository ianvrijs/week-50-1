<?php

	class debug
	{
		/*

			This library can be used to log some of the information that you need
			in your framework.

			You dont need this kind of library but its certainly usefull and a
			start to a great framework.

			In combination with a line that can be used in PHP debugging is very imporant

			The line that can be used to debug is:

			echo "<br>\n" . 'DEBUG: ' . __FILE__ . ' : ' . __LINE__ . "<br>\n";

		*/

		private static $sDebugPath = '';

		public static function init()
		{
			self::$sDebugPath = ROOT_PATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'error.log';
		}

		public static function logger($sMessage, $sFile = false, $sLine = false)
		{
			$sText = '';

			if(!empty($sFile))
			{
				$sText .= 'FILE: ' . $sFile . ' ';
			}

			if(!empty($sLine))
			{
				$sText .= 'LINE: ' . $sLine . ' ';
			}

			$sDebugMessage = "DEBUG (" . date('c') . "): " . $sMessage . " " . trim($sText) . "\n";

			error_log($sDebugMessage, 3, self::$sDebugPath);
		}
	}
?>