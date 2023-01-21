<?php


$ip=$_SERVER["REMOTE_ADDR"];



if (trim($ip) <> "") {

   $ip = trim($ip);

   $fp = fsockopen("whois.ripe.net", 43, $errno, $errstr, 30);

   if (!$fp) {

      echo "$errstr ($errno)";

   } else {

      fputs($fp, "$ip\r\n");

      print "<pre>\r\n";

      while (!feof($fp)) {

         echo fread($fp,128);

      }

      print "</pre>";

      fclose ($fp);

   }

}

?>