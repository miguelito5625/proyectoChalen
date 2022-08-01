const userAuth = localStorage.getItem('userAuth');
const userAuthData = JSON.parse(userAuth);
console.log("El usuario autenticado es: ");
console.log(userAuthData);