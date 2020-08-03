
<form name="deleteSomething" action="<?php echo $_SERVER["PHP_SELF"]."?delete=true";?> >
<input type="button" name="fileToDelete" value="<?php echo $file; ?>">
<input type="submit" value="Delete">


<?php
if(isset($_GET['delete']) && $_GET['delete']=='true') {
   unlink($v.$_POST['fileToDelete']);
}
?>
