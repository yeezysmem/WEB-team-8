
function main(event) {
    event.preventDefault();
    const len1 = Number(document.getElementById('input1').value);
    const len2 = Number(document.getElementById('input2').value);
    
    if (len1 < 1 || len2 < 1 || Number.isNaN(len1) || Number.isNaN(len2)) {
        alert("Please, enter two numbers (≥ 1).");
    } else {
        // Create Arrays:
        const array1 = [];
        const array2 = [];
        
        for (let i = 0; i < len1; i++) {
            array1[i] = getRandomInt0To100();
        }
        for (let i = 0; i < len2; i++) {
            array2[i] = getRandomInt0To100();
        }
        
        // Print headings: 
        const headings4 = document.querySelectorAll('h4');
        for (h4 of headings4) {
            h4.style.display = 'block';
        }  
        // Print Arrays: 
        document.getElementById('created').innerHTML = 
        '<p> Масив 1: ' + arrToString(array1) + '</p>' +
        '<p> Масив 2: ' + arrToString(array2) + '</p>';
        
        // Find the smallest matching number:
        let minSoFar;
        for (let num of array1) {
            if (array2.includes(num) && !(minSoFar < num)) {
                minSoFar = num;
            }
        }
        // Print the smallest matching number: 
        let result = (minSoFar === undefined) ?
        "У двох масивів немає жодного спільного елементу!" : minSoFar;
        document.getElementById('smallest').innerText = result;
        
        // Print the original array1 and the sorted one: 
        document.getElementById('sorted').innerHTML = 
        '<p> Оригінальний масив 1: ' + arrToString(array1) + '</p>' +
        '<p> Відсортований масив 1: ' + arrToString(bubbleSort(array1)) + '</p>';
    }
    
    
    function arrToString(array) {
        return '['+array.toString().split(',').join(', ')+']';
    }

    function bubbleSort(array) {
        let len = array.length;
        let swapped;
        do {
            swapped = false;
            for (let i = 0; i < len; i++) {
                if (array[i] > array[i + 1]) {
                    let tmp = array[i];
                    array[i] = array[i + 1];
                    array[i + 1] = tmp;
                    swapped = true;
                }
            }
        } while (swapped);
        return array;
    };
}


function getRandomInt0To100() {
    return Math.round(Math.random() * 100);
}
