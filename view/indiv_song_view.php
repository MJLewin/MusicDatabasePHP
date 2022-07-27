<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1><?php echo $song->getSongTitle(); ?></h1>
        <div>
			<table>
				<tr>
					<td>Artist:</td>
					<td><?php echo $artistDB->getArtistOfSong($song->getSongID()); ?></td>
				</tr>
				<tr>
					<td>Album:</td>
					<td>
						<a href="?action=view_album&amp;album_id=<?php echo $song->getAlbumID(); ?>">
							<?php echo $albumDB->getAlbumTitleOfSong($song->getSongID()); ?>
						</a>
					</td>
				</tr>
				<tr>
					<td>Length</td>
					<td><?php echo $song->getSongLength_f(); ?></td>
				</tr>
				<tr>
					<td>Writer</td>
					<td><?php echo $song->getSongWriter(); ?></td>
				</tr>
				<tr>
					<td>Top Billboard Rank:</td>
					<td><?php echo $song->getTopRank_f(); ?></td>
				</tr>
				<tr>
					<td>Rank Date:</td>
					<td><?php echo $song->getRankDate_f(); ?></td>
				</tr>
				<tr>
					<td>User Comment:</td>
					<td><?php echo $song->getUserComment(); ?></td>
				</tr>
			</table>
			<br>
			<a href="?action=update_song&amp;song_id=<?php echo $song->getSongID(); ?>&amp;album_id=<?php echo $album->getAlbumID(); ?>">Update Song Info</a>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>