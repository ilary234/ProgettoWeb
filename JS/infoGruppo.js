let meetings;
let date = new Date()
let currentMonth = date.getMonth();
let currentYear = date.getFullYear();
const currentDate = document.querySelector(".data-corrente");
const monthsName = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
const monthsNumber = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

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
            days += `<li class="attivo">${i}</li>`;
        } else if(meetingsDaysCurrentMonth.includes(i)){
            days += `<li class="incontro">${i}</li>`;
        } else {
            days += `<li>${i}</li>`;
        }
    }

    let firstDay = 1;
    for (let i = lastDayCurrentMonth; i < 6; i++) {
        days += `<li class="inattivo">${firstDay}</li>`;
        firstDay++;
    }

    document.querySelector(".giorni").innerHTML = days;
    if(meetingsCurrentMonth.length > 0) {
        let nextMeeting = meetingsCurrentMonth.filter(m => Number.parseInt(m["DataIncontro"].split("-")[2]) > date.getDate())[0];
        document.querySelector(".prossimo-incontro").innerHTML = `<h2>Prossimo incontro: </h2>
                <p>Data: ${nextMeeting["DataIncontro"]}</p>
                <p>Ora: ${nextMeeting["Ora"].substring(0, 5)}</p>`;
    } else {
        document.querySelector(".prossimo-incontro").innerHTML = `<h2>Prossimo incontro: </h2>
                <p>Nessun incontro previsto per questo mese</p>`;
    }
}

async function getStartData() {
    const urlParams = new URLSearchParams(window.location.search);
    let urlMettingsGroup = `API/api-incontriGruppo.php?nomeGruppo=${urlParams.get('nomeGruppo')}&admin=${urlParams.get('admin')}`;
    try {
        const response = await fetch(urlMettingsGroup);
        if(!response.ok){
            throw new Error("Response Group status: " + response.status);
        }
        meetings = await response.json();
        console.log(meetings);
        renderCalendar();
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
