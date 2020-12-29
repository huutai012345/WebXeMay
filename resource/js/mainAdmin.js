var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtnDelete");

var btnYes = document.getElementById("yes");

var btnNo = document.getElementById("no");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
  modal.style.display = "block";
};

btnYes.onclick = function () {
  document.location = "delete.php";
  location.reload();
};

btnNo.onclick = function () {
  modal.style.display = "none";
};

span.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
