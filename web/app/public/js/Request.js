const Request = (function() {
  function likePitch(e) {
    e.preventDefault();
    let { id } = this.dataset;
    fetch('/like', {
      method: 'POST',
      body: new FormData(this)
    })
      .then(View.toggleLike(id))
      .then(View.updateLikes(id))
      .catch((error) => console.log(error));
  }

  function removeLike(e) {}

  function deletePitch(e) {
    e.preventDefault();
    const { id } = this.dataset;
    fetch('/pitch', {
      method: 'POST',
      body: new FormData(this)
    })
      .then(View.fadeDelete(id))
      .catch((error) => console.log(error));
  }

  return {
    likePitch: likePitch,
    deletePitch: deletePitch
  };
})();
