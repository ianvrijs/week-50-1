<?php
	class html
	{
		private $sHtml = '';
		private $sTitle = '';
		private $sFavicon = '';
		private $sHtmlBody = '';
		private $aCss = [];
		private $aJs = [];

		public function __construct()
		{

		}

		private function renderHtml()
		{
			$sHtml = '';
			$sHtml .= '
<!DOCTYPE html>
    <head>
	<title>' . $this->sTitle .'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">';

			if(!empty($this->sFavicon))
			{
				$sHtml .= '
	<link rel="shortcut icon" type="image/png" href="' . $this->sFavicon . '"/>';
			}

			if(is_array($this->aCss) && sizeof($this->aCss))
			{
				foreach($this->aCss as $sCss)
				{
					$sHtml .= '' . $sCss;
				}
			}

	$sHtml .= '
</head>
<body>


	' . $this->sHtmlBody . '';

			if(is_array($this->aJs) && sizeof($this->aJs))
			{
				foreach($this->aJs as $sJs)
				{
					$sHtml .= '' . $sJs;
				}
			}

	$sHtml .= '
        </body>
        </html>';

			$this->sHtml = $sHtml;
		}

		public function addHtml($sHtml, $bWrapper = false, $sTagname = '')
		{
            if(!$bWrapper){
                $this->sHtmlBody .=  $sHtml;
            }   
            else {
                if(empty($sTagname)) {
                    $sTagname = 'div';
                }

                $this->sHtmlBody .= '
                    <'. $sTagname . '>
                        <div class="justified">
                            <div class="content">
                            '. $sHtml .'
                            </div>
                        </div>
                    </'. $sTagname . '>
                ';
            }
		}

        public function addCss($sFile){
            $this->aCss[] = '<link rel="stylesheet" type="text/css" href="' . ROOT_URL . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . $sFile . '"/>';
        }
		public function doOutput()
		{
			if(empty($this->sHtml))
			{
				$this->renderHtml();
			}

			if(!empty($this->sHtml))
			{
				echo trim($this->sHtml);
				exit;
			}
			else
			{
				echo "NO OUTPUT FOUND!";
				exit;
			}
		}

		public function setTitle($sTitle)
		{
			$this->sTitle = $sTitle;
		}
	}

?>