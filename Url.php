<?php

         // get url in to array

function scan_dir(string $path, bool $hidden = false){  
        
        $out = [];
        $path = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
        $read = opendir($path);
            
        while (false !== ($res = readdir($read))) {
            
            if ($res === '.' || $res === '..'  || ($hidden === false && $res[0] === '.')) {
                continue;
            }
            

            if (is_dir($path.$res)) {       
              $out[$res] = scan_dir($path.$res, $hidden);
            
            } else {
                $out[] = $res;
            }
            
            
        }
    
            closedir($read);
            return $out;
    }
    
            $url = false;
            if (isset($_GET["a"])){
                $url = $_GET["a"];
                //back button
                echo '<button onclick="window.history.back()">Go Back</button>';
            }
               
?>    