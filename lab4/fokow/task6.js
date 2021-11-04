
// var list = document.getElementById('list');

// function setAlarm() {
//     const alarmItem = document.createElement('li');
//     alarmItem.appendChild(document.createTextNode('Alarm N'));
//     list.appendChild(alarmItem);
// }



const sound = new Audio('./sounds/alarm1.mp3')

// Display current time
const clockH2 = document.getElementById('clock');
let currentTime;

setInterval(() => {
    const date = new Date();
    
    const hours = date.getHours();
    const minutes = date.getMinutes();	
    const seconds = date.getSeconds();
    
    currentTime = doubleDig(hours) + ":" + doubleDig(minutes) + ":" + doubleDig(seconds);
    clockH2.textContent = currentTime;
}, 1000);


/* 
Functions to get hour, min, secs, 
doubleDig, set alarm time, clear alarm
*/

function doubleDig(time) {
    return (time < 10) ? "0" + Number(time) : Number(time);
}


// Filling in the Hours, Mins and Secs Selection Menus
const timeVals = [
    {
        type: 'hrs',
        maxVal: 23
    },
    {
        type: 'mins',
        maxVal: 59
    },
    {
        type: 'secs',
        maxVal: 59
    }
]
const menus = document.querySelectorAll('select');

for (let i in timeVals) {
    for (let val = 0; val <= timeVals[i].maxVal; val++) {
        let optionList = menus[i].options;
        optionList[optionList.length] = new Option(doubleDig(val));
    }
}
// Finished filling up selection menus


const hr = document.getElementById('hoursMenu');
const min = document.getElementById('minsMenu');
const sec = document.getElementById('secsMenu');

function alarmSet() {    
    const selectedHour = hr.options[hr.selectedIndex].value;
    const selectedMin = min.options[min.selectedIndex].value;
    const selectedSec = sec.options[sec.selectedIndex].value;
    
    const alarmTime = doubleDig(selectedHour) + ":" + doubleDig(selectedMin) + ":" + doubleDig(selectedSec);
    
    /* Function to calcutate the current time, 
    Then compare it to the alarmtime
    and play a sound when they are equal.
    */
   setInterval(() => {
        if (alarmTime == currentTime) {
            sound.play();
        }
    }, 1000);
    
}

function alarmClear() {
    sound.pause();
}


