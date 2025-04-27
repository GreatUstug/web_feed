function mergeobjects(firstobj, secondobj) {
    if ((typeof (firstobj) === 'object') && ((typeof (secondobj) === 'object'))) {
        let mergeobj = { ...firstobj };
        for (let key in secondobj) {
            mergeobj[key] = secondobj[key]
        }
        return mergeobj
    } else if (!(typeof (firstobj) === 'object')) {
        throw new Error('Ошибка. Функции передан первый элемент с типом не являющимся object')
    } else {
        throw new Error('Ошибка. Функции передан второй элемент с типом не являющимся object')
    }
}
console.log(mergeobjects({ a: 1, b: 2 }, { b: 3, c: 4 }))