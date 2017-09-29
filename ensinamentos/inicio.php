<?php         
$link   = DBConnect();
$query  = "SELECT * FROM dp_ensinamentos WHERE pin > 0 ORDER BY pin ASC LIMIT 3";
$result = mysqli_query($link, $query);
if($result != null) { $rows = mysqli_num_rows($result); } else { $rows = 0; }

if($rows > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$pregador = $row['pregador'];
		$titulo = $row['titulo'];
		$imagem = $row['imagem'];

		echo '<div id="news">
						<h2>'.$pregador.'</h2>
						<span>'.$titulo.'</span>
						<img src="'.$imagem.'" alt="">
					</div>';
	}
} 

echo '<style>.grid-top3news { grid-template-columns: repeat('.$rows.', 1fr); }</style>';  
?>

</div>
</section>




