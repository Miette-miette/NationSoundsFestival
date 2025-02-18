import '../../styles/concert.css';
import React, { useEffect, useState } from "react";
import axios from "axios";

function Concerts(){

    const [concerts, setConcerts]= useState([])

    useEffect(() => {
        axios.get("https://127.0.0.1:8000/api/event")
        .then((res)=>setConcerts(res.data))
    },[])

    console.log(concerts);


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
                            const location = euphorie.location;
                            if(euphorie.begin_datetime.includes(selectedBtn) && location.name.includes("Euphorie"))
                            {
                                return (
                                    <div className="concertItem" key={euphorie.name}>

                                            <h3 className="title d-flex justify-content-start" >{euphorie.name}</h3>
                                            <p className="date">{euphorie.begin_datetime}</p>
                                            <p className="heure">{euphorie.begin_datetime}</p>

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
                            const location = fusion.location;
                            if(fusion.begin_datetime.includes(selectedBtn) && location.name.includes("Fusion"))
                            {
                                return (
                                    <div className="concertItem" key={fusion.name}>
                                        <img className="src" src={fusion.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{fusion.name}</h3>
                                            <p className="date">{fusion.begin_datetime}</p>
                                            <p className="heure">{fusion.begin_datetime}</p>
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
                            const location = reverie.location;
                            if(reverie.begin_datetime.includes(selectedBtn) && location.name.includes("Reverie"))
                            {
                                return (
                                    <div className="concertItem" key={reverie.name}>
                                        <img className="src" src={reverie.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{reverie.name}</h3>
                                            <p className="date">{reverie.begin_datetime}</p>
                                            <p className="heure">{reverie.begin_datetime}</p>
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
                            const location = resonance.location;
                            if(resonance.begin_datetime.includes(selectedBtn) && location.name.includes("Resonance"))
                            {
                                return (
                                    <div className="concertItem" key={resonance.name}>
                                        <img className="src" src={resonance.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{resonance.name}</h3>
                                            <p className="date">{resonance.begin_datetime}</p>
                                            <p className="heure">{resonance.begin_datetime}</p>
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
                            const location = prisme.location;
                            if(prisme.begin_datetime.includes(selectedBtn) && location.name.includes("Prisme"))
                            {
                                return (
                                    <div className="concertItem" key={prisme.name}>
                                        <img className="src" src={prisme.imageName} width="100px" height="100px"/>
                                        <div>
                                            <h3 className="title d-flex justify-content-start" >{prisme.name}</h3>
                                            <p className="date">{prisme.begin_datetime}</p>
                                            <p className="heure">{prisme.begin_datetime}</p>
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