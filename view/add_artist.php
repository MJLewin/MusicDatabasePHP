<?php include 'view/header.php'; ?>
<main>
    <section>
        <h1>Add New Artist</h1>
        <div>
			<form action="" method="POST">
			<input type="hidden" name="action" value="artist_add">
				<table>
					<tr>
						<td><label>Stage Name:</label></td>
						<td><input type="text" name="stageName" value=""></td>
					</tr>
					<tr>
						<td><label>Birth Name:</label></td>
						<td><input type="text" name="birthName" value=""></td>
					</tr>
					<tr>
						<td><label>Home Town:</label></td>
						<td><input type="text" name="homeTown" value=""></td>
					</tr>
					<tr>
						<td><label>Birth Date:</label></td>
						<td><input type="text" name="birthDate" value=""></td>
					</tr>
					<tr>
						<td><label>Death Date:</label></td>
						<td><input type="text" name="deathDate" value=""></td>
					</tr>
					<tr>
						<td><label>Fun Fact:</label></td>
						<td><input type="text" name="artistFunFact" value=""></td>
					</tr>
					<tr>
						<td class="submit_td"><input type="submit" name="add_artist" value="Add Artist"></td>
					</tr>
				</table>
			</form>
        </div>
		<br>
    </section>
</main>
<?php include 'view/footer.php'; ?>