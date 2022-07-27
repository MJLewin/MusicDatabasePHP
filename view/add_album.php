<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Add New Album</h1>
        <div>
			<form action="" method="POST">
			<input type="hidden" name="action" value="album_add">
				<table>
					<tr>
						<td><label>Album Title:</label></td>
						<td><input type="text" name="albumTitle" value=""></td>
					</tr>
					<tr>
						<td><label>Record Label:</label></td>
						<td><input type="text" name="recordLabel" value=""></td>
					</tr>
					<tr>
						<td><label>Genre:</label></td>
						<td><input type="text" name="genre" value=""></td>
					</tr>
					<tr>
						<td><label>ReleaseDate:</label></td>
						<td><input type="text" name="releaseDate" value=""></td>
					</tr>
					<tr>
						<td><label>Fun Fact:</label></td>
						<td><input type="text" name="albumFunFact" value=""></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="add_album" value="Add Album"></td>
					</tr>
				</table>
			</form>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>