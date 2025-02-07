import React, { useEffect, useState } from "react";

const Concerts = () =>{

    // SETUP DES BOUTONS
    const btn= [
        {
            date:"2024-07-26",
            idJour:"VEN 26/07"
        },
        {
            date:"2024-07-27",
            idJour:"SAM 27/07"
        },
        {
            date:"2024-07-28",
            idJour:"DIM 28/08"
        },
    ]

    const [selectedBtn, setSelectedBtn] = useState("2024-07-26")
    const jourData= Object.values(btn)

return(
        <div className="sceneBtn d-flex flex-row justify-content-center">
            { jourData.map((data) => 
                <div>
                    <button id={data.date} name="inputJour" className="button-style" onClick={(e) => setSelectedBtn(e.target.id)} >
                                {data.idJour}
                    </button>
                           
                </div>
            )}
        </div>
)}
export default Concerts;    