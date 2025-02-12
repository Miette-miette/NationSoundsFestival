import '../../styles/navbar.css';
import React, { Component, useState } from 'react';
import Cookies from 'js-cookie';

function Navbar() {

  //Menu

  const [showMenu, setShowMenu] = useState(false)

  const handleShowMenu = () =>{
    setShowMenu(!showMenu)
  };

  //Login

  const [showLogin, setShowLogin] = useState(false)
  
  const handleShowLogin = () =>{
    setShowLogin(!showLogin)
  };

  const [cookieValue, setCookieValue] = useState(Cookies.get("user") || "");
  
  console.log(cookieValue);

  const UserAuth = () => {

    if (cookieValue === ''){
      return(
        <div>
            <a href="/connexion">
              <button className="loginbtn">Se connecter</button>
            </a>
            <a href="/inscription">
                <button className="loginbtn">S'inscrire</button>
            </a>
        </div>
        )    
    }
  
    if (cookieValue !== undefined){
 
    return(
      
        <a href="/connexion">
          <button className="dashboardBtn">Acceder à mon espace</button>
        </a>
      
      )    
    }
  }
  
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
        <div>{UserAuth()}</div>
      </div>

      <nav className={`navbar-links ${showMenu ? "show-nav" : "hide"}`}>
        <div id="visuelMenu">
            <img src='../../media/doodle/happyfleur1.png' alt="mascotte Nation Sound" id="mascotteMenu"/>
            <img src='../../media/doodle/paysage2.png' alt="paysage" id="bgMascotteMenu"/>
        </div>

        <ul>
          <li>
            <a href="/programmation" className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/etoile.png' alt="Etoile" id="logo"/>
              <p>PROGRAMMATION</p>
            </a>
          </li>
          <li>
            <a href="/concert" className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/cassette.png' alt="cassette audio"/>
              <p>CONCERTS</p>
            </a>
          </li>
          <li >
            <a href='https://www.ticketmaster.fr/fr' target="_blank" rel="noreferrer" className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/happyfleur2.png' alt="fleur" />
              <p>BILLETERIE</p>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-box-arrow-up-right" viewBox="0 0 16 16"/>
                <path fillRule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                <path fillRule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
            </a>            
          </li>
          <li>
            <a href='/carte' className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/forme-organique1.png' alt="forme organique"/>
              <p>CARTE</p>
            </a>
          </li>
          <li>
            <a href="/reseaux-sociaux" className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/megaphone.png' alt="mégaphone"/>
              <p>RESEAUX SOCIAUX</p>
            </a>
          </li>
          <li>
            <a href='/partenaires' className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/metal.png' alt="main qui fait le symbole métal "/>
              <p>PARTENAIRE</p>
            </a>
          </li> 
          <li>
            <a href='/contact' className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/metal.png' alt="main qui fait le symbole métal "/>
              <p>CONTACT</p>
            </a>
          </li>
          <li>
            <a href='/FAQ' className="links" onClick={handleShowMenu}>
              <img src='../../media/doodle/forme-organique4.png' alt="forme organique"/>
              <p>FAQ</p>
            </a>
          </li>
        </ul>
      
        
      </nav>
    </div>
  );
}

export default Navbar;