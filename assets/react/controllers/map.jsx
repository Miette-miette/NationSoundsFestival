import React, { useEffect, useState } from "react";
import axios from "axios";
import { MapContainer, TileLayer, useMap } from 'react-leaflet'

const Carte = () =>{
    const [carte, setCarte]= useState([])
    //const [marker, setMarkers]= useState([])

    useEffect(() => {
        axios.get("https://127.0.0.1:8000/index.php/api/carte")
        .then((res)=>setCarte(res.data))
    },[])

    console.log(carte);

    
    return(
                
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
            )}
