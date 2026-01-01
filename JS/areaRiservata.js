async function loadUserData() {
    try {
        const response = await fetch("API/api-utente.php");

        if (!response.ok) {
            throw new Error("Errore caricamento utente");
        }

        const data = await response.json();

        const user = data.user;
        const corso = data.corso;
        console.log(user);

        document.getElementById("nome-cognome").textContent =
            `${user.Nome} ${user.Cognome}`;

        document.getElementById("username").textContent =
            user.Username;

        document.getElementById("email").textContent =
            user.Email;

        document.getElementById("telefono").textContent =
            user.Telefono ?? "Non specificato";

        document.getElementById("corso").textContent =
            corso?.NomeCorso ?? "Non specificato";

        document.getElementById("anno").textContent =
            user.Anno ?? "Non specificato";

    } catch (error) {
        console.error(error.message);
    }
}

loadUserData();
