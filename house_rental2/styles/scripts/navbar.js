var show = document.getElementById("nav-content");

document.addEventListener("mouseup", function (e) {
  var container = document.getElementById("nav-content");
  if (!container.contains(e.target)) {
    container.style.right = "-100%";
  }
});

function navmenuon() {
  show.style.right = "0px";
}

function navmenuoff() {
  show.style.right = "-100%";
}
$(function () {
  const scrollPoint = 50;

  let targetPixel = document.createElement("div");

  targetPixel.style.cssText = `
  position: absolute;
  top: ${scrollPoint}px;
  left: 0;
  width: 1px;
  height: 1px;
`;

  targetPixel = document.body.appendChild(targetPixel);

  const observer = new IntersectionObserver((entries) => {
    const scrolled = entries[0].boundingClientRect.y < 0;
    if (scrolled) {
      document.body.classList.add("scrolled");
    } else {
      document.body.classList.remove("scrolled");
    }
  });

  observer.observe(targetPixel);
});

$(function () {
  const scrollPoint = 2000;

  let targetPixel = document.createElement("div");

  targetPixel.style.cssText = `
  position: absolute;
  top: ${scrollPoint}px;
  left: 0;
  width: 1px;
  height: 1px;
`;

  targetPixel = document.body.appendChild(targetPixel);

  const observer = new IntersectionObserver((entries) => {
    const scrolled = entries[0].boundingClientRect.y < 0;
    if (scrolled) {
      document.body.classList.add("scrolleddrk");
    } else {
      document.body.classList.remove("scrolleddrk");
    }
  });

  observer.observe(targetPixel);
});
