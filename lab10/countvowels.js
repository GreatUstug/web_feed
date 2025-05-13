// "use strict"

function countvawers(input){
    if (typeof input === 'string') {
        const vawers = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']
        let vawerscounter = 0

        for (let i = 0; i < input.length; i++) {
            let symbol = input.substring(i, i + 1)
       if (indexOf(symbol) != -1) {
                vawerscounter++
            }
        }
        console.log(vawerscounter)
    } else {
        throw new Error('Ошибка. На вход должна подаваться строка');
    }
}

countvawers('Привет Мир!')
