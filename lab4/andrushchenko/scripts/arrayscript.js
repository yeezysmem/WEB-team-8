        document.querySelector('button').onclick = function () {
            let arr_length = document.querySelector('#arr-length').value;
            let array_init = [];

            array_init = generateArray(parseInt(arr_length), 100, -100);
            

            var sum = array_init.reduce((res, item, index) => {
                if (index % 2 !== 0) res += item;
                return res;
            }, 0);

            var rslt = array_init.filter(function(number) {
                return number < 0;
            });

            var plus = array_init.filter(function(number) {
                return number > 0;
            });

            var prod = 1;
            rslt.forEach(function(e){prod *= e;});

            var max_of_array = Math.max.apply(Math, plus);

            var maxIndex = plus.indexOf( Math.max.apply(null, plus));

            var b = array_init.filter((_, index) => index % 2 == 0);

            var min_of_array = Math.min.apply(Math, b);

            var minIndex = b.indexOf( Math.min.apply(null, b));

            

            document.querySelector('#init').innerHTML = array_init;
            document.querySelector('#evenprod').innerHTML = sum;
            document.querySelector('#negprod').innerHTML = prod;
            document.querySelector('#maxpos').innerHTML = max_of_array;
            document.querySelector('#maxposindex').innerHTML = maxIndex;
            document.querySelector('#minodd').innerHTML = min_of_array;
            document.querySelector('#minoddindex').innerHTML = minIndex;

            array_init.sort(function(a, b) {
                return a - b;
            });

            document.querySelector('#arrsort').innerHTML = array_init;
            return array_init;

        }

        function generateArray(size, max, min) {
                return [...Array(size)].map(item => Math.floor(Math.random() * (max - min + 1)) + min)
        }