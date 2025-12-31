function generateCalendar() {
    let inputYear = document.getElementById("currentYear").value;
    let inputMonth = document.getElementById("currentMonth").value;
    let monthIndex = inputMonth - 1;
    
    if (!inputYear || !inputMonth || inputMonth < 1 || inputMonth > 12) {
        document.getElementById("calendarDisplay").innerHTML = "Please enter a valid year and a month (1-12).";
        return;
    }

    let currentDate = new Date(inputYear, monthIndex);
    
    let calendarHTML = '<table><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>';

    let firstDay = currentDate.getDay();
    for (let i = 0; i < firstDay; i++) {
        calendarHTML += '<td></td>';
    }

    while (currentDate.getMonth() == monthIndex) {
        calendarHTML += '<td>' + currentDate.getDate() + '</td>';

        if (currentDate.getDay() == 6) { 
            calendarHTML += '</tr><tr>';
        }

        currentDate.setDate(currentDate.getDate() + 1);
    }
    
    let lastDayOfWeek = currentDate.getDay();
    if (lastDayOfWeek !== 0) {
        for (let i = lastDayOfWeek; i < 7; i++) {
            calendarHTML += '<td></td>';
        }
    }
    
    calendarHTML += '</tr></table>';

    document.getElementById("calendarDisplay").innerHTML = calendarHTML;
}