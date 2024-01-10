const submitButton = document.querySelector('.button');
const restartButton = document.querySelector('.restart');
const toggleAnimate = () => submitButton.classList.toggle('animate');

submitButton.addEventListener('click', toggleAnimate);
restartButton.addEventListener('click', toggleAnimate);