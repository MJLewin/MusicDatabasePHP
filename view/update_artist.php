<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Update Artist Info</h1>
        <div>
			<form action="" method="POST">
			<input type="hidden" name="action" value="artist_update">
				<table>
					<tr>
						<td><label>Stage Name:</label></td>
						<td><input type="text" name="stageName" value="<?php echo $artist->getStageName(); ?>"></td>
					</tr>
					<tr>
						<td><label>Birth Name:</label></td>
						<td><input type="text" name="birthName" value="<?php echo $artist->getBirthName(); ?>"></td>
					</tr>
					<tr>
						<td><label>Home Town:</label></td>
						<td><input type="text" name="homeTown" value="<?php echo $artist->gethomeTown(); ?>"></td>
					</tr>
					<tr>
						<td><label>Birth Date:</label></td>
						<td><input type="text" name="birthDate" value="<?php echo $artist->getBirthDate(); ?>"></td>
					</tr>
					<tr>
						<td><label>Death Date:</label></td>
						<td><input type="text" name="deathDate" value="<?php echo $artist->getDeathDate(); ?>"></td>
					</tr>
					<tr>
						<td><label>Fun Fact:</label></td>
						<td><input type="text" name="artistFunFact" value="<?php echo $artist->getArtistFunFact(); ?>"></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="update_artist" value="Update Info"></td>
					</tr>
						<input type="hidden" name="artistID" value="<?php echo $artist->getArtistID(); ?>">
				</table>
			</form>
        </div>
		<br>
    </section>
</main>
<?php include 'view/footer.php'; ?>