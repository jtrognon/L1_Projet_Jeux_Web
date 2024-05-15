<?php
session_start();
include("../lib/global/header.php");
include("../lib/fonction_histoire.php");
?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	</head>
<body>
    <h1> Page d'histoire </h1>

	<table class="barre_menu">
		<thead>
			<tr>
				<th><a href="">Profil</a></th>
				<th><a href="">Aide</a></th>
				<th><a href="menu_vue.php">Menu</a></th>
			</tr>
		</thead>
	</table>

	<div class="onglet_histoire">
		<div class="box box_affichage_personnage">
			<?php
				$img = url_img_histoire($conn);
				echo("<img src="."'images/$img' class="."'image_histoire'"."/>");
			?>
		</div>
		
		<div class="box">
			<div class="box box_affichage_dialogues">
				<?php
					echo("
						<div class='dialogue'>
							<div><p> image perso </p></div>
							<div id='dialogue_1'>Bla bla bla bla</div>
						</div>
						<div class='dialogue'>
							<div id='dialogue_2'>blobli blobla blo</div>
							<div><p> image perso </p></div>
						</div>
						<div class='dialogue'>
							<div><p> image perso </p></div>
							<div id='dialogue_3'>bloblibla bloblabl</div>
						</div>
					");
				?>
			</div>
			<div class="box box_choix_dialogue">
				<?php
					$nb_dialogue = 3; // UTILISER nb_dialogue_suivant($conn)
					$dialogue_1 = "Lorem ipsum";
					$dialogue_2 = "Culpa tempora eligendi asperiores molestiae et quasi consequatur omnis iusto, soluta sit ducimus pariatur esse.";
					$dialogue_3 = "Cumque provident magni, nostrum quibusdam porro accusantium?";
					if ($nb_dialogue == 1){
						echo("
							<div class='choix_unique'> 
							<button type='submit'> $dialogue_1 </button>
							</div>
						");
					}
					else if ($nb_dialogue == 2){
						echo("
							<div class='choix_double'> 
								<button type='submit'> $dialogue_1 </button>
								<button type='submit'> $dialogue_2 </button>
							</div>
						");
					}
					else{
						echo("
							<div class='choix_triple'> 
								<button type='submit'> $dialogue_1 </button>
								<button type='submit'> $dialogue_2 </button>
								<button type='submit'> $dialogue_3 </button>
							</div>
						");
					}
				?>
			</div>
		</div>
		<div class="box box_affichage_dé">
			<?php
				$lancer_dé = true;
				if ($lancer_dé == true){
					$valeur = "3";
					echo("<img src="."'images/image_dé_$valeur.jpg' class="."'image_dé'".">");
				}
			?>
		</div>
	</div>

</body>

</html>