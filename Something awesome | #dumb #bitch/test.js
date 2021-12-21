import React from "react";

import "./App.css";

import { Sidebar } from "./components/Sidebar/Sidebar";
import { Content } from "./components/Content/Content";

import { useSelector } from "react-redux";

export const App = () => {
    return (
        <div>
            <Sidebar />
            <Content />
        </div>
    );