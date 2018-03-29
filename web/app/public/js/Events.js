const Events = (function() {
  function init() {
    bindEvents();
  }

  function bindEvents() {
    const deleteButtons = document.getElementsByClassName('deleteButtonForm');
    for (const button of deleteButtons) {
      button.addEventListener('submit', Request.deletePitch);
    }
    const likeButtons = document.getElementsByClassName('likeButtonForm');
    for (const button of likeButtons) {
      button.addEventListener('submit', Request.likePitch);
    }
  }
  return {
    init: init
  };
})();
