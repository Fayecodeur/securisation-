let form = document.getElementById("addEmploye");

form.addEventListener("submit", function (event) {
  event.preventDefault();

  let firstNameInput = form.prenom;
  let isFirstNameValid = validFirstName(firstNameInput);

  let lastNameInput = form.nom;
  let isLastNameValid = validLastName(lastNameInput);

  let postSelect = form.id_poste;
  let isPostValid = validPost(postSelect);

  let payedRadio = document.getElementsByName("etat");
  let isPayedValid = validPayed(payedRadio);

  let paymentDateInput = form.date_paiement;
  let isPaymentDateValid = validPaymentDate(paymentDateInput);

  let montantInput = document.getElementById("montant");
  let isMontantValid = validMontant(montantInput);

  // Vérifier si toutes les validations sont valides
  if (
    isFirstNameValid &&
    isLastNameValid &&
    isPostValid &&
    isPayedValid &&
    isPaymentDateValid &&
    isMontantValid
  ) {
    // Soumission du formulaire
    form.submit();
  }
});

const validFirstName = function (inputFirstName) {
  let firstNameRegExp = new RegExp("^[a-zA-ZÀ-ÿ ]+$");
  let small = inputFirstName.nextElementSibling;

  if (inputFirstName.value.trim() === "") {
    small.innerHTML = "Le prénom est obligatoire";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputFirstName.classList.add("border-danger");
    inputFirstName.classList.remove("border-success");
    return false;
  } else if (firstNameRegExp.test(inputFirstName.value)) {
    small.innerHTML = "Prénom valide";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    inputFirstName.classList.remove("border-danger");
    inputFirstName.classList.add("border-success");
    return true;
  } else {
    small.innerHTML =
      "Le prénom ne doit contenir que des lettres et des espaces";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputFirstName.classList.add("border-danger");
    inputFirstName.classList.remove("border-success");
    return false;
  }
};

const validLastName = function (inputLastName) {
  let lastNameRegExp = new RegExp("^[a-zA-ZÀ-ÿ ]+$");
  let small = inputLastName.nextElementSibling;

  if (inputLastName.value.trim() === "") {
    small.innerHTML = "Le nom est obligatoire";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputLastName.classList.add("border-danger");
    inputLastName.classList.remove("border-success");
    return false;
  } else if (lastNameRegExp.test(inputLastName.value)) {
    small.innerHTML = "Nom valide";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    inputLastName.classList.remove("border-danger");
    inputLastName.classList.add("border-success");
    return true;
  } else {
    small.innerHTML = "Le nom ne doit contenir que des lettres et des espaces";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputLastName.classList.add("border-danger");
    inputLastName.classList.remove("border-success");
    return false;
  }
};

const validPost = function (selectPost) {
  const small = selectPost.nextElementSibling;
  let msg = "";

  if (selectPost.value === "") {
    msg = "Le poste est obligatoire";
    small.innerHTML = msg;
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    selectPost.classList.add("border-danger");
    selectPost.classList.remove("border-success");
    return false;
  } else {
    msg = "Poste sélectionné";
    small.innerHTML = msg;
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    selectPost.classList.remove("border-danger");
    selectPost.classList.add("border-success");
    return true;
  }
};

const validPayed = function (payedRadio) {
  let small = payedRadio[0].parentNode.parentNode.querySelector("span");
  if (![...payedRadio].some((radio) => radio.checked)) {
    small.innerHTML = "Le statut de paiement est obligatoire";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    return false;
  } else {
    small.innerHTML = "Statut de paiement sélectionné";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    return true;
  }
};

const validPaymentDate = function (inputPaymentDate) {
  let small = inputPaymentDate.nextElementSibling;

  if (inputPaymentDate.value === "") {
    small.innerHTML = "La date de paiement est obligatoire";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputPaymentDate.classList.add("border-danger");
    inputPaymentDate.classList.remove("border-success");
    return false;
  } else {
    small.innerHTML = "Date de paiement sélectionnée";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    inputPaymentDate.classList.remove("border-danger");
    inputPaymentDate.classList.add("border-success");
    return true;
  }
};

const validMontant = function (inputMontant) {
  let montantRegExp = /^\d+(\.\d{1,2})?$/;
  let small = inputMontant.nextElementSibling;

  if (inputMontant.value.trim() === "") {
    small.innerHTML = "Le montant est obligatoire";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputMontant.classList.add("border-danger");
    inputMontant.classList.remove("border-success");
    return false;
  } else if (!montantRegExp.test(inputMontant.value)) {
    small.innerHTML =
      "Le montant doit être un nombre positif avec jusqu'à deux décimales";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    inputMontant.classList.add("border-danger");
    inputMontant.classList.remove("border-success");
    return false;
  } else {
    let amount = parseFloat(inputMontant.value);
    if (amount < 0) {
      small.innerHTML = "Le montant ne peut pas être négatif";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputMontant.classList.add("border-danger");
      inputMontant.classList.remove("border-success");
      return false;
    } else {
      small.innerHTML = "Montant valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputMontant.classList.remove("border-danger");
      inputMontant.classList.add("border-success");
      return true;
    }
  }
};

// Écouteurs d'événements pour les changements de champ
form.prenom.addEventListener("change", function () {
  validFirstName(this);
});

form.nom.addEventListener("change", function () {
  validLastName(this);
});

form.id_poste.addEventListener("change", function () {
  validPost(this);
});

[...form.etat].forEach((radio) => {
  radio.addEventListener("change", function () {
    validPayed(form.etat);
  });
});

let paymentDateInput = document.getElementById("date_paiement");
paymentDateInput.addEventListener("change", function () {
  validPaymentDate(this);
});

let montantInput = document.getElementById("montant");
montantInput.addEventListener("change", function () {
  validMontant(this);
});
