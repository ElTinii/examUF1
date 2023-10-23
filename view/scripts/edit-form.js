const clearBtn = document.getElementById("clear");

clearBtn.addEventListener("click", clear);

function clear() {
  let inputs = [];
  inputs.push(document.getElementById("title"));
  inputs.push(document.getElementById("director"));
  inputs.push(document.getElementById("link"));
  inputs.push(document.getElementById("youtube"));
  inputs.push(document.getElementById("synopsis"));

  inputs.forEach((input) => {
    input.value = "";
  });
}