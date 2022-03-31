import React, { useContext, useState, useEffect } from "react";
import firebase from "./firebase";
import LoadingComponent from "./Loading";
import MessageComponent from "./MessageComponent";

const GlobalContext = React.createContext();
export function useGlobalContext() {
  return useContext(GlobalContext);
}
export function GlobalContextProvider({ children }) {
  const [waitUser, setWaitUser] = useState(true);
  const [currentUser, setCurrentUser] = useState();
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState({
    type: "success",
    content: "good job!",
  });

  const [is_mess, setIsmess] = useState(false);

  function user_login(email, pass) {
    return firebase.auth().signInWithEmailAndPassword(email, pass);
  }
  function user_signup(email,pass) {
    return firebase.auth().createUserWithEmailAndPassword(email, pass);
  }
  function user_logout() {
    return firebase.auth().signOut();
  }
  function update_email(email) {
    return firebase.auth().currentUser.updateEmail(email);
  }
  function update_password(password) {
    return firebase.auth().currentUser.updatePassword(password);
  }
  function resetPass(email) {
    return firebase.auth().sendPasswordResetEmail(email);
  }
  function getName(){
    const name = firebase.auth().currentUser.displayName;
    return name;
  }
  // function test(){
  //   return firebase.database().ref().child('CustData').push();
  // }
  function displayMessage(type, content, timeout) {
    setIsmess(true);
    setMessage({ type, content });
    setTimeout(() => {
      setIsmess(false);
      setMessage({
        type: "",
        content: "",
      });
    }, timeout);
  }
  useEffect(() => {
    console.log("reloading the context");
    // this is a user sign in state trigger
    const unsubcribe = firebase.auth().onAuthStateChanged(async (user) => {
      console.log("firebase user", user);
      setCurrentUser(user);

      if (user) {
        setLoading(true);
        // await updateUserProfileInFrontend(user);
      }
      setLoading(false);
      setWaitUser(false);
    });
    return unsubcribe;
  }, []);

  const value = {
    user_login,
    user_logout,
    update_email,
    update_password,
    resetPass,
    currentUser,
    waitUser,
    loading,
    setLoading,
    displayMessage,
    user_signup,
    getName,
  };

  return (
    <GlobalContext.Provider value={value}>
      {is_mess && (
        <MessageComponent
          open={is_mess}
          setOpen={setIsmess}
          message={message}
        />
      )}
      {loading && <LoadingComponent open={loading} setOpen={setLoading} />}
      {!waitUser && children}
    </GlobalContext.Provider>
  );
}

// message type: success, error, warning, information,
