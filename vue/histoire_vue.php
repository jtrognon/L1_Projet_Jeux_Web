<?php
session_start();
include("../lib/global/header.php");
include("../lib/fonction_histoire.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_personnage.php");
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
					$dialogues = last_3_dialogue($conn, $_SESSION["id_user"],$_GET["id_histoire"]);
					$perso = last_3_personnage($conn, $_SESSION["id_user"],$_GET["id_histoire"]);
					$dialogue_1 = $dialogues[2];
					$perso_1 = $perso[2];
					$dialogue_2 = $dialogues[1];
					$perso_2 = $perso[1];
					$dialogue_3 = $dialogues[0];
					$perso_3 = $perso[0];
					echo("
						<div class='dialogue'>
							<div>$perso_1</div>
							<div id='dialogue_1'>$dialogue_1</div>
						</div>
						<div class='dialogue'>
							<div id='dialogue_2'>$dialogue_2</div>
							<div>$perso_2</div>
						</div>
						<div class='dialogue'>
							<div>$perso_3</div>
							<div id='dialogue_3'>$dialogue_3</div>
						</div>
					");
				?>
			</div>
			<div class="box box_choix_dialogue">
				<?php
					$dialogues = dialogue_suivant($conn,$_SESSION["id_user"],$_GET["id_histoire"]);
					$nb_dialogue = nb_dialogue_suivant($conn, $_SESSION["id_user"],$_GET["id_histoire"]);
					if ($nb_dialogue == 1){
						$dialogue_1 = $dialogues[0];
						echo("
							<div class='choix_unique'>
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit'> $dialogue_1 </button>
								</form>
							</div>
						");
					}
					else if ($nb_dialogue == 2){
						echo("
							$dialogue_1 = $dialogues[0];
							$dialogue_2 = $dialogues[1];
							<div class='choix_double'>
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit'> $dialogue_1 </button>
									<button type='submit'> $dialogue_2 </button>
								</form>
							</div>
						");
					}
					else{
						//si jamais : <input type='submit' value='Option 1' name='1'>
						$dialogue_1 = $dialogues[0];
						$dialogue_2 = $dialogues[1];
						$dialogue_3 = $dialogues[2];
						echo("
							<div class='choix_triple'> 
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit' name='1'> $dialogue_1 </button>
									<button type='submit' name='2'> $dialogue_2 </button>
									<button type='submit' name '3'> $dialogue_3 </button>
								</form>
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
<?php
if (isset($_POST["1"])){
	save_choice($conn, $_SESSION["id_user"], "1");
} else if (isset($_POST["2"])){
	save_choice($conn, $_SESSION["id_user"], "2");
} else if (isset($_POST["3"])){
	save_choice($conn, $_SESSION["id_user"], "3");
}
?>
</html>