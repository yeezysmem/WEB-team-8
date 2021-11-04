let arr = [-1, -3, 4, 8, 9, -10];
// arr.sort(function(a, b) {
//     return a - b;
//   });
let min = [];
let pls = [];
console.log("Массив:", arr);

// Вывод минимального числа среди положительных

let num1 = 10;
for (let i = 0; i < 7; i++)
{
    if(arr[i] > 0)
    {
        pls[i] = arr[i];
    }
}
var arrpls = pls.filter(function (el) {
    return el != null;
  });
console.log("Массив з додатніх чисел:", arrpls);
// [4, 8, 9]
for (let i = 0; i < 7; i++)
{
    if(arrpls[i] < num1)
    {
        num1 = arrpls[i];
    }
}
console.log("Найменше з додатніх:", num1)

// Вывод максимального числа среди отрицательних

let num2 = -11;
for (let i = 0; i < 7; i++)
{
    if(arr[i] < 0)
    {
        min[i] = arr[i];
    }
}
var arrmin = min.filter(function (el) {
    return el != null;
  });
console.log("Массив з від'ємних чисел:", arrmin);
// [-10, -3, -1]
for (let i = 0; i < 7; i++)
{
    if(arrmin[i] > num2)
    {
        num2 = arrmin[i];
    }
}
console.log("Найбільше від'ємне:", num2)

//  Сортировка выборкой

function selectionSort(arr) { 
    let n = arr.length;
        
    for(let i = 0; i < n; i++) {
        // Находим наименьшее число в правой части массива
        let min = i;
        for(let j = i; j < n; j++) {
            if(arr[j] < arr[min]) {
                min=j; 
            }
         }
         if (min != i) {
             // Заменяем элементы
             let tmp = arr[i]; 
             arr[i] = arr[min];
             arr[min] = tmp;      
        }
    }
    return arr;
}
selectionSort(arr);
console.log("Сортування:", arr)