<!doctype html>
<?php
    include("fonctions.php");
?>
<html>
    <head>
     <title>Moyennes</title>
	 <meta charset="UTF-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <br/>
	<div class="container w-75 mx-auto text-center">
		<h3>Moyennes :</h3>
  		<br/>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th> Étudiant </th>
                <?php
                    $bdd = connection();
                    $req = $bdd->prepare('SELECT * FROM matiere');
                    $req->execute();
                    $id_matiere = array();
                    while ($data = $req->fetch()){
                        echo '<th>  ' . $data['nom_matiere'] .'  </th>';
                        $id_matiere[] = $data['id_matiere'];
                    }
                    $req->closeCursor();
                ?>
            </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->prepare('SELECT * FROM etudiant');
                    $req->execute();
                    while ($data = $req->fetch()){
                        echo '<tr><td>  ' . $data['nom_etudiant'] . ' ' . $data['prenom_etudiant'] . '  </td>';
                        for($i = 0; $i < count($id_matiere); $i++)
                        {
                            $coef_total = 0;
                            $note = 0;
                            $req2 = $bdd->prepare('SELECT coefficient, note FROM note WHERE id_etudiant=' . $data["id_etudiant"] . ' AND id_matiere=' . $id_matiere[$i]);
                            $req2->execute();
                            while ($data2 = $req2->fetch()) {
                                $coef_total += $data2["coefficient"];
                                $note += ($data2["coefficient"] *  $data2["note"]);
                            }
                            if ($coef_total != 0){
                                echo '<td>  ' . round($note / $coef_total, 2) . '  </td>';
                            }
                            else {
                                echo '<td>-</td>';
                            }
                        }
                        echo '</tr> ';
                    }
                ?>
            </tbody>
        </table>
  		<br/>
		<a type="button" class="btn btn-secondary" href="./formulaire.php">Ajouter une note</a>
    </div>
  </body>

</html>