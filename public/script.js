document.getElementById("btn1").addEventListener("click", function () {
  var inputText = document.getElementById("input").value;
  document.getElementById("output").innerHTML =
    "Tombol 1 diklik. Input: " + inputText;
});

document.getElementById("btn2").addEventListener("click", function () {
  var inputText = document.getElementById("input").value;
  document.getElementById("output").innerHTML =
    "Tombol 2 diklik. Input: " + inputText;
});
