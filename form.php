<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- meta référencement -->
  <meta name="description" content="Web Dev PHP : Conditions, requêtes GET">
  <meta name="author" content="Camile Ghastine">

  <title>Questionnaire de satisfaction du service client Amazin</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mb-5">AMAZIN FORM</h1>
    <h2>Formulaire de satisfaction</h2>

    <form method="POST" action="index.php">
      <fieldset>
        <div class="container">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="lastname" class="form-label mt-6">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Votre nom" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>"  size="15" maxlength="15" required>
                <small class="form-text text-danger"><?= isset($_POST['errors']['lastname']) ? $_POST['errors']['lastname'] : '' ?></small>
                <small class="form-text text-danger"><?= isset($_POST['errors']['lastname_bis']) ? $_POST['errors']['lastname_bis'] : '' ?></small>
              </div>

              <div class="form-group">
                <label for="firstname" class="form-label mt-6">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Votre prénom" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" size="15" maxlength="15" required>
                <small class="form-text text-danger"><?= isset($_POST['errors']['firstname']) ? $_POST['errors']['firstname'] : '' ?></small>
                <small class="form-text text-danger"><?= isset($_POST['errors']['firstname_bis']) ? $_POST['errors']['firstname_bis'] : '' ?></small>
              </div>

              <div class="form-group">
                <label for="telephone" class="form-label mt-6">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Votre téléphone" value="<?= isset($_POST['telephone']) ? $_POST['telephone'] : '' ?>" size="10" maxlength="10" required>
                <small class="form-text text-danger"><?= isset($_POST['errors']['telephone']) ? $_POST['errors']['telephone'] : '' ?></small>
              </div>

              <div class="form-group">
                <label for="dateachat" class="form-label mt-6">Date de l'achat</label>
                <input type="date" class="form-control" id="dateachat" name="dateachat" placeholder="date de l'achat" value="<?= isset($_POST['dateachat']) ? $_POST['dateachat'] : '' ?>" size="08" maxlength="08" required>
              </div>
            </div>
            </div>
        </div> <!-- Container -->
	</fieldset>

	  <fieldset>
		<div class="container">
          <div class="row">
            <div class="col-md">
              
			  <!-- <fieldset class="form-group"> -->
			  <div class="form-group">
                <legend class="mt-4">L'agent a-t-il été agréable ?</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep0" id="optionsRadiosYes" value="2" checked="">
                    Oui
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep0" id="optionsRadiosNon" value="0">
                    Non
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep0" id="optionsRadiosWithoutOpinion" value="1">
                    Sans avis
                  </label>
                </div>
              <!-- </fieldset> -->

              <!-- <fieldset class="form-group"> -->
			  <div class="form-group">
                <legend class="mt-4">L'agent a-t-il compris votre problème ?</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep1" id="optionsRadiosYes" value="2" checked="">
                    Oui
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep1" id="optionsRadiosNon" value="0">
                    Non
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep1" id="optionsRadiosWithoutOpinion" value="1">
                    Sans avis
                  </label>
                </div>
              <!-- </fieldset> -->

              <!-- <fieldset class="form-group"> -->
                <legend class="mt-4">L'agent a-t-il résolu votre problème ?</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep2" id="optionsRadiosYes" value="1" checked="">
                    Oui
                  </label>
                </div>
				<div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep1" id="optionsRadiosNon" value="0">
                    Non
                  </label>
                </div>
				
				<div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadiosStep2" id="optionsRadiosNon" value="-1">
                    Non
                  </label>
                </div>
			  </fieldset>

        <div class="text-center mt-5">
          <h4>Dites-nous en plus :</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="true" id="checkPhoneMe" name="checkPhoneMe" checked="">
            <label class="form-check-label" for="checkPhoneMe">
              Acceptez-vous d'être rappelé ?
            </label>
          </div>

    </fieldset>
          <button type="submit" class="btn btn-outline-primary my-5">Valider</button>
        </div>
    </form>
  </div>  <!--Container -->
</body>

</html>