let meetings, corsi, materie;
document.getElementById("corso").addEventListener("change", filterByCourse);
document.getElementById("cancel").addEventListener("click", () => window.location.href = `index.php`);

function filterByCourse() {
    const index = document.getElementById("corso").selectedIndex;
    if(index >= 0) {
        corsoSelezionato = corsi[index]["Id_Corso"];
        const materieFiltrate = materie.filter(m => m["Corso"] == corsoSelezionato);
        document.getElementById("materia").innerHTML = getSubjects(materieFiltrate);
    } else {
        document.getElementById("materia").innerHTML = ``;
    }
}

function getSubjects(materieFiltrate) {
    let select = ``;
    for (let i = 0; i < materieFiltrate.length; i++) {
        select += `<option value=" ${materieFiltrate[i]["Id_Materia"]}">${materieFiltrate[i]["NomeMateria"]}</option>`;
    }
    return select;
}

function getCourses() {
    let select = ``;
    for (let i = 0; i < corsi.length; i++) {
        select += `<option value=" ${corsi[i]["Id_Corso"]}">${corsi[i]["Id_Corso"]} -  ${corsi[i]["NomeCorso"]}</option>`;
    }
    return select;
}

async function getStartData() {
    let urlCourses = "API/api-corsi.php";
    let urlSubjects = "API/api-materie.php";
    try {
        const responseCourse = await fetch(urlCourses);
        const responseSubject = await fetch(urlSubjects);
        if(!responseCourse.ok){
            throw new Error("Response Course status: " + responseCourse.status);
        } else if(!responseSubject.ok){
            throw new Error("Response Subject status: " + responseSubject.status);
        }
        corsi = await responseCourse.json();
        materie = await responseSubject.json();
        document.getElementById("corso").innerHTML = getCourses();
    } catch (error) {
        console.log(error.message);
    }    
}

getStartData();
