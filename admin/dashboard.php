<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php" ?>
<?php

	if(!isset($_SESSION['ADMIN']))
	{
		header("location:index.php");
	}
	else
	{
		
	}

?>

<body>
	<div class="wrapper">
		<?php include "includes/nav.php" ?>

		<div class="main">
			<?php include "includes/header.php" ?>

			<?php include "navbar.php" ?>			

			<?php include "includes/footer.php" ?>
		</div>
	</div>

	<?php include "includes/script.php" ?>
</body>

</html>