let admin = document.querySelector("#admin").value;
let nomeGruppo = document.querySelector("#nomeGruppo").value;

document.querySelector("main form").addEventListener("submit", function(event) {
        event.preventDefault();
        const titolo = document.querySelector("#titolo").value;
        checkUpload(titolo);
    })

document.querySelector("#cancel").addEventListener("click", () => window.location.href = `materialeGruppo.php?nomeGruppo=${nomeGruppo}&admin=${admin}`);

async function checkUpload(titolo) {
    let urlUpload = "API/api-upload-file.php";
    const formData = new FormData();
    formData.append("uploadFile", document.querySelector("#uploadFile").files[0]);
    formData.append("titolo", titolo);
    formData.append("username", document.querySelector("#username").value);
    formData.append("admin", admin);
    formData.append("nomeGruppo", nomeGruppo);
    try {
        const response = await fetch(urlUpload, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let upload = await response.json();
        console.log(upload);
        if(!upload["success"]) {
            document.querySelector(".alert").innerText = upload["error"];
            document.querySelector(".alert").classList.remove('d-none');
        } else {
            window.location.href = `materialeGruppo.php?nomeGruppo=${nomeGruppo}&admin=${admin}`;
        }
    } catch (error) {
        console.log(error);
    }
}