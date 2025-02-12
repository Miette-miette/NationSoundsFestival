/*import React, { useEffect, useState } from "react";
import axios from "axios";
//import { MapContainer, TileLayer, useMap } from 'react-leaflet'

const Carte = () =>{
    const [carte, setCarte]= useState([])
    //const [marker, setMarkers]= useState([])

    useEffect(() => {
        axios.get("https://127.0.0.1:8001/index.php/api/carte")
        .then((res)=>setCarte(res.data))
    },[])

    console.log(carte);

    
    return(
        <main>
            <div className="d-flex flex-row justify-content-center align-items-center">
                <img src="../../media/doodle/forme-organique1.png" className="decoTitre"/>
                <h1>Carte du festival</h1>
                <img src="../../media/doodle/forme-organique1.png" className="decoTitre"/>
            </div>
            
            <div id="conteneurCarte" className="d-flex flex-column flex-md-row ">
                
                <div id="map">
                    {
                        carte.map((carte)=>
                            carte.map((setup)=>
                         
                    <MapContainer center={[setup.lat, setup.lng]} zoom={13} scrollWheelZoom={false}>
                        <TileLayer
                            attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                        />
                    </MapContainer>
                   ))}
                </div>
            
                <div id="conteneurInformations">
                    <p><em>Touchez la carte pour obtenir plus d'informations sur chaque lieu!</em> </p>
                </div> 

            </div>

            <div className="d-flex flex-column justify-content-center align-items-center" id="legend">
                <h2>Légende</h2>
                <div className=" container row ">
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/le patio.png" alt="logo Patio"/>
                        <p>Le Patio</p>
                    </div>

                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/euphorie.png" alt="logo scène Euphorie"/>
                        <p>Scène Euphorie</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/fusion.png"  alt="logo scène Fusion"/>
                        <p>Scène Fusion</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/fusion.png" alt="logo scène Reverie"/>
                        <p>Scène Reverie</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/resonance.png" alt="logo scène Resonance"/>
                        <p>Scène Resonance</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/scene/prisme.png" alt="logo scène Reverie"/>
                        <p>Scène Prisme</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/carte/entree.png" alt="logo Accueil"/>
                        <p>Accueil</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/carte/bar.png" alt="logo bar"/>
                        <p>Douceur Estivale</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/carte/burger.png" width="40" alt="logo burger"/>
                        <p>La Cabane</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/carte/friterie.png"alt="logo frite"/>
                        <p>Frite & Love</p>
                    </div>
                    <div className="legendItem d-flex flex-row align-items-center col-6 col-md-4 col-lg-3">
                        <img src="../../media/carte/wc.png" alt="logo wc"/>
                        <p>WC</p>
                    </div>
                </div>
            </div>
             
        </main>
    )
}
export default Carte;*/