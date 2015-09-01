<div class="note">
	<h3><?= $title; ?></h3>
	<form action="/notes/update" method="post">
		<input type="hidden" name="note_id" value="<?= $id; ?>">
		<textarea name="description" placeholder="Note content..."></textarea>
		<input type="submit" value="Update">
	</form>
	<form action="/notes/delete" method="post">
		<input type="hidden" name="note_id" value="<?= $id; ?>">
		<input type="submit" value="Delete">
	</form>
<hr>
</div>
