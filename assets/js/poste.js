document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("addPoste");
  const postInput = form.nom_poste;

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (validPost(postInput)) {
      form.submit();
    }
  });

  const validPost = function (inputPost) {
    let postRegExp = /^[a-zA-ZÀ-ÿ ]+$/;
    let small = inputPost.nextElementSibling;

    if (inputPost.value.trim() === "") {
      small.innerHTML = "Le poste est obligatoire";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputPost.classList.add("border-danger");
      inputPost.classList.remove("border-success");
      return false;
    } else if (postRegExp.test(inputPost.value)) {
      small.innerHTML = "Poste valide";
      small.classList.remove("text-danger");
      small.classList.add("text-success");
      inputPost.classList.remove("border-danger");
      inputPost.classList.add("border-success");
      return true;
    } else {
      small.innerHTML =
        "Le poste ne doit contenir que des lettres et des espaces";
      small.classList.remove("text-success");
      small.classList.add("text-danger");
      inputPost.classList.add("border-danger");
      inputPost.classList.remove("border-success");
      return false;
    }
  };

  postInput.addEventListener("change", function () {
    validPost(this);
  });
});
