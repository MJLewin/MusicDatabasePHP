<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Update Album Info</h1>
        <div>
			<form action="" method="POST">
			<input type="hidden" name="action" value="album_update">
				<table>
					<tr>
						<td><label>Artist:</label></td>
						<td><select name="artist_id">
						<?php foreach ($artists as $artist) : ?>
							<option value="<?php echo $artist->getArtistID(); ?>"><?php echo $artist->getStageName(); ?></option>
						<?php endforeach; ?>
						</td>
					</tr>
					<tr>
						<td><label>Album Title:</label></td>
						<td><input type="text" name="albumTitle" value="<?php echo $album->getAlbumTitle(); ?>"></td>
					</tr>
					<tr>
						<td><label>Record Label:</label></td>
						<td><input type="text" name="recordLabel" value="<?php echo $album->getRecordLabel(); ?>"></td>
					</tr>
					<tr>
						<td><label>Genre:</label></td>
						<td><input type="text" name="genre" value="<?php echo $album->getGenre(); ?>"></td>
					</tr>
					<tr>
						<td><label>ReleaseDate:</label></td>
						<td><input type="text" name="releaseDate" value="<?php echo $album->getReleaseDate(); ?>"></td>
					</tr>
					<tr>
						<td><label>Fun Fact:</label></td>
						<td><input type="text" name="albumFunFact" value="<?php echo $album->getAlbumFunFact(); ?>"></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="update_album" value="Update Info"></td>
					</tr>
					<input type="hidden" name="albumID" value="<?php echo $album->getAlbumID(); ?>">
				</table>
			</form>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>