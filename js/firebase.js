  // Your web app's Firebase configuration
  var firebaseConfig = {
      apiKey: "AIzaSyAQXoVc-zuWOsTHON0iHNP_d6wDVv32uPQ",
      authDomain: "gemic-cb52f.firebaseapp.com",
      projectId: "gemic-cb52f",
      storageBucket: "gemic-cb52f.appspot.com",
      messagingSenderId: "205578120210",
      appId: "1:205578120210:web:6a3c5a8c6c595a4bf2bccb"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  //login
  function signIn() {
      if (firebase.auth().currentUser) {
          firebase.auth().signOut()
      }
      const email = document.getElementById("email").value
      const password = document.getElementById("password").value
      firebase.auth().signInWithEmailAndPassword(email, password)
          .then(() => {
              swal.fire({
                  icon: "sucess,",
                  title: "Login realizado com sucesso",
              }).then(() => {
                  window.location.replace("index.html")
              })
          })
          .catch((error) => {
              const errorCode = error.code
              switch (errorCode) {
                  case "auth/wrong-password":
                      swal.fire({
                          icon: "error",
                          title: "Senha incorreta",
                      })
                      break
                  case "auth/invalid-email":
                      swal.fire({
                          icon: "error",
                          title: "E-Mail incorreto",
                      })
                      break

                      //botão registro
                  case "auth/user-not-found":
                      swal
                          .fire({
                              icon: "warning",
                              title: "Usuário não encontrado",
                              text: "Deseja criar esse usuário?",
                              showCancelButton: true,
                              cancelButtonText: "Não",
                              cancelButtonColor: "#F56D51",
                              confirmButtonText: "Sim",
                              confirmButtonColor: "#51B1F5",
                          })
                          .then((result) => {
                              if (result.value) {
                                  signUp(email, password)
                              }
                          })
                      break
                  default:
                      swal.fire({
                          icon: "error",
                          title: error.message,
                      })
              }
          })
  }

  //registro
  function signUp(email, password) {
      firebase.auth().createUserWithEmailAndPassword(email, password)
          .then(() => {
              swal.fire({
                      icon: "success",
                      title: "Usuário foi criado com sucesso"
                  })
                  .then(() => {
                      window.location.replace("index.html")
                  })
          })
          .catch((error) => {
              const errorCode = error.code
              switch (errorCode) {
                  case "auth/weak-password":
                      swal.fire({
                          icon: "error",
                          title: "Senha muito fraca",
                      })
                      break
                  default:
                      swal.fire({
                          icon: "error",
                          title: error.message,
                      })
              }
          })
  }

  function logout() {
      firebase.auth().signOut()
  }