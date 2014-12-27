<?php
	require 'depend/vendor/autoload.php';
	use GeoIp2\Database\Reader;
    
	define('JSON_OPTIONS', JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    $ip = $_SERVER['REMOTE_ADDR'];

    try{
        $reader = new Reader('GeoLite2/GeoLite2-City.mmdb');
        $record = $reader->city($ip); 
                
        if(htmlspecialchars($_GET["info"])=="all"){
            header("Content-Type:application/json; charset=utf-8");
            echo json_encode($record, JSON_OPTIONS)."\n";
        }else{
            header("Content-Type:text/plain; charset=utf-8");
            echo $ip."\n";
            echo $record->country->name."\n";
        }                   
    }catch(Exception $error) {
        header("Content-Type:text/plain; charset=utf-8");
        http_response_code(400);
        echo $error->getMessage()."\n";
        echo "Fork U :p";        
	}
?>
