document.querySelector("main form").addEventListener("submit", function(event) {
        event.preventDefault();
        const titolo = document.querySelector("#titolo").value;
        checkUpload(titolo);
    })

async function checkUpload(titolo) {
    let urlUpload = "API/api-upload-file.php";
    const formData = new FormData();
    formData.append("uploadFile", document.querySelector("#uploadFile").files[0]);
    formData.append("titolo", titolo);
    formData.append("username", document.querySelector("#username").value);
    formData.append("admin", document.querySelector("#admin").value);
    formData.append("nomeGruppo", document.querySelector("#nomeGruppo").value);
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
            window.location.href = `materialeGruppo.php?nomeGruppo=${formData.get('nomeGruppo')}&admin=${formData.get('admin')}`;
        }
    } catch (error) {
        console.log(error);
    }
}