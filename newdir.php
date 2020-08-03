<?php

//create new folder

    $add = $_POST['add'];
    
    if(isset($_POST['upload'])){
        if( !empty($add)){
         
            mkdir('./Home/'.$url.'/'. $_POST['add']);
           
      /*refresh current page */ echo "<meta http-equiv='refresh' content='0'>";
        }

        ?>
           <h4 class="h4">Create new folder</h4> 
        <form action = '' method = 'POST'> 
               <input type='text' name='add' id='add' value='' placeholder="Insert folder name">
                <input class='button' type='submit'  name='upload' id='upload' value="create">
        </form> 

   <?php } else {
           echo 
           "<h4 class='h4'>Create new folder</h4> 
           <form action = '' method = 'POST'> 
           <input type='text' name='add' id='add' placeholder='Insert folder name'>
            <input class='button' type='submit'  name='upload' id='upload' value='create'>
    </form> ";
   }

   ?>