function changeTel() {
    const inputText = document.getElementById("changeTel");
    const submitText = document.getElementById("saveTel");
    const change = document.getElementById("changeTelBtn");
    const nickname = document.getElementById("tel");

    inputText.style.display = "inline-block";
    submitText.style.display = "inline-block";
    nickname.style.display = "none";
    change.style.display = "none";
}

function saveTel() {
    const inputText = document.getElementById("changeTel");
    const submitText = document.getElementById("saveTel");
    const change = document.getElementById("changeTelBtn");
    const nickname = document.getElementById("tel");

    inputText.style.display = "none";
    submitText.style.display = "none";
    nickname.style.display = "block";
    change.style.display = "inline-block";
}