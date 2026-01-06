document.getElementById("changePasswordForm").addEventListener("submit", changePassword);

async function changePassword(e) {
    e.preventDefault();

    const errorBox = document.getElementById("errorBox");
    errorBox.classList.add("d-none");
    errorBox.innerText = "";

    const oldPassword = document.getElementById("oldPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {
        errorBox.innerText = "Le nuove password non coincidono";
        errorBox.classList.remove("d-none");
        return;
    }

    if (oldPassword === newPassword) {
        errorBox.innerText = "La nuova password deve essere diversa da quella attuale";
        errorBox.classList.remove("d-none");
        return;
    }

    if (newPassword.length > 50) {
        errorBox.innerText = "La password può contenere al massimo 50 caratteri";
        errorBox.classList.remove("d-none");
        return;
    }

    const response = await fetch("API/api-cambia-password.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            oldPassword,
            newPassword
        })
    });

    const result = await response.json();

    if (!response.ok || !result.success) {
        errorBox.innerText = result.message || "Errore nel cambio password";
        errorBox.classList.remove("d-none");
        return;
    }

    alert("Password aggiornata correttamente ✅");
    window.location.replace("/ProgettoWeb/areaRiservata.php");
}
