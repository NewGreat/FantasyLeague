<script type="text/javascript">
	localStorage.clear();
</script>
<?php
session_start();

session_destroy();
//header('location:index.php');
?>
<a href="index.php">Go to login page</a>