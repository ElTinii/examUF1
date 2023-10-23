const githubBtn = document.getElementById("github");
const twitterBtn = document.getElementById("twitter");

githubBtn.addEventListener(
  "click",
  function () {
    auth_popup("github");
  },
  false
);

twitterBtn.addEventListener(
  "click",
  function () {
    auth_popup("twitter");
  },
  false
);

function auth_popup(socialProvider) {
  var authWindow = window.open(
    `http://localhost/servidor/UF1/P4/controller/${socialProvider}.php`,
    "authWindow",
    `width=${screen.width / 2},
    height=${screen.height},
    scrollbars=yes`
  );
  window.closeAuthWindow = function () {
    authWindow.close();
  };

  return false;
}
