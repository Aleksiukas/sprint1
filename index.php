<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

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
            echo '<button onclick="window.history.back()">Go Back</button>';
        }

            $folders = scan_dir('./home/'.$url);           
                echo htmlMyPathIs($folders, $url);


    function htmlMyPathIs($arr, $url) {  
        $out = '<table>';
        $out .=  '<tr><th>type</th><th>name</th><th>action</th></tr>';
        foreach ($arr as $k => $v) {
            if (! is_array($v)) { 
                $out .= '<tr><td>file</td><td>'.$v.'</td><td></td></tr>';
            } else {
                $link = '?a='.$k;
                if (isset($url)) {
                    $link = '?a='.$url.'/'.$k;
                }
                $out .= '<tr><td>folder</td><td><a href="http://localhost/Pamokos/Project_one'.$link.'">'.$k.'</a></td><td>edit folder</td></tr>';
            }
        }
        $out .= '</table>';
        return $out;
    }
        //create new folder
        function creatdir(){
            $newcwd=getcwd();
            $add = $_POST['add'];
            mkdir($newcwd.$add);
        }
        
        if(!isset($_POST['upload'])){
     ?>
             <form action = '' method = 'POST'> 
                    <input type='text' name='add' id='add'>
                     <input class='button' type='submit' name='upload' id='upload'>
             </form> 

        <?php } else {
                creatdir();
                echo "<form action = '' method = 'POST'> 
                <input type='text' name='add' id='add'>
                 <input class='button' type='submit'    value='create' name='upload' id='upload'>
         </form> ";
        } 
             ?>
</body>
</html>
