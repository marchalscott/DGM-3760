<!DOCTYPE html>
<html>
<head>
	<title>Send That Email</title>
</head>
	<body>

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