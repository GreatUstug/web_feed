function password(passlen) {
    if (typeof (passlen) === 'number' && 4 <= passlen) {
        const lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
        const uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const digits = '0123456789';
        const specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>/?';
        const allsymbols = lowercaseLetters + uppercaseLetters + digits + specialChars;

        const requiredSymbols = [
            lowercaseLetters.charAt(Math.floor(Math.random() * lowercaseLetters.length)),
            uppercaseLetters.charAt(Math.floor(Math.random() * uppercaseLetters.length)),
            digits.charAt(Math.floor(Math.random() * digits.length)),         
            specialChars.charAt(Math.floor(Math.random() * specialChars.length))
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