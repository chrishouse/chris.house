import React from "react";
import ReactDOM from "react-dom/client";
// import { BrowserRouter, Routes, Route } from "react-router-dom";

// My Components
import Filter from "./components/Filter";
import Posts from "./components/Posts";

function Main() {
  return (
    <>
      <div className="divider"></div>

      <div id="page">
        <div id="content" className="inner">
          <Filter />
          <Posts />
        </div>
      </div>
    </>
  );
}

const root = ReactDOM.createRoot(document.querySelector("#app"));
root.render(<Main />);

if (module.hot) {
  module.hot.accept();
}
