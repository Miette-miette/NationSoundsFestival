import React , { Component, useState } from 'react';
import axios from "axios";

function Concerts(){
    
    const [concerts, setConcerts]= useState([])

    useEffect(() => {
        axios.get("/api/concert")
        .then((res)=>setConcerts(res.data))
    },[])

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

    console.log('yo');
    

    const [selectedBtn, setSelectedBtn] = useState("2024-07-26")
    const jourData= Object.values(btn)
    
    return(
        <main>
           <div id="concertHeader" className="d-flex flex-column justify-content-center align-items-center">
                <div className="d-flex flex-row justify-content-center align-items-center">
                    <img src="../../media/doodle/cassette.png" className="decoTitreShake"/>
                    <h1>Concerts</h1>
                    <img src="../../media/doodle/cassette.png" className="decoTitreShake"/>
                </div>
                
                <p>Retrouvez la programmation des concerts par jour</p>

                <div className="sceneBtn d-flex flex-row justify-content-center">
                    { jourData.map((data) => 
                        <div>
                            <button id={data.date} name="inputJour" className="button-style" onClick={(e) => setSelectedBtn(e.target.id)} >
                                {data.idJour}
                            </button>
                           
                        </div>
                    )}
                </div>
            </div>

            <div id="scenes" className="d-flex flex-column flex-md-row flex-wrap justify-content-center align-items-center align-items-md-start">
            
                <article className="sceneConteneur d-flex flex-column justify-content-center">
                    <div className="sceneHeader d-flex flex-row justify-content-center align-items-center">
                        <img src="../../media/scene/euphorie.png" width="80px"/>
                        <h2>EUPHORIE</h2>
                    </div> 

                    <div id="euphorie">
                    {concerts
                        .map((euphorie)=> 
                        {
                            const location = euphorie.location.name
                            if(euphorie.beginDatetime.includes(selectedBtn) && location.includes("Euphorie"))
                            {
                                return (
                                    <div className="concertItem" key={euphorie.titre}>
                                        <img className="src" src={euphorie.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{euphorie.titre}</h3>
                                            <p className="date">{euphorie.beginDatetime}</p>
                                            <p className="heure">{euphorie.beginDatetime}</p>
                                        </div>
                                    </div>
                                )
                            }
                        })
                    }        
                    </div> 
                </article>

                <article className="sceneConteneur">
                    <div className="sceneHeader d-flex flex-row justify-content-center align-items-center">
                        <img src="../../media/scene/fusion.png" width="80"/>
                        <h2>FUSION</h2>
                    </div>

                    <div id="fusion">
                    {concerts
                        .map((fusion)=> 
                        {
                            const location = fusion.location.name
                            if(fusion.beginDatetime.includes(selectedBtn) && location.includes("Fusion"))
                            {
                                return (
                                    <div className="concertItem" key={fusion.titre}>
                                        <img className="src" src={fusion.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{fusion.titre}</h3>
                                            <p className="date">{fusion.beginDatetime}</p>
                                            <p className="heure">{fusion.beginDatetime}</p>
                                        </div>
                                    </div>
                                )
                            }
                        })
                    }
                    </div>
                </article>

                <article className="sceneConteneur">
                    <div className="sceneHeader d-flex flex-row justify-content-center align-items-center">
                        <img src="../../media/scene/reverie.png" width="80"/>
                        <h2>REVERIE</h2>
                    </div>

                    <div id="reverie">
                    {concerts
                        .map((reverie)=> 
                        {
                            const location = reverie.location.name
                            if(reverie.beginDatetime.includes(selectedBtn) && location.includes("Reverie"))
                            {
                                return (
                                    <div className="concertItem" key={reverie.titre}>
                                        <img className="src" src={reverie.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{reverie.titre}</h3>
                                            <p className="date">{reverie.beginDatetime}</p>
                                            <p className="heure">{reverie.beginDatetime}</p>
                                        </div>
                                    </div>
                                )
                            }
                        })
                    }
                    </div>
                </article>

                <article className="sceneConteneur">
                    <div className="sceneHeader d-flex flex-row justify-content-center align-items-center">
                        <img src="../../media/scene/resonance.png" width="80"/>
                        <h2>RESONANCE</h2>
                    </div>

                    <div id="resonance">
                    {concerts
                        .map((resonance)=> 
                        {
                            const location = resonance.location.name
                            if(resonance.beginDatetime.includes(selectedBtn) && location.includes("Resonnance"))
                            {
                                return (
                                    <div className="concertItem" key={resonance.titre}>
                                        <img className="src" src={resonance.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{resonance.titre}</h3>
                                            <p className="date">{resonance.beginDatetime}</p>
                                            <p className="heure">{resonance.beginDatetime}</p>
                                        </div>
                                    </div>
                                )
                            }
                        })
                    }
                    </div>

                </article>

                <article className="sceneConteneur">
                    <div className="sceneHeader d-flex flex-row justify-content-center align-items-center">
                        <img src="../../media/scene/prisme.png" width="80"/>
                        <h2>PRISME</h2>
                    </div>

                    <div id="prisme">
                    {concerts
                        .map((prisme)=> 
                        {
                            const location = prisme.location.name
                            if(prisme.beginDatetime.includes(selectedBtn) && location.includes("Prisme"))
                            {
                                return (
                                    <div className="concertItem" key={prisme.titre}>
                                        <img className="src" src={prisme.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{prisme.titre}</h3>
                                            <p className="date">{prisme.beginDatetime}</p>
                                            <p className="heure">{prisme.beginDatetime}</p>
                                        </div>
                                    </div>
                                )
                            }
                        })
                    }
                    </div>

                </article>
            </div>
        </main>
    )
}
export default Concerts;