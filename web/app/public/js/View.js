const View = (function(){
    function toggleLike(id){
        const pitch = document.querySelector(`#pitch-${id} button`);
        pitch.classList.toggle('liked');
    }
    function fadeDelete(id){
        const§ pitch = document.getElementById(`pitch-${id}`);
        pitch.parentElement.classList.add('deleted');
    }
    function updateLikes(id){
        const likes = document.querySelector(`#pitch-${id} .tag span`);
        const pitch = document.querySelector(`#pitch-${id} button`);
        let currentValue = parseInt(likes.innerHTML, 10);
        if(pitch.classList.contains("liked")){
            likes.innerHTML = currentValue + 1;
        }else{
            likes.innerHTML = currentValue - 1;
        }    
    }
    return {
        toggleLike: toggleLike,
        fadeDelete: fadeDelete,
        updateLikes: updateLikes
    }
})();