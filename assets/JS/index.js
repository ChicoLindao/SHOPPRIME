const email = document.getElementById("email");
const senha = document.getElementById("senha");
const submit = document.getElementById("submit");

submit.addEventListener("click", () => {
  localStorage.removeItem("carrinho");

  let formData = new FormData();
  formData.append("email", document.getElementById("email").value)
  formData.append("password", document.getElementById("password").value)
  
  fetch("./backend/user/user-login.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((res) => {
      mensagem(res.message);

      if(res.status) {
        setTimeout(() => {
            window.location.href = "admprodutos.html";
          }, 1000);
      }
    });
});