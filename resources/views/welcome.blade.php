<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SoftLather - Prestataire Informatique</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="{{ asset('softlather.jpg.ico') }}">
  
  <style>
    /* --- STYLE GLOBAL --- */
    body {
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      color: #333;
      line-height: 1.6;
    }

    header {
      background: linear-gradient(90deg, #ffffff, #f0f4f8);
      padding: 15px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      border-bottom: 1px solid #ddd;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .logo-container img {
      width: 50px;
      height: 50px;
      border-radius: 8px;
    }

    .logo-container h1 {
      font-size: 1.9rem;
      margin: 0;
      font-weight: bold;
      color: #1a1a1a;
    }

    nav a {
      text-decoration: none;
      color: #555;
      margin-left: 20px;
      font-weight: 500;
      font-size: 1.1rem;
      transition: color 0.3s ease, font-weight 0.3s ease;
    }

    nav a:hover {
      color: #2e4ecc;
      font-weight: bold;
    }

    /* --- TABLEAU DE CHOIX MISSION --- */
    .mission-card {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      margin: 40px auto;
      max-width: 900px;
    }

    .mission-option {
      background-color: #fff;
      border-radius: 12px;
      padding: 20px;
      width: 280px;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .mission-option i {
      font-size: 2rem;
      color: #0077b5;
      margin-bottom: 10px;
    }

    .mission-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      background-color: #eef6fb;
    }

    .mission-option h4 {
      margin: 10px 0;
      color: #0077b5;
    }

    .selection-message {
      text-align: center;
      font-weight: 600;
      color: #0077b5;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    /* --- HERO --- */
    .hero {
      background: linear-gradient(135deg, #ffffff, #e6f2ff);
      padding: 20px 10px;
      text-align: left;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      border-radius: 12px;
      margin: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .hero h2 {
      font-size: 2.8rem;
      margin-bottom: 20px;
      font-weight: bold;
      color: #1a1a1a;
    }

    .hero p {
      font-size: 1.2rem;
    }

    /* --- SECTION --- */
    .section {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: 60px 50px;
      background: #ffffff;
      border-radius: 12px;
      margin: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      gap: 120px;
    }

    .section div {
      flex: 1;
      min-width: 300px;
      margin: 10px;
    }

    .section h3 {
      color: #1a1a1a;
      margin-bottom: 15px;
      font-size: 1.8rem;
    }

    .section p {
      font-size: 1.1rem;
      line-height: 1.7;
      color: #555;
    }

    .section img {
      width: 100%;
      max-width: 400px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }

    .section img:hover {
      transform: scale(1.03);
    }

    /* --- FOOTER --- */
    footer {
      background: #1a1a1a;
      color: white;
      text-align: center;
      padding: 30px 20px;
      
    }

    footer nav a {
      color: white;
      margin: 0 10px;
      font-size: 1rem;
      transition: color 0.3s ease;
    }

    footer nav a:hover {
      color: #2e4ecc;
    }

    footer p {
      margin-top: 15px;
      font-size: 0.9rem;
    }
    nav {
    display: flex;
    gap: 20px;
    align-items: center;
}

nav a {
    text-decoration: none;
    color: inherit;
    padding: 10px;
}

.dropdown {
    position: relative;
}

.submenu {
    list-style: none;
    padding: 0;
    margin: 0;
    position: absolute;
    top: 100%;
    left: 0;
    background: #f0f0f0;
    display: none; /* caché par défaut */
    min-width: 150px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.submenu li a {
    padding: 10px;
    display: block;
    color: black;
}

.submenu li a:hover {
    background: #ddd;
}





.dropdown-compte {
  position: relative;
}

.dropdown-compte a {
  text-decoration: none;
  color: inherit;
  padding: 10px;
}

.submenu-compte {
  list-style: none;
  padding: 0;
  margin: 0;
  position: absolute;
  top: 100%;
  left: 0;
  background: #f0f0f0;
  display: none; /* caché par défaut */
  min-width: 190px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  border-radius: 6px;
  z-index: 1000;
}

.submenu-compte li a {
  padding: 10px;
  display: block;
  color: black;
}

.submenu-compte li a:hover {
  background: #ddd;
}

.dropdown-compte:hover .submenu-compte {
  display: block;
}



.submenu-compte .disabled a {
  color: #aaa;                /* gris pour indiquer désactivé */
  text-decoration: line-through; /* barré */
  pointer-events: none;       /* empêche de cliquer */
  cursor: not-allowed;
}

.submenu-compte .disabled a:hover {
  background: none;
  color: #aaa;
}


  </style>
</head>
<body>
 


  <!-- HEADER -->
  <header>
    <div class="logo-container">
      <img src="{{ asset('images/softlather.jpg') }}" alt="Logo Softlather">
      <a href="/" style="text-decoration:none; color:inherit;"> 
        <h1>SoftLather</h1>
      </a> 
    </div>

    <nav>
      <a href="/"><i class="fas fa-home"></i> Accueil</a>

      <!-- Mission avec menu déroulant -->
      <div class="dropdown">
        <a href="#" id="mission-link"><i class="fas fa-bullseye"></i> Mission</a>
        <ul class="submenu">
         

            
     <li><a href="{{ route('mission')}}"><i class="fas fa-laptop-code" ></i> Web Service & Informatique  </a></li>
                <li><a href="{{ route('missiongtb')}}"><i class="fas fa-building" ></i> GTB  (Gestion Technique du Bâtiment)</a></li>

        </ul>
      </div>

      <a href="{{ route('login')}}"><i class="fas fa-cogs"></i> Plateforme Technique</a>
      <a href="{{ route('contact')}}"><i class="fas fa-envelope"></i> Contact</a>

      


      <div class="dropdown-compte">
        <a href="#" id="compte-link"><i class="fas fa-user"></i> Compte</a>
        <ul class="submenu-compte">
            <li><a href="{{ route('login')}}"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
            <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Inscription</a></li>
            <li class="disabled"><a href="#"><i class="fas fa-id-badge"></i> Profil</a></li>
            <li class="disabled"><a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
      </div>


    </nav>
</header>

  <!-- HERO -->
  
  <section class="hero">
    <h2>Prestataire Informatique & GTB</h2>

    <p>
        Nous sommes spécialisés dans la création de solutions informatiques sur mesure répondant aux besoins spécifiques de votre entreprise.  
        Que vous ayez besoin d’une application web performante, d’un service sécurisé, ou d’une solution de gestion technique de bâtiment,  
        nous avons les compétences et les technologies pour vous accompagner.
    </p>

    <h3>Connecté Futur</h3>
</section>



  <!-- SECTION MISSION -->
  <section class="section">
    <div>
        <h3>Notre Mission Informatique & Web Services</h3>
        <p>
            Accompagner les entreprises dans leur transformation digitale grâce à des solutions informatiques performantes, 
            sécurisées et évolutives.  
            Nous concevons, développons et maintenons vos outils numériques pour optimiser vos activités et renforcer votre productivité.
        </p>
        <ul>
            <li>Développement d’applications web et mobiles sur mesure.</li>
            <li>Création et maintenance de sites internet professionnels.</li>
            <li>Intégration de services cloud et hébergement sécurisé.</li>
            <li>Cybersécurité et protection des données sensibles.</li>
            <li>Automatisation des processus métiers et interconnexions systèmes.</li>
            <li>Support technique et assistance personnalisée.</li>
        </ul>
    </div>
    <div>
        <img src="{{ asset('images/informatique.jpeg') }}" alt="Développement web et services informatiques">
    </div>
</section>





 

<!-- SECTION MISSION -->
<section class="section">
    <div>
        <h3>Notre Mission GTB</h3>
        <p>
            Offrir des solutions innovantes et sécurisées, adaptées aux besoins uniques de nos clients.  
            Notre objectif est de simplifier vos processus tout en renforçant votre efficacité.
        </p>
        <ul>
            <li>Supervision et automatisation des bâtiments (GTB).</li>
            <li>Développement d’applications web et mobile sur mesure.</li>
            <li>Collecte et analyse de données pour une meilleure prise de décision.</li>
            <li>Gestion centralisée des systèmes informatiques et bâtiments.</li>
            <li>Applications de contrôle et maintenance à distance.</li>
        </ul>
    </div>
    <div>
        <img src="{{ asset('images/gtb.jpeg') }}" alt="Développeur informatique">
    </div>
</section>

<!-- SECTION POURQUOI NOUS CHOISIR -->
<section class="section">
    <div>
    <h3>Pourquoi choisir Softlather ?</h3>
    <p>
        Softlather accompagne vos projets informatiques et GTB avec expertise et innovation.  
        Nos solutions sont conçues pour être performantes, sécurisées et durables.
    </p>
    <ul>
        <li>Expertise reconnue dans le développement logiciel et la GTB.</li>
        <li>Solutions conformes aux normes et réglementations (ISO, ITIL, standards GTB).</li>
        <li>Optimisation des coûts et performance grâce à des technologies adaptées.</li>
        <li>Respect des délais et suivi personnalisé de vos projets.</li>
        <li>Devis gratuit et conseils personnalisés.</li>
    </ul>
</div>
</section>

<!-- SECTION CONTACT -->


  <!-- FOOTER -->
  <footer>

    
        <div class="contact-info">
            <h3>Obtenez un devis gratuit</h3>
            <h4>
                <i class="fas fa-map-marker-alt"></i>
                <a href="https://www.google.com/maps?q=21+AV.+Jean+Moulin+Montreuil+93100" target="_blank" style="text-decoration:none; color:inherit;">
                    21 AV. Jean Moulin Montreuil 93100
                </a>
            </h4>
             <p>Contactez-nous pour discuter de votre projet informatique et GTB.</p>
             <h4><i class="fas fa-phone"></i>
            Téléphone : <a href="tel:+338181840130" style="text-decoration:none; color:inherit;">01 81 84 01 30</a></h4>
            
            <h4><i class="fas fa-envelope"></i> contact@softlather.com</h4>
            <h4>
                <i class="fab fa-linkedin"></i>
                <a href="https://www.linkedin.com/in/islam-maaziz" target="_blank" style="text-decoration:none; color:inherit;">
                    LinkedIn
                </a>
            </h4>
        </div>
   
    <p>&copy; <span id="year"></span> SoftLather. Tous droits réservés.</p>
    
  </footer>

  <script>
    document.getElementById("mission-link").addEventListener("click", function(e) {
        e.preventDefault(); // empêche le rechargement
        const submenu = document.querySelector(".submenu");
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    });
    
    // Fermer le menu si clic ailleurs
    document.addEventListener("click", function(e) {
        const dropdown = document.querySelector(".dropdown");
        if (!dropdown.contains(e.target)) {
            document.querySelector(".submenu").style.display = "none";
        }
    });
    </script>




</body>
</html>
