<?php 

//Edit superhero  with a form 

define('ID', $_GET['id']);
define('NAME_HERO', $_GET['name']);
?>
<form action="./index.php?id='<?php echo ID ?>'"/>
    <input type='text' value=<?php echo NAME_HERO?> name='modifiedName' />
    <input type='hidden' name='id' value="<?php echo ID ?>" />
    <input type='submit' value='edit' />
</form>
<?php
