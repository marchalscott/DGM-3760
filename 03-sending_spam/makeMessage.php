<!DOCTYPE html>
<html>
<head>
	<title>Send That Email</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
	<body>
<?php include_once('nav.php'); ?>
		<form action="sendMessage.php" method="POST" enctype="multipart/form-data" name="travelInfo"</form>
			<fieldset>
				<legend>Spam a Message</legend>
			<label>
				<p>Subject:</p>
				<input type="text" name="subject" value="" placeholder="subject" required>
			</label>
			<label>
				<p>Message:</p>
				<textarea type="text" name="message" value="" placeholder="message here" required></textarea>
			</label>
			<input type="submit" value="Send" class="submitBtn">
			</fieldset>
		</form>
	</body>
</html>