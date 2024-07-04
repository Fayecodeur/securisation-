document.addEventListener("DOMContentLoaded", function () {
  let form = document.getElementById("addAdmin");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    let firstNameInput = form.prenom;
    let isFirstNameValid = validFirstName(firstNameInput);

    let lastNameInput = form.nom;
    let isLastNameValid = validLastName(lastNameInput);

    let emailInput = form.email;
    let isEmailValid = validEmail(emailInput);

    let passwordInput = form.mdp;
    let isPasswordValid = validPassword(passwordInput);

    let confirmPasswordInput = form.mdp_confirme;
    let isConfirmPasswordValid = validConfirmPassword(
      confirmPasswordInput,
      passwordInput
    );

    if (
      isFirstNameValid &&
      isLastNameValid &&
      isEmailValid &&
      isPasswordValid &&
      isConfirmPasswordValid
    ) {
      form.submit();
    }
  });

  const validFirstName = function (inputFirstName) {
    let firstNameRegExp = /^[a-zA-ZÀ-ÿ ]+$/;
    let small = inputFirstName.nextElementSibling;

    if (inputFirstName.value.trim() === "") {
      small.innerHTML = "Le prénom est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputFirstName.classList.remove("is-valid");
      inputFirstName.classList.add("is-invalid");
      return false;
    } else if (firstNameRegExp.test(inputFirstName.value)) {
      small.innerHTML = "Prénom valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputFirstName.classList.remove("is-invalid");
      inputFirstName.classList.add("is-valid");
      return true;
    } else {
      small.innerHTML =
        "Le prénom ne doit contenir que des lettres et des espaces";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputFirstName.classList.remove("is-valid");
      inputFirstName.classList.add("is-invalid");
      return false;
    }
  };

  const validLastName = function (inputLastName) {
    let lastNameRegExp = /^[a-zA-ZÀ-ÿ ]+$/;
    let small = inputLastName.nextElementSibling;

    if (inputLastName.value.trim() === "") {
      small.innerHTML = "Le nom est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputLastName.classList.remove("is-valid");
      inputLastName.classList.add("is-invalid");
      return false;
    } else if (lastNameRegExp.test(inputLastName.value)) {
      small.innerHTML = "Nom valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputLastName.classList.remove("is-invalid");
      inputLastName.classList.add("is-valid");
      return true;
    } else {
      small.innerHTML =
        "Le nom ne doit contenir que des lettres et des espaces";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputLastName.classList.remove("is-valid");
      inputLastName.classList.add("is-invalid");
      return false;
    }
  };

  const validEmail = function (inputEmail) {
    let emailRegExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let small = inputEmail.nextElementSibling;

    if (inputEmail.value.trim() === "") {
      small.innerHTML = "L'email est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputEmail.classList.remove("is-valid");
      inputEmail.classList.add("is-invalid");
      return false;
    } else if (emailRegExp.test(inputEmail.value)) {
      small.innerHTML = "Email valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputEmail.classList.remove("is-invalid");
      inputEmail.classList.add("is-valid");
      return true;
    } else {
      small.innerHTML = "L'email n'est pas valide";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputEmail.classList.remove("is-valid");
      inputEmail.classList.add("is-invalid");
      return false;
    }
  };

  const validPassword = function (inputPassword) {
    let small = inputPassword.nextElementSibling;

    if (inputPassword.value.trim() === "") {
      small.innerHTML = "Le mot de passe est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputPassword.classList.remove("is-valid");
      inputPassword.classList.add("is-invalid");
      return false;
    } else {
      small.innerHTML = "Mot de passe valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputPassword.classList.remove("is-invalid");
      inputPassword.classList.add("is-valid");
      return true;
    }
  };

  const validConfirmPassword = function (inputConfirmPassword, inputPassword) {
    let small = inputConfirmPassword.nextElementSibling;

    if (inputConfirmPassword.value.trim() === "") {
      small.innerHTML = "La confirmation du mot de passe est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputConfirmPassword.classList.remove("is-valid");
      inputConfirmPassword.classList.add("is-invalid");
      return false;
    } else if (inputConfirmPassword.value !== inputPassword.value) {
      small.innerHTML = "Les mots de passe ne correspondent pas";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputConfirmPassword.classList.remove("is-valid");
      inputConfirmPassword.classList.add("is-invalid");
      return false;
    } else {
      small.innerHTML = "Les mots de passe correspondent";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputConfirmPassword.classList.remove("is-invalid");
      inputConfirmPassword.classList.add("is-valid");
      return true;
    }
  };

  form.prenom.addEventListener("input", function () {
    validFirstName(this);
  });

  form.nom.addEventListener("input", function () {
    validLastName(this);
  });

  form.email.addEventListener("input", function () {
    validEmail(this);
  });

  form.mdp.addEventListener("input", function () {
    validPassword(this);
  });

  form.mdp_confirme.addEventListener("input", function () {
    validConfirmPassword(this, form.mdp);
  });
});
