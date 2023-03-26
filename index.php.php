<!DOCTYPE html>
<html>
<head>
	<title>Profil Wisata</title>
</head>
<body>
	<h1>Profil Wisata</h1>
	<form method="GET">
		<label for="location">Lokasi:</label>
		<input type="text" name="location" placeholder="Masukkan lokasi"><br><br>
		<label for="radius">Jarak (dalam meter):</label>
		<input type="number" name="radius" placeholder="Masukkan jarak"><br><br>
		<button type="submit">Cari Wisata</button>
	</form>

	<?php
	if(isset($_GET['location']) && isset($_GET['radius'])) {
		$location = $_GET['location'];
		$radius = $_GET['radius'];
		$api_key = 'your_api_key_here';

		$url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=tourist+attractions+in+$location&radius=$radius&key=$api_ke
		$data = file_get_contents($url);
		$json_data = json_decode($data, true);y";

		if($json_data['status'] == 'OK') {
			echo "<h2>Wisata di $location dalam jarak $radius meter:</h2>";
			foreach($json_data['results'] as $result) {
				$name = $result['name'];
				$address = $result['formatted_address'];
				$rating = isset($result['rating']) ? $result['rating'] : 'Tidak ada rating';
				echo "<p><strong>$name</strong><br>$address<br>Rating: $rating</p>";
			}
		} else {
			echo "<p>Tidak dapat menemukan wisata di lokasi tersebut.</p>";
		}
	}
	?>
</body>
</html>