<?php
require_once 'connexion.php';
require_once 'contact.class.php';
$categories = getCategories();
$contacts = getContacts();
if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    $categorie = $_POST['categorie'];
    addContact($nom, $prenom, $mail, $telephone, $categorie);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Carnet d'adresses</title>
</head>

<body>
    <script src="script.js"></script>
    <div id="contact-list">
        <div class="contacts">
            <div class="table-container">
                <table class="table">
                    <tr>
                        <th style="display: none">ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Catégorie</th>
                    </tr>
                    <td>
                        <?php foreach ($contacts as $contact) : ?>
                            <tr onclick="openPopupContact('<?= $contact['idContact'] ?>','<?= $contact['nomContact'] ?>', '<?= $contact['prenomContact'] ?>', '<?= $contact['mailContact'] ?>', '<?= $contact['telephoneContact'] ?>', '<?= $contact['nomCat'] ?>')">
                                <td style="display: none"><?= $contact['idContact'] ?></td>
                                <td><?= ucwords($contact['nomContact']) ?></td>
                                <td><?= $contact['prenomContact'] ?></td>
                                <td><?= $contact['mailContact'] ?></td>
                                <td><?= $contact['telephoneContact'] ?></td>
                                <td><?= ucfirst($contact['nomCat']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </td>
                </table>
            </div>
        </div>
    </div>

    <button onclick="openPopup()">Ajouter contact</button>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <form method="post">
                <div>
                    <label for="name">Nom:</label>
                    <input class="form-control" type="text" id="name" name="nom" required>
                </div>
                <div>
                    <label for="name">Prénom:</label>
                    <input class="form-control" type="text" id="name" name="prenom" required>
                </div>
                <div>
                    <label for="name">Adresse Mail:</label>
                    <input class="form-control" type="text" id="name" name="mail" required>
                </div>
                <div>
                    <label for="name">Téléphone:</label>
                    <input class="form-control" type="text" id="name" name="telephone" required>
                </div>
                <div>
                    <label for="name">Catégorie:</label>
                    <select name="categorie" id="">
                        <option value="0">Choisir...</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['idCat'] ?>"><?= $category['nomCat'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="save" class="ajoutContact">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Popup Fiche Contact -->
    <div id="popupContact" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopupContact()">&times;</span>
            <h2>Informations du contact</h2>
            <div id="contact-details"></div>
            <div><button onclick="openPopupUpdate()">Modifier</button></div>
        </div>
    </div>
    <!-- Popup Update Contact -->
    <div id="popupUpdate" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopupUpdate()">&times;</span>
            <form method="post">
                <div>
                    <label for="name">Nom:</label>
                    <input class="form-control" type="text" id="name" name="nom" required>
                </div>
                <div>
                    <label for="name">Prénom:</label>
                    <input class="form-control" type="text" id="name" name="prenom" required>
                </div>
                <div>
                    <label for="name">Adresse Mail:</label>
                    <input class="form-control" type="text" id="name" name="mail" required>
                </div>
                <div>
                    <label for="name">Téléphone:</label>
                    <input class="form-control" type="text" id="name" name="telephone" required>
                </div>
                <div>
                    <label for="name">Catégorie:</label>
                    <select name="categorie" id="">
                        <option value="0">Choisir...</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['idCat'] ?>"><?= $category['nomCat'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="update" class="ajoutContact">Modifier</button>
                </div>
            </form>
        </div>
    </div>



</body>

</html>