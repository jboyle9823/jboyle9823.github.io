let items = JSON.parse(localStorage.getItem("items")) || [];
renderList();

function addItem() {
    const input = document.getElementById("new-item");
    const item_text = "> " + input.value.trim();

    if (item_text === "> ") {
        alert("Please enter something!");
        return;
    }

    const newItem = {
        text: item_text,
        id: Date.now()
    };
    items.push(newItem);
    localStorage.setItem("items", JSON.stringify(items));

    renderItem(item_text, newItem.id);
    input.value = "";
}

function renderList() {
    items.forEach((item) => {
        renderItem(item.text, item.id);
    });
}

function renderItem(item_text, id) {
    const ul = document.getElementById("todo-list");
    const li = document.createElement("li");
    li.dataset.id = id;

    const text_span = document.createElement("span");
    text_span.textContent = item_text;
    li.appendChild(text_span);

    const trash_span = document.createElement("span");
    trash_span.classList.add('fas', 'fa-trash');
    li.appendChild(trash_span);

    trash_span.addEventListener("click", () => {
        li.remove();
        items = items.filter(x => x.id !== id);
        localStorage.setItem("items", JSON.stringify(items));
    });

    ul.appendChild(li);
}