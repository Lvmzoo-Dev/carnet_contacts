<?php
require_once 'connexion.php';

function getContacts()
{
    global $pdo;
    $sql = "SELECT contact.idContact, contact.nomContact, contact.prenomContact, 
    contact.mailContact, contact.telephoneContact, 
    contact.categorieContact, categorie.nomCat
    FROM contact, categorie
    WHERE contact.categorieContact = categorie.idCat";

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function getCategories()
{
    global $pdo;
    $sql = "SELECT * FROM categorie";

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function getContactById($id)
{
    global $pdo;
    $sql = "SELECT * FROM contact WHERE id = :id";
    $pdo->prepare($sql)->execute(['id' => $id]);
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function getCategorieById($id)
{
    global $pdo;
    $sql = "SELECT * FROM categorie WHERE id = :id";
    $pdo->prepare($sql)->execute(['id' => $id]);
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
function addContact($nom, $prenom, $email, $telephone, $categorie)
{
    global $pdo;

    $sql = "INSERT INTO contact (nomContact, prenomContact, mailContact, telephoneContact, categorieContact) VALUES (:nom, :prenom, :email, :telephone, :categorie)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'telephone' => $telephone,
            'categorie' => $categorie
        ]);
    } catch (PDOException $e) {
        // Gérer les erreurs d'insertion
        echo "Erreur d'insertion : " . $e->getMessage();
        return false;
    }

    return true;
}
