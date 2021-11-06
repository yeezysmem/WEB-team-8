// =======  Alarm Sound:  =======
const sound = new Audio('./sounds/alarm1.mp3')

// =======  Real-time clock:  ======= (refreshes every second)
const h2WithClock = document.getElementById('clock');
let currentTime;
setInterval(() => {
    const date = new Date();
    
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
    
    currentTime = twoDig(day) + '.' + twoDig(month) + '.' + year + 
    ' - ' + twoDig(hours) + ":" + twoDig(minutes) + ":" + twoDig(seconds);
    
    h2WithClock.textContent = currentTime;
}, 1000);

// Append 0 to the beginning, if there is only one digit
function twoDig(time) {
    return (time < 10) ? "0" + Number(time) : Number(time);
}

// =======  Menus:  =======
// Creating the values to choose from for Hours, Mins and Secs:
const menus = document.querySelectorAll('.menu');
const timeInfo = [
    {type: 'hrs',
    maxVal: 23},
    {type: 'mins',
    maxVal: 59},
    {type: 'secs',
    maxVal: 59}
]
for (let i in timeInfo) {
    for (let val = 0; val <= timeInfo[i].maxVal; val++) {
        let optionList = menus[i].options;
        optionList[optionList.length] = new Option(twoDig(val));
    }
}

// Date picker field (with jQuery):
$(function() {
    $("#datepicker").datepicker();
    $("#datepicker").datepicker("setDate", new Date());
});

// ====  Store all the intervals here  ====  
let intervals = [];

// =======  Alarm Class:  =======
// Alarm class
class Alarm {
    day; month; year;
    hours; minutes; seconds;
    currentInterval;
    
    constructor(day, month, year, hours, minutes, seconds) {
        this.day = day; this.month = month; this.year = year;
        this.hours = hours; this.minutes = minutes; this.seconds = seconds;
        this.turnOn();
    }
    
    get time() {
        return  twoDig(this.day) + '.' + twoDig(this.month) + '.' + this.year + 
        ' - ' + twoDig(this.hours) + ":" + twoDig(this.minutes) + ":" + twoDig(this.seconds);
    }
    
    turnOn() {
        intervals.push(this.currentInterval = setInterval(() => {
            if (currentTime == this.time) {
                sound.play();
                $('#alarm-message').css('display', 'block');
                $('#alarm-message button').on('click', alarmOk.bind(this));
            }
        }, 1000));
        console.log("Turn ON:", this);
    }
    
    turnOff() {
        sound.pause();
        clearInterval(this.currentInterval);
        intervals = intervals.filter(x => x != this.currentInterval);
        console.log("Turn OFF:", this);
    }
}

// =======  Button actions:  =======
// Button: Set selection equal to currentTime +6 seconds
function setCloseTime() {
    const targetTime = new Date(new Date().getTime()+(6*1000));
    const targetHrs = targetTime.getHours();
    const targetMins = targetTime.getMinutes();	
    const targetSecs = targetTime.getSeconds();
    
    $("#datepicker").datepicker("setDate", targetTime);
    document.getElementById('hoursMenu').selectedIndex = targetHrs;
    document.getElementById('minsMenu').selectedIndex = targetMins;
    document.getElementById('secsMenu').selectedIndex = targetSecs;
}

// Button: Set Alarm
function setAlarm() {
    const date = $.datepicker.formatDate('dd-mm-yy', $("#datepicker").datepicker("getDate")).split('-');
    const [day, month, year] = date;
    const hm = document.getElementById('hoursMenu');
    const hours = hm.options[hm.selectedIndex].value;
    const mm = document.getElementById('minsMenu');
    const minutes = mm.options[mm.selectedIndex].value;
    const sm = document.getElementById('secsMenu');
    const seconds = sm.options[sm.selectedIndex].value;
    
    // Create an Alarm object with selected time
    const alarm = new Alarm(day, month, year, hours, minutes, seconds);
    
    // Alarm list item
    const alarmLi = document.createElement('li');
    alarmLi.class = 'alarm-li';
    // Alarm checkbox
    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.checked = 'true';
    // Alarm label
    const label = document.createElement('label')
    label.htmlFor = checkbox.id;
    // Assembling current alarm (alarmLi)
    label.appendChild(document.createTextNode('Alarm for: ' + alarm.time));
    alarmLi.appendChild(checkbox);
    alarmLi.appendChild(label);
    // Appending current alarm to the list of all other alarms
    document.getElementById('list-of-alarms').appendChild(alarmLi);
    
    // Event Listeners
    const params = {checkbox: checkbox, alarm: alarm};
    checkbox.addEventListener('click', toggleAlarm.bind(params));
    label.addEventListener('click', toggleCheckbox.bind(params));
}

// Button: Clear Alarms
function clearAlarms() {
    sound.pause();
    document.getElementById('list-of-alarms').textContent = '';
    intervals.forEach(clearInterval);
    intervals = [];
}

// Click on the alarm text
function toggleCheckbox() {
    this.checkbox.checked = !this.checkbox.checked;
    // Since such toggling does not trigger the event listener of a checkbox,
    // we now have to call toggleAlarm() manually.
    (toggleAlarm.bind(this))();
}

// Click on the alarm checkbox
function toggleAlarm() {
    if (this.checkbox.checked == true) {
        this.alarm.turnOn();
    } else {
        this.alarm.turnOff();
    }
}

// Click 'Okay' on the alarm message popup
function alarmOk() {
    $('#alarm-message').css('display', 'none');
    this.turnOff();
}


