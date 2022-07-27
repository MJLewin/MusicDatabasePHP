<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1><?php echo $album->getAlbumTitle(); ?></h1>
        <div>
			<table>
				<tr>
					<td>Artist:</td>
					<td><?php echo $artistDB->getArtistOfAlbum($album->getAlbumID()); ?></td>
				</tr>
				<tr>
					<td>Record Label:</td>
					<td><?php echo $album->getRecordLabel(); ?></td>
				</tr>
				<tr>
					<td>Genre:</td>
					<td><?php echo $album->getGenre(); ?></td>
				</tr>
				<tr>
					<td>Release Date:</td>
					<td><?php echo $album->getReleaseDate(); ?></td>
				</tr>
				<tr>
					<td>Fun Fact:</td>
					<td><?php echo $album->getAlbumFunFact(); ?></td>
				</tr>
			</table>
			<br>
			<a href="?action=update_album&amp;album_id=<?php echo $album->getAlbumID(); ?>">Update Album Info</a>
        </div>
		<div>
			<p><a href="?action=add_song&amp;album_id=<?php echo $album->getAlbumID(); ?>">Add New Song To Album</a></p>
			<p><a href="?action=delete_album&amp;album_id=<?php echo $album->getAlbumID(); ?>">Delete Album</a></p>
			<h3>Song List</h3>
			<table>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songTitle&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songWriter&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=topRank&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songLength&amp;order=Asc">Sort Ascending</a></td>
				</tr>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songTitle&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songWriter&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=topRank&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=indiv_album&amp;album=<?php echo $album->getAlbumID(); ?>&amp;sort=songLength&amp;order=Desc">Sort Descending</a></td>
				</tr>
				<tr>
					<th>Title</th>
					<th>Writer</th>
					<th>Top Billboard Rank</th>
					<th>Length</th>
				</tr>
			<?php foreach($songs as $song) : ?>
				<tr>
					<td>
						<a href="?action=view_song&amp;song_id=<?php echo $song->getSongID(); ?>">
							<?php echo $song->getSongTitle(); ?>
						</a>
					</td>
					<td><?php echo $song->getSongWriter(); ?></td>
					<?php if($song->getTopRank() == 0) : ?>
						<td>-</td>
					<?php else : ?>
						<td><?php echo $song->getTopRank(); ?></td>
					<?php endif; ?>
					<td><?php echo $song->getsongLength_f(); ?></td>
					<td class="delete_td"><a href="?action=delete_song&amp;song_id=<?php echo $song->getSongID(); ?>&amp;album_id=<?php echo $album->getAlbumID(); ?>">Delete Song</a></td>
				</tr>
			<?php endforeach; ?>
			</table>
			<br>
		</div>
    </section>
</main>
<?php include 'view/footer.php'; ?>