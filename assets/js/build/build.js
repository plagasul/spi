// Homa swiper init
const swiperleft = new Swiper(".swiper_left", {
  // Optional parameters
  // direction: "vertical",
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true
  },
  allowTouchMove: false
});
const swiperright = new Swiper(".swiper_right", {
  // Optional parameters
  // direction: "vertical",
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true
  },
  allowTouchMove: false
}); // Home swiper on hover

swiperleft.on("click", function () {
  swiperleft.slideNext();
});
document.querySelector(".swiper_left").addEventListener("mouseover", function (event) {
  swiperleft.slideNext();
});
swiperright.on("click", function () {
  swiperright.slideNext();
});
document.querySelector(".swiper_right").addEventListener("mouseover", function (event) {
  swiperright.slideNext();
});