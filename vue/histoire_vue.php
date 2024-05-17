<?php
session_start();
include("../lib/global/header.php");
include("../lib/fonction_histoire.php");
include("/home/grp1/public_html/CRUD/CRUD_progression.php");
include("/home/grp1/public_html/CRUD/CRUD_dialogue.php");
include("/home/grp1/public_html/CRUD/CRUD_personnage.php");
include("/home/grp1/public_html/CRUD/CRUD_histoire.php");
?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<?php
if (isset($_POST["1"])){
	save_choice($conn, $_SESSION["id_user"],$_GET["id_histoire"], "1");
} else if (isset($_POST["2"])){
	save_choice($conn, $_SESSION["id_user"],$_GET["id_histoire"], "2");
} else if (isset($_POST["3"])){
	save_choice($conn, $_SESSION["id_user"],$_GET["id_histoire"], "3");
}
?>
<body id="Histoire_Vue">
	<?php
	$id_histoire = $_GET["id_histoire"];
	$nom_histoire = select_histoire($conn, $id_histoire)[0]["nom"];

	echo "<h1 class='titre'>$nom_histoire</h1>";

	?>

	<table class="barre_menu">
		<thead>
			<tr>
				<th><a href="">Profil</a></th>
				<th><a href="">Aide</a></th>
				<th><a href="../index.php">Menu</a></th>
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
					
					if ($perso_1 != ""){
						$partie1 = "<div><img src="."'images/$perso_1' class="."'image_perso_dialogue'"."></div><div id='dialogue_1'>$dialogue_1</div>";
					} else {
						$partie1 = "";
					}

					if ($perso_2 != ""){
						$partie2 = "<div id='dialogue_2'>$dialogue_2</div><div><img src="."'images/$perso_2' class="."'image_perso_dialogue'"."></div>";
					} else {
						$partie2 = "";
					}
					echo("
						<div class='dialogue'>
							$partie1	
						</div>
						<div class='dialogue'>
							$partie2
						</div>
						<div class='dialogue'>
							<div><img src="."'images/$perso_3' class="."'image_perso_dialogue'"."></div>
							<div id='dialogue_3'>$dialogue_3</div>
						</div>
					");
				?>
			</div>
			<div class="box box_choix_dialogue">
				<?php
					$dialogues = dialogue_suivant($conn,$_SESSION["id_user"],$_GET["id_histoire"]);
					$nb_dialogue = nb_dialogue_suivant($conn, $_SESSION["id_user"],$_GET["id_histoire"]);
					if ($nb_dialogue == 0){
						header("Location: /~grp1/vue/fin_vue.php");
					}
					if ($nb_dialogue == 1){
						$dialogue_1 = $dialogues[0];
						echo("
							<div class='choix_unique'>
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit' name='1' class='bouton_choix'> $dialogue_1 </button>
								</form>
							</div>
						");
					}
					else if ($nb_dialogue == 2){
						$dialogue_1 = $dialogues[0];
						$dialogue_2 = $dialogues[1];
						echo("
							<div class='choix_double'>
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit' name='1' class='bouton_choix'> $dialogue_1 </button>
									<button type='submit' name='2' class='bouton_choix'> $dialogue_2 </button>
								</form>
							</div>
						");
					}
					else{
						$dialogue_1 = $dialogues[0];
						$dialogue_2 = $dialogues[1];
						$dialogue_3 = $dialogues[2];
						echo("
							<div class='choix_triple'> 
								<form method='post' action='histoire_vue.php?id_histoire=".$_GET['id_histoire']."'>
									<button type='submit' name='1' class='bouton_choix'> $dialogue_1 </button>
									<button type='submit' name='2' class='bouton_choix'> $dialogue_2 </button>
									<button type='submit' name='3' class='bouton_choix'> $dialogue_3 </button>
								</form>
							</div>
						");
					}
				?>
			</div>
		</div>
		<div class="box box_affichage_dé">
			<?php
				
				$lancer_dé = select_de($conn, last_dialogue($conn,$_SESSION["id_user"],$_GET["id_histoire"]));
				
				if ($lancer_dé == "True"){
					$nb = rand(1, 6);
					if ($nb >= 4){
						echo("<script>disable_button(2);</script>");
						echo("<img src="."'images/image_dé_$nb.jpg' class="."'image_dé'".">");
					}else{
						//save_choice($conn, $_SESSION["id_user"],$_GET["id_histoire"], "2");
						echo("<script>disable_button(1);</script>");
						echo("<img src="."'images/image_dé_$nb.jpg' class="."'image_dé'".">");
					}
					
				}else{
					echo("<p class = 'image_dé' ></p>");
				}
				
			?>
		</div>
	</div>

</body>
</html>