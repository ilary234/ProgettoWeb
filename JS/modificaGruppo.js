let meetings, corsi, materie;
let argomentiSvolti = 0, percentualeCompletamento;
let numeroArgomenti = document.getElementById("numeroArgomenti").innerText;
let date = new Date()
let currentMonth = date.getMonth();
let currentYear = date.getFullYear();
const urlParams = new URLSearchParams(window.location.search);
const currentDate = document.querySelector(".data-corrente");
const monthsName = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
const monthsNumber = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

document.getElementById("save").addEventListener("click", () => {
    if (!document.getElementById("luogo").value =="") {
        aggiornaLuogo();
    }
    window.location.href = `infoGruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
})

document.getElementById("delete").addEventListener("click", () => {
    new bootstrap.Modal(document.getElementById("eliminaGruppo")).show();
})

document.querySelector(".closeEliminaGruppo").addEventListener("click", () => {
    document.querySelector(".closeEliminaGruppo").blur();
})

document.querySelector(".deleteGruppo").addEventListener("click", () => {
    document.querySelector(".deleteGruppo").blur();
    eliminaGruppo();
})

document.querySelectorAll("input[type='checkbox']").forEach(c => {
    c.addEventListener("change", () => {
        if(c.checked) {
            argomentiSvolti++;
        } else {
            argomentiSvolti--;
        }
        aggiornaArgomento(c.value, c.checked);
        aggiornaPercentualeGruppo();
    });
});

document.getElementById("addArgomento").addEventListener("click", () => {
     new bootstrap.Modal(document.getElementById("inserisciArgomento")).show();
})

document.querySelector(".closeInserisciArgomento").addEventListener("click", () => {
    document.querySelector(".closeInserisciArgomento").blur();
})

document.querySelector(".saveArgomento").addEventListener("click", () => {
    document.querySelector(".saveArgomento").blur();
    const titolo = document.getElementById("titoloArgomento").value;
    const errorDiv = document.querySelector(".modal-body .alertArgomento").innerText == "";
    
    if(titolo == "") {
        if(errorDiv) {
            const newError = "Inserire un titolo";
            document.querySelector(".alertArgomento").innerText = newError;
            document.querySelector(".alertArgomento").classList.remove('d-none');
        }
    } else {
        if(!errorDiv) {
            document.querySelector(".alertArgomento").innerText = "";
            document.querySelector(".alertArgomento").classList.add('d-none');
        }
        numeroArgomenti++;
        aggiornaPercentualeGruppo();
        inserisciArgomento(titolo);
        bootstrap.Modal.getInstance(document.getElementById("inserisciArgomento")).hide();
    }
})

document.querySelector(".deleteIncontro").addEventListener("click", () => {
    document.querySelector(".deleteIncontro").blur();
    eliminaIncontro();
})

document.querySelector(".saveIncontro").addEventListener("click", () => {
    document.querySelector(".saveIncontro").blur();
    const oraIncontro = document.getElementById("orarioIncontro").value;
    const errorDiv = document.querySelector(".modal-body .alertIncontro").innerText == "";
    
    if(oraIncontro == "") {
        if(errorDiv) {
            const newError = "Inserire un orario";
            document.querySelector(".alertIncontro").innerText = newError;
            document.querySelector(".alertIncontro").classList.remove('d-none');
        }
    } else {
        if(!errorDiv) {
            document.querySelector(".alertIncontro").innerText = "";
            document.querySelector(".alertIncontro").classList.add('d-none');
        }
        inserisciIncontro(oraIncontro);
        bootstrap.Modal.getInstance(document.getElementById("inserisciIncontro")).hide();
    }
})

document.querySelector(".closeInserisciIncontro").addEventListener("click", () => {
    document.querySelector(".closeInserisciIncontro").blur();
})

document.querySelector(".closeEliminaIncontro").addEventListener("click", () => {
    document.querySelector(".closeEliminaIncontro").blur();
})

async function aggiornaArgomento(titolo, svolto) {
    let urlAggiornamento = "API/api-update-argomento.php";
    const formData = new FormData();
    formData.append("titolo", titolo);
    formData.append("svolto", svolto);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlAggiornamento, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let aggiornamentoRes = await response.json();
        if(!aggiornamentoRes["success"]) {
            console.log(aggiornamentoRes["error"]);
        }
    } catch (error) {
        console.log(error);
    }
}

async function aggiornaLuogo() {
    let urlAggiornamento = "API/api-update-gruppo-luogo.php";
    const formData = new FormData();
    formData.append("luogo", document.getElementById("luogo").value);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlAggiornamento, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let aggiornamentoRes = await response.json();
        if(!aggiornamentoRes["success"]) {
            console.log(aggiornamentoRes["error"]);
        }
    } catch (error) {
        console.log(error);
    }
}

async function aggiornaPercentualeGruppo() {
    percentualeCompletamento = (argomentiSvolti / numeroArgomenti) * 100;
    document.getElementById("completamento").value = percentualeCompletamento;
    let urlAggiornamento = "API/api-update-gruppo-percent.php";
    const formData = new FormData();
    formData.append("percentuale", percentualeCompletamento);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlAggiornamento, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let aggiornamentoRes = await response.json();
        if(!aggiornamentoRes["success"]) {
            console.log(aggiornamentoRes["error"]);
        }
    } catch (error) {
        console.log(error);
    }
}

async function inserisciArgomento(titolo) {
    let urlInserimento = "API/api-inserisci-argomento.php";
    const formData = new FormData();
    formData.append("titolo", titolo);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlInserimento, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let inserimentoRes = await response.json();
        if(!inserimentoRes["success"]) {
            console.log(inserimentoRes["error"]);
        } else {
            location.reload();
        }
    } catch (error) {
        console.log(error);
    }
}

async function inserisciIncontro(oraIncontro) {
    let urlInserimento = "API/api-inserisci-incontro.php";
    const formData = new FormData();
    formData.append("dataIncontro", giornoSelezionato);
    formData.append("oraIncontro", oraIncontro);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlInserimento, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let inserimentoRes = await response.json();
        if(!inserimentoRes["success"]) {
            console.log(inserimentoRes["error"]);
        } else {
            location.reload();
        }
    } catch (error) {
        console.log(error);
    }
}

async function eliminaIncontro() {
    let urlEliminazione = "API/api-delete-incontro.php";
    const formData = new FormData();
    formData.append("dataIncontro", giornoSelezionato);
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlEliminazione, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let eliminazioneRes = await response.json();
        if(!eliminazioneRes["success"]) {
            console.log(eliminazioneRes["error"]);
        } else {
            location.reload();
        }
    } catch (error) {
        console.log(error);
    }
}

async function eliminaGruppo() {
    let urlEliminazione = "API/api-delete-gruppo.php";
    const formData = new FormData();
    formData.append("admin", urlParams.get('admin'));
    formData.append("nomeGruppo", urlParams.get('nomeGruppo'));
    try {
        const response = await fetch(urlEliminazione, {
            method: "POST",
            body: formData
        });
        if(!response.ok) {
            throw new Error("Response: " + response.status);
        }
        let eliminazioneRes = await response.json();
        if(!eliminazioneRes["success"]) {
            console.log(eliminazioneRes["error"]);
        } else {
            window.location.href = `index.php`;
        }
    } catch (error) {
        console.log(error);
    }
}

function renderCalendar() {
    currentDate.innerText = `${monthsName[currentMonth]} ${currentYear}`;

    let lastDateCurrentMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    let lastDatePreviousMonth = new Date(currentYear, currentMonth, 0).getDate();
    let firstDayCurrentMonth = (new Date(currentYear, currentMonth, 1).getDay() + 6) % 7;
    let lastDayCurrentMonth = (new Date(currentYear, currentMonth, lastDateCurrentMonth).getDay() + 6) % 7;

    let days = ``;

    for (let i = firstDayCurrentMonth; i > 0; i--) {
        days += `<li class="inattivo">${lastDatePreviousMonth - i + 1}</li>`;
    }

    let meetingsCurrentMonth = getMeetingDays().sort();
    let meetingsDaysCurrentMonth = new Array();
    meetingsCurrentMonth.forEach(m => meetingsDaysCurrentMonth.push(Number.parseInt(m["DataIncontro"].split("-")[2])));

    for (let i = 1; i <= lastDateCurrentMonth; i++) {
        let isToday = (i == date.getDate() && currentMonth == new Date().getMonth() && currentYear == new Date().getFullYear());
        if(isToday) {
            days += `<li class="giorno attivo">${i}</li>`;
        } else if(meetingsDaysCurrentMonth.includes(i)){
            days += `<li class="giorno incontro">${i}</li>`;
        } else {
            days += `<li class="giorno">${i}</li>`;
        }
    }

    let firstDay = 1;
    for (let i = lastDayCurrentMonth; i < 6; i++) {
        days += `<li class="inattivo">${firstDay}</li>`;
        firstDay++;
    }

    document.querySelector(".giorni").innerHTML = days;
    document.querySelectorAll(".giorno").forEach(g => g.addEventListener("click", (event) => {
        let day = event.target.innerText;
        giornoSelezionato = currentYear + "-" + (currentMonth + 1) + "-" + day;
        if(!event.target.classList.contains("incontro")) {
            new bootstrap.Modal(document.getElementById("inserisciIncontro")).show();
        } else {
            new bootstrap.Modal(document.getElementById("eliminaIncontro")).show();
        }
    }));
    
    if(meetingsCurrentMonth.length > 0) {
        let nextMeeting;
        if(currentMonth == new Date().getMonth()) {
            nextMeeting = meetingsCurrentMonth.filter(m => Number.parseInt(m["DataIncontro"].split("-")[2]) > date.getDate())[0];
        } else {
            nextMeeting = meetingsCurrentMonth[0];
        }
        document.querySelector(".prossimo-incontro").innerHTML = `<h2>Prossimo incontro: </h2>
                <p>Data: ${nextMeeting["DataIncontro"]}</p>
                <p>Ora: ${nextMeeting["Ora"].substring(0, 5)}</p>`;
    } else {
        document.querySelector(".prossimo-incontro").innerHTML = `<h2>Prossimo incontro: </h2>
                <p>Nessun incontro previsto per questo mese</p>`;
    }
}

async function getStartData() {
    let urlMettingsGroup = `API/api-incontri-gruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
    try {
        const response = await fetch(urlMettingsGroup);
        if(!response.ok){
            throw new Error("Response Meetings status: " + response.status);
        }
        meetings = await response.json();
        renderCalendar();
        document.querySelectorAll("input[type='checkbox']").forEach(c => {
            if (c.checked) {
                argomentiSvolti++;
            }
        })
    } catch (error) {
        console.log(error.message);
    }    
}

function getMeetingDays() {
    return meetings.filter(m => m["DataIncontro"].split("-")[0] == currentYear && m["DataIncontro"].split("-")[1] == monthsNumber[currentMonth]);
}

document.querySelectorAll(".icone span").forEach(icon => {
    icon.addEventListener("click", () => {
        if(icon.id === "prev") {
            currentMonth = currentMonth - 1;
        } else if(icon.id === "next") {
            currentMonth = currentMonth + 1;
        }

        if(currentMonth < 0 || currentMonth > 11) {
            date = new Date(currentYear, currentMonth);
            currentYear = date.getFullYear();
            currentMonth = date.getMonth();
        }
        renderCalendar();
})});

getStartData();
