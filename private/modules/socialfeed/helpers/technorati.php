<?php defined('SYSPATH') or die('No direct script access.');

class Technorati_core
{
	public static function httpPost( $host, $port, $uri, $data, $userAgent = "ZestCMS/0.4" )
	{
		$url = "http://${host}:${port}${uri}";
		
		$fp = @fsockopen( $host, $port, $errno, $errstr, 5);
		if (!$fp)
			return false;
		
		$out = "POST ${uri} HTTP/1.1\r\n";
		$out .= "Host: ${host}\r\n";
		$out .= "Content-Type: text/xml\r\n";
		$out .= "Content-Length: ". strlen($data). "\r\n";
		
		fwrite($fp, $out);
		fwrite($fp, "\r\n");
		fwrite($fp, $data);
		fwrite($fp, "\r\n");
		fpassthru($fp);
		
		fclose($fp);
		return true;
	}
	
	public static function ping( $title, $url )
	{
		$uTitle = htmlspecialchars($title);
		$uUrl = htmlspecialchars($url);
		$xml = "<?xml version=\"1.0\"?>\n";
		$xml .= "<methodCall>\n";
		$xml .= "<methodName>weblogUpdates.ping</methodName>\n";
		$xml .= "<params>\n";
		$xml .= "<param>\n<value>$uTitle</value>\n</param>\n";
		$xml .= "<param>\n<value>$uUrl</value>\n</param>\n";
		$xml .= "</params>\n";
		$xml .= "</methodCall>\n";
		
		return Technorati::httpPost( "rpc.technorati.com", 80, "/rpc/ping", $xml );
		
	}
}