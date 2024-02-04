let itemsCorbatas = document.querySelectorAll(".carousel-multi .carousel-item-corbatas");

itemsCorbatas.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 0; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = itemsCorbatas[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});

let itemsBilleteras = document.querySelectorAll(".carousel-multi .carousel-item-billeteras");

itemsBilleteras.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 0; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = itemsBilleteras[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});

let itemsRelojes = document.querySelectorAll(".carousel-multi .carousel-item-relojes");

itemsRelojes.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 0; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = itemsRelojes[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});
