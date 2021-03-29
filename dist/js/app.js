function bro() {
  console.log('bro3s');
}

function moveBox() {
  gsap.to('#box', {
    x: 500
  });
}
bro();
moveBox();