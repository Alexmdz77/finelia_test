<!doctype html>
<?php
	include("fonctions.php");
	if (!isset($_SESSION)) {
		session_start();
	}
?>
<html>
  <head>
     <title>Formulaire ajout Note</title>
	 <meta charset="UTF-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
  	<br/>
	<div class="container w-25 mx-auto">
		<h3>Ajouter une note :</h3>
  		<br/>
		<form id="formulaire" method="post" action="ajouter.php">
			<div class="input-group mb-3">
				<label class="input-group-text" for="etudiant">Etudiant</label>
				<select name="etudiant" id="etudiant" class="form-select">
				<?php
					$bdd = connection();
					$req = $bdd->prepare('SELECT * FROM etudiant');
					$req->execute();
					while ($data = $req->fetch())
					{
						echo '<option value="'. $data['id_etudiant'] .'">' . $data['nom_etudiant'] . ' ' . $data['prenom_etudiant'].'</option>';
					}
					$req->closeCursor();
				?>
				</select>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="matiere">Matière</label>
				<select name="matiere" id="matiere" class="form-select">
				<?php
					$bdd = connection();
					$req = $bdd->prepare('SELECT * FROM matiere');
					$req->execute();
					while ($data = $req->fetch())
					{
						echo '<option value="'. $data["id_matiere"] .'">' . $data['nom_matiere'] .'</option>';
					}
					$req->closeCursor();
				?>
				</select>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="coefficient">Coefficient</label>
				<input class="form-control" type="number" min="0" value="1" name="coefficient" id="coefficient" placeholder="0" required>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="note">Note</label>
				<input class="form-control" type="number" min="0" max="20" name="note" id="note" placeholder="0" required>
			</div>
			<button type="submit" class="btn btn-primary">Ajouter</button>
			<a type="button" class="btn btn-secondary float-end" href="./moyenne.php">Moyennes</a>
		</form>
		<?php 
			if(isset($_SESSION['success']) == true){
				echo '<div class="alert alert-success mt-3" role="alert">Ajout Réussi !</div>';
				session_unset();
				session_destroy();
			}
		?>
	</div>
  </body>
</html>