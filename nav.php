<?php

    // make navigation

    $folders = scan_dir('./home/'.$url);           
    echo htmlMyPathIs($folders, $url);
    
function htmlMyPathIs($arr, $url) {  
        $out = '<table>';
        $out .=  '<tr><th>type</th><th>name</th><th>action</th></tr>';
        foreach ($arr as $k => $v) {
            if (! is_array($v)) { 
                $out .= '<tr><td>file</td><td>'.$v.'</td> </td></tr>';
            } else {
                $link = '?a='.$k;
                if (isset($url)) {
                    $link = '?a='.$url.'/'.$k;
                }
                $out .= '<tr><td>folder</td><td><a href="http://localhost/sprint1-master'.$link.'">'.$k.'</a></td><td>edit folder</td></tr>';
            }
        }
        $out .= '</table>';
        return $out;
    }

   ?>   
