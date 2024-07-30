function addTodo() {
  const todoText = document.getElementById("todoInput").value.trim();
  if (todoText === "") return;

  const todoContainer = document.getElementById("todoContainer");

  const todoItem = document.createElement("div");
  todoItem.className = "todo-item";

  const todoTextNode = document.createTextNode(todoText);
  todoItem.appendChild(todoTextNode);

  const doneButton = document.createElement("button");
  doneButton.className = "button";
  doneButton.textContent = "Done";
  doneButton.onclick = () => {
    todoItem.classList.toggle("done");
  };
  todoItem.appendChild(doneButton);

  const deleteButton = document.createElement("button");
  deleteButton.className = "button";
  deleteButton.textContent = "Delete";
  deleteButton.onclick = () => {
    todoContainer.removeChild(todoItem);
  };
  todoItem.appendChild(deleteButton);

  todoContainer.appendChild(todoItem);

  document.getElementById("todoInput").value = "";
}
