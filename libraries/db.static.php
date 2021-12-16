<?php
    class database 
    {
        public static $oConnection = null;

        public static function init($dbHost = false, $dbName = false,  $dbUser = false, $dbPass = '')
        {
            if(!empty($dbHost) && !empty($dbUser) && !empty($dbName))
            {
                self::$oConnection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            }
            if(!empty(self::$oConnection->connect_error))
            {
                $sError = 'unsuccefull db connection ' . self::$oConnection->connect_error;
                echo $sError;
                die('accessing db without information');
            }
            if(empty(self::$oConnection))
            {
                die('DB IS NULL');
            }
            return true;
        }
   


    public static function select($sQuery = false)
    {
        if(!empty($sQuery))
        {
            $sQuery = trim($sQuery);

            if($oResult = self::$oConnection->query($sQuery))
            {
                if($oResult->num_rows > 0) 
                {
                    $aRecords = array();
                    while($aRow = $oResult->fetch_assoc())
                    {
                        //put in records
                        $aRecords[] = $aRow;
                    }

                    $oResult->free_result();
                    return $aRecords; //return result as array
                }
                else 
                {
                    echo 'bad query: no records found.';
                    return array(); //return empty array
                }
            }
            else
            {
                echo 'Query ("'. $sQuery .'") failed: ' . self::$oConnection->error;
            }
        }
        else 
        {
            echo 'No query given in select().';
        }
        return false;
    }
    public function execute($sQuery = false)
    {
        if(!empty($sQuery))
        {
            $sQuery = trim($sQuery);

            if(self::$oConnection->query($sQuery))
            {
                return true;
            }
            else {
                echo 'Query failed ' . (empty(self::$oConnection->error) ? 'UNKOWN ERROR' : self::oConnection->error);
            }
        }
        else 
        {
            echo 'no query given in the execute().';
        }
        return false;
    }
}
?>