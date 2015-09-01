<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Notes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			console.log("Ready");
			$("#add_form").submit(function(){
				console.log("Form Submitted");
				$.post(
					$(this).attr("action"),
					$(this).serialize(),
					function(result){
						console.log("Result object below:");
						console.log(result);
						$("#notepad").append(result.note);	
					},
					"json"
				);
				return false;
			})
		});
	</script>
	<style type="text/css">
		textarea{
			width: 300px;
			height: 100px;
		}
	</style>
</head>
<body>
<h1>My Notes</h1>
<div id="notepad">
<?php
	foreach($notes as $note){
		?>	<div class="note">
				<h3><?= $note['title']; ?></h3>
				<form action="/notes/update" method="post">
					<input type="hidden" name="note_id" value="<?= $note['id']; ?>">
					<textarea name="description" placeholder="Note content..."><?= $note['description']; ?></textarea>
					<input type="submit" value="Update">
				</form>
				<form action="/notes/delete" method="post">
					<input type="hidden" name="note_id" value="<?= $note['id']; ?>">
					<input type="submit" value="Delete">
				</form>
			</div><hr> <?php
	};
?>
</div>
<form action="/notes/add" method="post" id="add_form">
	<input type="text" name="title" placeholder="New Note Title">
	<input type="submit">
</form>	

</body>
</html>