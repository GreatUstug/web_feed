function uniqueelements(arr) {
    if (Array.isArray(arr)) {
        const result = {};

        arr.forEach(item => {
            let key = String(item);

            if (!result[key]) {
                result[key] = 1;
            } else {
                result[key]++;
            }
        });

        return result;
    } else {
        throw new Error('Ошибка. Функции передан элемент с типом не являющимся массивом')
    }
}
console.log(uniqueelements(['привет', 'hello', 1, '1']));  