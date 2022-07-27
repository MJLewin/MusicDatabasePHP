<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Albums</h1>
		<p><a href="?action=add_album">Add New Album</a></p><br>
		<table>
			<tr>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=albumTitle&amp;order=Asc">Sort Ascending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=stageName&amp;order=Asc">Sort Ascending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=genre&amp;order=Asc">Sort Ascending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=recordLabel&amp;order=Asc">Sort Ascending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=releaseDate&amp;order=Asc">Sort Ascending</a></td>
			</tr>
			<tr>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=albumTitle&amp;order=Desc">Sort Descending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=stageName&amp;order=Desc">Sort Descending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=genre&amp;order=Desc">Sort Descending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=recordLabel&amp;order=Desc">Sort Descending</a></td>
				<td class="sort_td"><a href="?action=change_sort&amp;page=all_albums&amp;sort=releaseDate&amp;order=Desc">Sort Descending</a></td>
			</tr>
			<tr>
				<th>Album Title</th>
				<th>Artist</th>
				<th>Genre</th>
				<th>Label</th>
				<th>Release Date</th>
			</tr>
		<?php foreach($albums as $album) : ?>
			<tr>
				<td>
					<a href="?action=view_album&amp;album_id=<?php echo $album->getAlbumID(); ?>">
						<?php echo $album->getAlbumTitle(); ?>
					</a>
				</td>
				<td><?php echo $artistDB->getArtistOfAlbum($album->getAlbumID()); ?></td>
				<td><?php echo $album->getGenre(); ?></td>
				<td><?php echo $album->getRecordLabel(); ?></td>
				<td><?php echo $album->getReleaseDate(); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
    </section>
</main>
<?php include 'view/footer.php'; ?>