<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Songs</h1>
            <!-- display links for all songs -->            
            <table>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=songTitle&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=albumTitle&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=songWriter&amp;order=Asc">Sort Ascending</a></td>
				</tr>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=songTitle&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=albumTitle&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_songs&amp;sort=songWriter&amp;order=Desc">Sort Descending</a></td>
				</tr>
				<tr>
					<th>Song Title</th>
					<th>Album</th>
					<th>Song Writer</th>
				</tr>
			<?php foreach($songs as $song) : ?>
				<tr>
					<td>
						<a href="?action=view_song&amp;song_id=<?php echo $song->getSongID(); ?>">
							<?php echo $song->getSongTitle(); ?>
						</a>
					</td>
					<td><?php echo $albumDB->getAlbumTitleOfSong($song->getSongID()); ?></td>
					<td><?php echo $song->getSongWriter(); ?></td>
				</tr>
            <?php endforeach; ?>
			</table>
    </section>
</main>
<?php include 'view/footer.php'; ?>