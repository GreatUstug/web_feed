function mapObject(obj, callback) {
    const newObj = {};           // Создаем пустой объект для результата
    
    // Проходим по всем собственным свойствам объекта
    for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
            // Применяем callback к значению текущего свойства
            newObj[key] = callback(obj[key]);
        }
    }
    
    return newObj; 
}

const nums = { a: 1, b: 2, c: 3 };
console.log(mapObject(nums, x => x * 2)) // { a: 2, b: 4, c: 6 }