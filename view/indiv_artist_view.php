<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1><?php echo $artist->getStageName(); ?></h1>
        <div>
			<table>
				<tr>
					<td>Stage Name:</td>
					<td><?php echo $artist->getStageName(); ?></td>
				</tr>
				<tr>
					<td>Birth Name:</td>
					<td><?php echo $artist->getBirthName(); ?></td>
				</tr>
				<tr>
					<td>Home Town:</td>
					<td><?php echo $artist->getHomeTown(); ?></td>
				</tr>
				<tr>
					<td>Birth Date:</td>
					<td><?php echo $artist->getBirthDate(); ?></td>
				</tr>
				<tr>
					<td>Death Date:</td>
					<td><?php echo $artist->getDeathDate_f(); ?></td>
				</tr>
				<tr>
					<td>Fun Fact:</td>
					<td><?php echo $artist->getArtistFunFact(); ?></td>
				</tr>
			</table>
			<br>
			<a href="?action=update_artist&amp;artist_id=<?php echo $artist->getArtistID(); ?>">Update Artist Info</a>
			<a href="?action=delete_artist&amp;artist_id=<?php echo $artist->getArtistID(); ?>">Delete Artist</a>
        </div>
		<br>
		<div>
			<table>
				<tr>
					<th>Song List</th>
				</tr>
				<?php foreach($songs as $songID => $songTitle) : ?>
				<tr>
					<td>
						<a href="?action=view_song&amp;song_id=<?php echo $songID; ?>">
							<?php echo $songTitle; ?>
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
				<tr>
				</tr>
			</table>
			<br>
		</div>
    </section>
</main>
<?php include 'view/footer.php'; ?>