<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Add Song To Album</h1>
        <div>
			<p>Album: <?php echo $album->getAlbumTitle(); ?></p>
			<form action="" method="POST">
			<input type="hidden" name="action" value="song_add">
				<table>
					<tr>
						<td><label>Song Title:</label></td>
						<td><input type="text" name="songTitle" value=""></td>
					</tr>
					<tr>
						<td><label>Song Length:</label></td>
						<td><input type="text" name="songLength" value=""></td>
					</tr>
					<tr>
						<td><label>Song Writer:</label></td>
						<td><input type="text" name="songWriter" value=""></td>
					</tr>
					<tr>
						<td><label>Top Billboard Rank:</label></td>
						<td><input type="text" name="topRank" value=""></td>
					</tr>
					<tr>
						<td><label>Rank Date:</label></td>
						<td><input type="text" name="rankDate" value=""></td>
					</tr>
					<tr>
						<td><label>Comment:</label></td>
						<td><input type="text" name="userComment" value=""></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="add_song" value="Add Song"></td>
					</tr>
						<input type="hidden" name="album_id" value="<?php echo $album->getAlbumID(); ?>">
				</table>
			</form>
        </div>
		<br>
    </section>
</main>
<?php include 'view/footer.php'; ?>