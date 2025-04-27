uniqueelements = arr =>{
    const result = {};
    
    arr.forEach(item => {
        let key = String(item);   // Преобразуем любой элемент в строку
        
        if (!result[key]) {       // Если такого ключа ещё нет
            result[key] = 1;      // Создаем новый ключ с единицей
        } else {
            result[key]++;        // Иначе увеличиваем счётчик
        }
    });
    
    return result;
}
console.log(uniqueelements(['привет', 'hello', 1, '1']));  