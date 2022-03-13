import React from "react";
import { useLocation, Navigate } from "react-router-dom";
import { useGlobalContext } from "./GlobalContext";

export function PrivateRoute({ children }) {
  const { currentUser, waitUser } = useGlobalContext();
  return <>{currentUser ? children : <Navigate to={`/login`} />}</>;
}

export function AdminRoute({ children }) {
  const { currentUser } = useGlobalContext();
  console.log("user is ", currentUser);
  return <>{currentUser ? children : <Navigate to={`/login`} />}</>;
}
