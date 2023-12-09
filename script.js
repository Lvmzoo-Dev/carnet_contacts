// Fonction pour ouvrir le popup
function openPopup() {
    document.getElementById("popup").style.display = "block";
}
function closePopup() {
    document.getElementById("popup").style.display = "none";
}

// Fonction pour fermer le popup
function openPopupContact(idContact, nom, prenom, email, telephone, categorie) {
    var popup = document.getElementById("popupContact");
    var detailsContainer = document.getElementById("contact-details");

    detailsContainer.innerHTML = `
    <p><strong>Id:</strong> ${idContact}</p>
    <p><strong>Nom:</strong> ${nom}</p>
    <p><strong>Prénom:</strong> ${prenom}</p>
    <p><strong>Email:</strong> ${email}</p>
    <p><strong>Téléphone:</strong> ${telephone}</p>
    <p><strong>Catégorie:</strong> ${categorie}</p>
    `;

    idContactSelected = idContact;

    popup.style.display = "block";
}

function closePopupContact() {
    var popup = document.getElementById("popupContact");
    popup.style.display = "none";
}
var idContactSelected;
function openPopupUpdate() {
    document.getElementById("popupUpdate").style.display = "block";
    closePopupContact();
}
function closePopupUpdate() {
    var popup = document.getElementById("popupUpdate");
    popup.style.display = "none";
}
