document.getElementById("corsi").addEventListener("change", filterByCourse);
document.getElementById("materie").addEventListener("change", filterBySubject);

function filterByCourse() {
    const index = document.getElementById("corsi").selectedIndex - 1;
    if(index >= 0) {
        const corso = corsi[index]["Id_Corso"];
        const materieFiltrate = materie.filter(m => m["Corso"] == corso);
        const gruppiFiltrati = gruppi.filter(g => g["CorsoLaurea"] == corso);
        document.getElementById("materie").innerHTML = getSubjects(materieFiltrate);
        document.querySelector("main section:last-of-type").innerHTML = getGroups(gruppiFiltrati);
    } else {
        document.getElementById("materie").innerHTML = `<option value="--">--</option>`;
        document.querySelector("main section:last-of-type").innerHTML = getGroups(gruppi);
    }
}

function filterBySubject() {
    const index = document.getElementById("materie").selectedIndex - 1;
    if(index >= 0) {
        const materia = materie[index]["Id_Materia"];
        const gruppiFiltrati = gruppi.filter(g => g["Materia"] == materia);
        document.querySelector("main section:last-of-type").innerHTML = getGroups(gruppiFiltrati);
    } else {
        document.querySelector("main section:last-of-type").innerHTML = getGroups(gruppi);
    }
}

function getSubjects(materieFiltrate) {
    let select = `<option value="--">--</option>`;
    for (let i = 0; i < materieFiltrate.length; i++) {
        select += `<option value=" ${materieFiltrate[i]["NomeMateria"]}">${materieFiltrate[i]["NomeMateria"]}</option>`;
    }
    return select;
}

function getCourses() {
    let select = `<option value="--">--</option>`;
    for (let i = 0; i < corsi.length; i++) {
        select += `<option value=" ${corsi[i]["NomeCorso"]}">${corsi[i]["Id_Corso"]} -  ${corsi[i]["NomeCorso"]}</option>`;
    }
    return select;
}

function getGroups(gruppiFiltrati) {
    let section = ``;
    for (let i = 0; i < gruppiFiltrati.length; i++) {
        section += `<div class="gruppo">
                <p>${gruppiFiltrati[i]["NomeGruppo"]} - ${gruppiFiltrati[i]["Anno"]}</p>
                <p>Admin: ${gruppiFiltrati[i]["AdminGruppo"]}</p>
                <p>Iscritti: ${gruppiFiltrati[i]["NumeroPartecipanti"]}</p>
                <button type="button">Info</button>
            </div>`;
        
    }
    return section;
}

async function getStartData() {
    let urlGroups = "API/api-gruppi.php";
    let urlCourses = "API/api-corsi.php";
    let urlSubjects = "API/api-materie.php";
    try {
        const responseGroup = await fetch(urlGroups);
        const responseCourse = await fetch(urlCourses);
        const responseSubject = await fetch(urlSubjects);
        if(!responseGroup.ok){
            throw new Error("Response Group status: " + responseGroup.status);
        } else if(!responseCourse.ok){
            throw new Error("Response Course status: " + responseCourse.status);
        } else if(!responseSubject.ok){
            throw new Error("Response Subject status: " + responseSubject.status);
        }
        gruppi = await responseGroup.json();
        corsi = await responseCourse.json();
        materie = await responseSubject.json();
        console.log(gruppi);
        console.log(corsi);
        console.log(materie);
        document.getElementById("corsi").innerHTML = getCourses();
        document.querySelector("main section:last-of-type").innerHTML = getGroups(gruppi);
    } catch (error) {
        console.log(error.message);
    }    
}

let gruppi, corsi, materie;
getStartData();
