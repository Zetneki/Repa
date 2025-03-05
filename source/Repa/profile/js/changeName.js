
function changeName() {
    const inputText = document.getElementById("changeName");
    const submitText = document.getElementById("saveName");
    const change = document.getElementById("change");
    const nickname = document.getElementById("nickname");

    inputText.style.display = "inline-block";
    submitText.style.display = "inline-block";
    nickname.style.display = "none";
    change.style.display = "none";
}

function saveName() {
    const inputText = document.getElementById("changeName");
    const submitText = document.getElementById("saveName");
    const change = document.getElementById("change");
    const nickname = document.getElementById("nickname");

    inputText.style.display = "none";
    submitText.style.display = "none";
    nickname.style.display = "block";
    change.style.display = "inline-block";
}