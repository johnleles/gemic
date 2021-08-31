function getUser() {
    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            currentUser.uid = user.uid
            readTasks()
            let userLabel = document.getElementById("profile")
            userLabel.innerHTML = user.email
        } else {
            swal
                .fire({
                    icon: "success",
                    title: "Redirecionando para tela principal",
                })
                .then(() => {
                    window.location.replace("gemic.html")
                })
        }
    })
}
window.onload = function() {
    getUser()
}