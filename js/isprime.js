function checkIsPrime(n){
    let checkIsPrime = n > 1 ? true : false
    for (let j = 2; j < n; j++) {
        if (n % j == 0) {
            checkIsPrime = false
            break
        }
    }
    console.log(checkIsPrime)
    return checkIsPrime
}

function isPrimeNumber(input) {
    if (typeof input === 'number') { // Обработка одного числа
        const result = checkIsPrime(input);
        console.log(`${input} ${result ? '' : 'не'}простое число`);
    } else if (Array.isArray(input)) { // Обработка массива чисел
        let primes = [];
        let nonPrimes = [];

        input.forEach(item => {
            if (typeof item !== 'number' || !Number.isInteger(item)) {
                throw new Error(`Ошибка! Передан неверный элемент массива (${item})`);
            }

            const primeCheck = checkIsPrime(item);
            if (primeCheck) primes.push(item);
            else nonPrimes.push(item);
        });

        console.log(
            `${primes.length > 0 ? primes.join(', ') + ' простые числа' : ''}` +
            (nonPrimes.length > 0 && primes.length > 0 ? ', ' : '') +
            `${nonPrimes.length > 0 ? nonPrimes.join(', ') + ' не простые числа' : ''}`
        );
    } else {
        throw new Error('Ошибка! Неправильный ввод: нужен либо number, либо array.');
    }
}

isPrimeNumber([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 1000])