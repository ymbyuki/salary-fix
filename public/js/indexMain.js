/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/indexMain.js ***!
  \***********************************/
/**
 * TOPページにて使用するJS
 */

/**
 * ヘッダーをスクロールに応じて削除する
 */
var startPos = 0,
  winScrollTop = 0;
// scrollイベントを設定
window.addEventListener('scroll', function () {
  winScrollTop = this.scrollY;
  if (winScrollTop >= startPos) {
    // 下にスクロールされた時
    if (winScrollTop >= 200) {
      // 下に200pxスクロールされたら隠す
      document.getElementById('scrollArea').classList.add('hide');
    }
  } else {
    // 上にスクロールされた時
    document.getElementById('scrollArea').classList.remove('hide');
  }
  startPos = winScrollTop;
});
/******/ })()
;