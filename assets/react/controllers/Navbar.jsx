import '../../styles/navbar.css';
import React, { Component, useState } from 'react';

function Navbar() {

  const [showMenu, setShowMenu] = useState(false)

  const handleShowMenu = () =>{
    setShowMenu(!showMenu)
  };

  const [showLogin, setShowLogin] = useState(false)
  
  const handleShowLogin = () =>{
    setShowLogin(!showLogin)
  };

  return (
    <div id="navbar">

      <div className="navbar-header">
        <div>
          <a href='https://127.0.0.1:8000/' >
            <img src='../../media/logoNS/logo.png' alt="logo" id="logo"/>
          </a>
        </div>

        <div className="d-flex flex-row">
          <div id="navbar-burger" onClick={handleShowMenu}>
            <img src='../../media/icon/list.svg' alt="icone menu" width="60" id="iconMenu"/>
          </div>
          <div id="navbar-login" onClick={handleShowLogin}>
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#492E34" className="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
          </div>
        </div>
        
      </div>

      <div className={`navbar-login ${showLogin ? "show-login" : "hide"}`}>
        <h2>Mon espace Nation-Sounds</h2>

        <ul>
          <li>
            <a href="https://127.0.0.1:8000/connexion">
              <button className="loginbtn">Se connecter</button>
            </a>
          </li>
          <li>
            <a href="https://127.0.0.1:8000/inscription">
                <button className="loginbtn">S'inscrire</button>
            </a>
          </li>
        </ul> 
      </div>

      <nav className={`navbar-links ${showMenu ? "show-nav" : "hide"}`}>
        <div id="visuelMenu">
            <img src='../../media/doodle/happyfleur1.png' alt="mascotte Nation Sound" id="mascotteMenu"/>
            <img src='../../media/doodle/paysage2.png' alt="paysage" id="bgMascotteMenu"/>
        </div>


      
        
      </nav>
    </div>
  );
}

export default Navbar;