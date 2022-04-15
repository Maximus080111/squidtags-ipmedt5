window.onload = function() {
    function updateProfile(e){
        let PictureInput = document.getElementById("profilePictureInput");
        let profilePicture = document.getElementById("profilePicture");
        profilePicture.src = PictureInput.value;
    }
    document.getElementById("profilePictureInput").addEventListener('input', updateProfile);
}