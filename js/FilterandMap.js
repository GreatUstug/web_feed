const numbers = [2, 5, 8, 10, 3];
const multinumbers = numbers.map(num => num * 3);
const filterednumbers = multinumbers.filter(n => n > 10)

console.log(filterednumbers);