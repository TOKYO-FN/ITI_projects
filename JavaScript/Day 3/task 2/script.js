let xhr = new XMLHttpRequest();
xhr.open("GET", "https://jsonplaceholder.typicode.com/posts");
xhr.send();
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    let data = JSON.parse(xhr.responseText);
    let tableBody = document.getElementById("data");
    for (let i = 0; i < data.length; i++) {
      let row = document.createElement("tr");

      let idCell = document.createElement("td");
      idCell.textContent = data[i].id;
      row.appendChild(idCell);

      let titleCell = document.createElement("td");
      titleCell.textContent = data[i].title;
      row.appendChild(titleCell);

      tableBody.appendChild(row);
    }
  }
};

function Submit() {
  let postId = document.querySelector("input[type='text']").value;
  let xhr = new XMLHttpRequest();
  xhr.open("GET", `https://jsonplaceholder.typicode.com/posts/${postId}`);
  xhr.send();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = JSON.parse(xhr.responseText);
      document.getElementById("title").innerText = data.title;
    }
  };
}
