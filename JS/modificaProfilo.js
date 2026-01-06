let corsi;

function getCourses() {
    let select = `<option value="">--</option>`;
    for (let i = 0; i < corsi.length; i++) {
        select += `
          <option value="${corsi[i]["Id_Corso"]}">
            ${corsi[i]["Id_Corso"]} - ${corsi[i]["NomeCorso"]}
          </option>`;
    }
    return select;
}

async function loadCourses() {
    const response = await fetch("API/api-corsi.php");
    if (!response.ok) {
        throw new Error("Errore caricamento corsi");
    }

    corsi = await response.json();
    document.getElementById("corso").innerHTML = getCourses();
}

async function loadUserData() {
    try {
        const response = await fetch("API/api-utente.php");

        if (!response.ok) {
            throw new Error("Errore caricamento utente");
        }

        const data = await response.json();
        const user = data.user;

        document.getElementById("nome").value = user.Nome;
        document.getElementById("cognome").value = user.Cognome;
        document.getElementById("email").value = user.Email;
        document.getElementById("telefono").value = user.Telefono ?? "";
        document.getElementById("corso").value = user.CorsoLaurea;
        document.getElementById("anno").value = user.Anno ?? "";

    } catch (error) {
        console.error(error.message);
    }
}

async function init() {
    await loadCourses();   
    await loadUserData();  

    const form = document.getElementById("editProfileForm");
    form.addEventListener("submit", saveProfile);
}

init();

async function saveProfile(e) {
    e.preventDefault();

    const errorBox = document.getElementById("errorBox");
    errorBox.classList.add("d-none");
    errorBox.innerText = "";

    const nome = document.getElementById("nome").value.trim();
    const cognome = document.getElementById("cognome").value.trim();
    const email = document.getElementById("email").value.trim();
    const telefono = document.getElementById("telefono").value.trim();
    const anno = document.getElementById("anno").value.trim();
    const id_corso = document.getElementById("corso").value;

    if (nome.length > 20) {
        errorBox.innerText = "Il nome può contenere al massimo 20 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    if (cognome.length > 20) {
        errorBox.innerText = "Il cognome può contenere al massimo 20 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    if (email.length > 50) {
        errorBox.innerText = "L'email può contenere al massimo 50 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    if (telefono && telefono.length > 15) {
        errorBox.innerText = "Il telefono può contenere al massimo 15 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    if (!nome || !cognome || !email) {
        errorBox.innerText = "Nome, cognome ed email sono obbligatori";
        errorBox.classList.remove("d-none");
        return;
    }

    const payload = {
        nome,
        cognome,
        email,
        telefono,
        anno,
        id_corso
    };

    const response = await fetch("API/api-update-utente.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
    });

    const text = await response.text();
    const result = JSON.parse(text);

    if (!response.ok || !result.success) {
        alert(result.message || "Errore salvataggio");
        return;
    }

    alert("Profilo aggiornato correttamente ✅");
    window.location.replace("/ProgettoWeb/areaRiservata.php");
}
