const mergeobjects = (firstobj, secondobj) =>{
    let mergeobj = {...firstobj};
    for(let key in secondobj){
        mergeobj[key]=secondobj[key]
    }
    return mergeobj
}
console.log(mergeobjects({ a: 1, b: 2 }, { b: 3, c: 4 }))