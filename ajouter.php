<?php
    include("fonctions.php");
	session_start();

	$bdd = connection();
	$req = $bdd->prepare('INSERT INTO note (id_etudiant,id_matiere,coefficient,note) VALUES(:id_etudiant,:id_matiere,:coefficient,:note)');

	$req->bindParam(':id_etudiant', htmlspecialchars($_POST["etudiant"]));
	$req->bindParam(':id_matiere', htmlspecialchars($_POST["matiere"]));
	$req->bindParam(':coefficient', htmlspecialchars($_POST["coefficient"]));
	$req->bindParam(':note', htmlspecialchars($_POST["note"]));

	try {
		$req->execute();
		$_SESSION['success'] = true;
		header('Location: formulaire.php');
	} 
	catch(PDOException $e) {
		die('Erreur : '.$e->getMessage());
	}
	$req->closeCursor();
?>