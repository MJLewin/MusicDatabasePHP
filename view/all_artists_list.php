<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Artists</h1>
		<p><a href="?action=add_artist">Add New Artist</a></p><br>
            <!-- display links for all artists -->
			<table>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=stageName&amp;order=Asc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=birthDate&amp;order=Desc">Sort Ascending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=numSongs&amp;order=Asc">Sort Ascending</a></td>
				</tr>
				<tr>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=stageName&amp;order=Desc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=birthDate&amp;order=Asc">Sort Descending</a></td>
					<td class="sort_td"><a href="?action=change_sort&amp;page=all_artists&amp;sort=numSongs&amp;order=Desc">Sort Descending</a></td>
				</tr>
				<tr>
					<th>Artist</th>
					<th>Age</th>
					<th>Number of Songs</th>
				</tr>
			<?php foreach($artists as $artist) : ?>
				<tr>
					<td>
						<a href="?action=view_artist&amp;artist_id=<?php echo $artist->getArtistID(); ?>">
							<?php echo $artist->getStageName(); ?>
						</a>
					</td>
					<td><?php echo $artist->getBirthDate_f(); ?></td>
					<td><?php echo $songDB->getNumberOfSongs($artist->getArtistID()); ?></td>
				</tr>
            <?php endforeach; ?>
			</table>
    </section>
</main>
<?php include 'view/footer.php'; ?>
