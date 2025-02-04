import '../../styles/welcome.css';

function welcome(){
    return(
       <section id="welcome">
        <div id="welcomeAnim">
            <img src="../media/background/tartelette_accueil.png" id="tartelette" loading="lazy"/>
            <img src="../media/logoNS/ns_2024.png" id="ns_2024" loading="lazy"/>
            <img src="../media/logoNS/ns_mascotte.png" id="mascotte"/>
            <img src="../media/doodle/forme-organique1.png" id="forme1"/>
            <img src="../media/doodle/megaphone.png" id="mega"/>
            <img src="../media/doodle/fleur1.png" id="fleur1"/>
            <img src="../media/doodle/fleur3.png" id="fleur2"/>
            <img src="../media/doodle/cassette.png" id="cassette"/>
            <img src="../media/doodle/etoile.png" id="etoile"/>                   
        </div>

        <div className="button-style" id="btnlanding">
            <a href="/">Découvrez le programme</a>
        </div>
        <img src="../media/doodle/happyfleur2.png" id="fleurbtn"/>
    </section> 
    )
    
}

export default welcome;

