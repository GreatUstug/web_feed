function password(passlen) {
    if (typeof (passlen) === 'number' && 4 <= passlen) {
        const lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
        const uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const digits = '0123456789';
        const specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>/?';
        const allsymbols = lowercaseLetters + uppercaseLetters + digits + specialChars;

        const requiredSymbols = [
            lowercaseLetters.charAt(Math.floor(Math.random() * lowercaseLetters.length)),  // маленькая буква
            uppercaseLetters.charAt(Math.floor(Math.random() * uppercaseLetters.length)),  // большая буква
            digits.charAt(Math.floor(Math.random() * digits.length)),                     // цифра
            specialChars.charAt(Math.floor(Math.random() * specialChars.length))          // спецсимвол
        ];

        while (requiredSymbols.length < passlen) {
            requiredSymbols.push(allsymbols.charAt(Math.floor(Math.random() * allsymbols.length)))
        }

        return requiredSymbols.join('')
    } else if (typeof (passlen) === 'number') {
        throw new Error('Ошибка. Длина пароля должна быть больше или равна 4')
    } else {
        throw new Error('Ошибка. Функции передан неправильный тип, нужен Number')
    }
}

console.log(password(1))