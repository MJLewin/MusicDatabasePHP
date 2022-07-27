<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Edit Song Info</h1>
        <div>
			<form action="" method="POST">
			<input type="hidden" name="action" value="song_update">
				<table>
					<tr>
						<td><label>Album:</label></td>
						<td><?php echo $album->getAlbumTitle(); ?></td>
					</tr>
					<tr>
						<td><label>Song Title:</label></td>
						<td><input type="text" name="songTitle" value="<?php echo $song->getSongTitle(); ?>"></td>
					</tr>
					<tr>
						<td><label>Song Length:</label></td>
						<td><input type="text" name="songLength" value="<?php echo $song->getSongLength(); ?>"></td>
					</tr>
					<tr>
						<td><label>Song Writer:</label></td>
						<td><input type="text" name="songWriter" value="<?php echo $song->getSongWriter(); ?>"></td>
					</tr>
					<tr>
						<td><label>Top Billboard Rank:</label></td>
						<td><input type="text" name="topRank" value="<?php echo $song->getTopRank(); ?>"></td>
					</tr>
					<tr>
						<td><label>Rank Date:</label></td>
						<td><input type="text" name="rankDate" value="<?php echo $song->getRankDate(); ?>"></td>
					</tr>
					<tr>
						<td><label>Comment:</label></td>
						<td><input type="text" name="userComment" value="<?php echo $song->getUserComment(); ?>"></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="update_song" value="Update Info"></td>
					</tr>
					<input type="hidden" name="song_id" value="<?php echo $song->getSongID(); ?>">
					<input type="hidden" name="album_id" value="<?php echo $album->getAlbumID(); ?>">
				</table>
			</form>
        </div>
		<br>
    </section>
</main>
<?php include 'view/footer.php'; ?>