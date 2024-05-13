<?php
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resume Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css -->
        <link rel="stylesheet" href="../assets/css/main.css">


        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

    </head>
    <body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

:root{
    --clr-blue: #03a4ed;
    --clr-blue-mid: #03a4ed;
    --clr-blue-dark: #03a4ed;
    --clr-white: #fff;
    --clr-bright: #EFF2F9;
    --clr-dark: #03a4ed;
    --clr-black: #03a4ed;
    --clr-grey: #03a4ed;
    --clr-green: #fe3f40;
    --font-poppins: 'Poppins', sans-serif;
    --font-manrope: 'Manrope', sans-serif;;
    --transition: all 300ms ease-in-out;
}

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html{
    font-size: 10px;
}

body{
    font-size: 1.6rem;
    font-family: var(--font-poppins);
}

button{
    border: none;
    background-color: transparent;
    outline: 0;
    cursor: pointer;
    font-family: inherit;
}

img{
    width: 100%;
    display: block;
}

a{
    text-decoration: none;
}

/* fonts */
.font-poppins{font-family: var(--font-poppins);}
.font-manrope{font-family: var(--font-manrope);}

/* text colors */
.text-blue{color: var(--clr-blue);}
.text-blue-mid{color: var(--clr-blue-mid);}
.text-blue-dark{color: var(--clr-blue-dark);}
.text-bright{color: var(--clr-bright);}
.text-dark{color: var(--clr-dark);}
.text-grey{color: var(--clr-grey);}
.text-white{color: var(--clr-white);}

/* backgrounds */
.bg-blue{background-color: var(--clr-blue);}
.bg-blue-mid{background-color: var(--clr-blue-mid);}
.bg-blue-dark{background-color: var(--clr-blue-dark);}
.bg-bright{background-color: var(--clr-bright);}
.bg-dark{background-color: var(--clr-dark);}
.bg-grey{background-color: var(--clr-grey);}
.bg-white{background-color: var(--clr-white);}
.bg-black{background-color: var(--clr-black);}
.bg-green{background-color: var(--clr-green);}

.text-center{ text-align: center;}
.text-left{text-align: left;}
.text-right{text-align: right;}
.text-uppercase{text-transform: uppercase;}
.text-lowercase{text-transform: lowercase;}
.text-capitalize{text-transform: capitalize;}
.text{
    color: var(--clr-dark);
    opacity: 0.9;
    margin: 2rem 0;
    line-height: 1.6;
}

.fw-2{font-weight: 200;}
.fw-3{font-weight: 300;}
.fw-4{font-weight: 400;}
.fw-5{font-weight: 500;}
.fw-6{font-weight: 600;}
.fw-7{font-weight: 700;}
.fw-8{font-weight: 800;}

.fs-13{font-size: 13px;}
.fs-14{font-size: 14px;}
.fs-15{font-size: 15px;}
.fs-16{font-size: 16px;}
.fs-17{font-size: 17px;}
.fs-18{font-size: 18px;}
.fs-19{font-size: 19px;}
.fs-20{font-size: 20px;}
.fs-21{font-size: 21px;}
.fs-22{font-size: 22px;}
.fs-23{font-size: 23px;}
.fs-24{font-size: 24px;}
.fs-25{font-size: 25px;}

.ls-1{letter-spacing: 1px;}
.ls-2{letter-spacing: 2px;}

.container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.6rem;
}

/* bars button */
.bars{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 16.5px;
    width: 25px;
}
.bars .bar{
    width: 100%;
    height: 2px;
    background-color: var(--clr-blue);
    transition: var(--transition);
}

.bars:hover .bar{
    background-color: var(--clr-dark);
}

/* buttons */
.btn{
    font-size: 14.5px;
    font-weight: 600;
    padding: 1.4rem 1.6rem;
    border-radius: 4px;
    display: inline-block;
}

.btn-primary{
    background-color: var(--clr-blue);
    color: var(--clr-white);
    border: 1px solid var(--clr-blue);
    transition: var(--transition);
}

.btn-primary:hover{
    background-color: transparent;
    color: var(--clr-dark);
    border-color: var(--clr-grey);
}

.btn-secondary{
    background-color: transparent;
    color: var(--clr-dark);
    border: 1px solid var(--clr-grey);
    transition: var(--transition);
}

.btn-secondary:hover{
    background-color: var(--clr-blue);
    color: var(--clr-white);
    border-color: var(--clr-blue);
}

.btn-group button:first-child, .btn-group a:first-child{
    margin-right: 1rem!important;
}

/* navbar part */
.navbar{
    height: 80px;
    display: flex;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.08) 0px 3px 8px;
}

.navbar .container{
    width: 100%;
}

.navbar-brand{
    display: flex;
    align-items: center;
    justify-content: flex-start;
    font-size: 1.8rem;
}
.navbar-brand-text{
    color: var(--clr-dark);
    font-weight: 600;
}
.navbar-brand-text span{
    color: var(--clr-blue);
}
.navbar-brand-icon{
    width: 25px;
    margin-right: 6px;
    opacity: 0.8;
}
.brand-and-toggler{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.header{
    min-height: calc(100vh - 80px);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.header-content{
    max-width: 740px;
    margin-right: auto;
    margin-left: auto;
}
.header-content img{
    max-width: 760px;
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
    margin-top: 3.2rem;
}
.lg-title{
    margin: 1.4rem 0;
    font-size: 37px;
    line-height: 1.4;
    color: var(--clr-dark);
}
.header-content p{
    margin-bottom: 2.6rem;
    line-height: 1.6;
}


/* section one */
.section-one{
    padding: 64px 0;
    min-height: 80vh;
    display: flex;
    align-items: center;
}
.section-one-l img{
    max-width: 545px;
    margin-right: auto;
    margin-left: auto;
}
.section-one-r{
    margin-top: 4rem;
}

.section-one .btn-group{
    margin-top: 2rem;
}
.section-one-r{
    max-width: 545px;
    margin-right: auto;
    margin-left: auto;
}
.section-one-r .btn-group{
    margin-top: 3rem;
}

/* section two */
.section-two{
    padding: 64px 0;
}
.section-two .section-items{
    display: grid;
    gap: 2rem;
}

.section-two .section-item{
    max-width: 350px;
    text-align: center;
    margin-right: auto;
    margin-left: auto;
}
.section-two .section-item-icon{
    margin: 1rem 0;
}
.section-two .section-item-icon img{
    width: 80px;
    margin-right: auto;
    margin-left: auto;
}
.section-two .section-item-title{
    color: var(--clr-blue-dark);
    font-size: 1.8rem;
    font-weight: 600;
}
.section-two .text{
    margin: 0.9rem 0;
}

/* footer */
.footer{
    padding: 3rem 0;
}
.footer-content p{
    color: var(--clr-grey);
}
.footer-content p span{
    color: var(--clr-white);
}

/* media queries */
@media screen and (min-width: 768px){
    .section-two .section-items{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (min-width: 992px){
    .section-one-content{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 3rem;
    }
    .section-one-r{
        text-align: left;
    }
    .section-two .section-items{
        grid-template-columns: repeat(3, 1fr);
    }
    .section-two .section-item{
        text-align: left;
    }
    .section-two .section-item-icon img{
        margin-left: 0;
    }
}



/* resume page */
#about-sc{
    padding: 64px 0;
}

.cv-form-row-title{
    background-color: var(--clr-dark);
    padding: 0.8rem 1.6rem;
    margin-bottom: 2rem;
}

.cv-form-row-title h3{
    color: var(--clr-white);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 1.7rem;
}
.cv-form-blk{
    margin: 3rem 0;
}
.cv-form-row{
    padding: 3rem 2rem 0 2rem;
    border: 1px solid rgba(45, 114, 234, 0.08);
    margin-bottom: 1rem;
    position: relative;
}
textarea{
    resize: none;
}
.form-elem{
    margin-bottom: 3rem;
    position: relative;
}
.form-label{
    display: block;
    font-weight: 600;
    font-size: 14px;
    color: var(--clr-dark);
    margin-bottom: 0.5rem;
}
.form-control{
    border-radius: none;
    border: 1px solid rgba(246, 121, 89, 0.1);
    font-size: 14px;
    padding: 0.8rem 1.6rem;
    font-family: inherit;
    width: 100%;
    outline: 0;
    transition: var(--transition);
}

.form-control:focus{
    border-color: rgba(0, 0, 0, 0.3);
}
.form-text{
    color: #ca0b00;
    font-size: 12px;
    position: absolute;
    letter-spacing: 0.5px;
    top: calc(100% + 2px);
    left: 0;
    width: 100%;
}
.cols-3, .cols-2{
    display: grid;
}
.repeater-add-btn{
    width: 25px;
    height: 25px;
    background-color: var(--clr-blue-mid);
    font-size: 1.6rem;
    color: var(--clr-white);
    margin: 1rem 0;
}
.repeater-remove-btn{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 999;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-color: #ca0b00;
    color: var(--clr-white);
    font-size: 1.6rem;
}

/* preview section */
.preview-cnt{
    border-radius: 5px;
    display: grid;
    grid-template-columns: 32% auto;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    overflow: hidden;
}

.preview-cnt-l{
    padding: 3rem 3rem 2rem 3rem;
}
.preview-cnt-r{
    padding: 3rem 3rem 3rem 4rem;
}
.preview-cnt-l .preview-blk:nth-child(1){
    text-align: center;
}
.preview-image{
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: auto;
    margin-left: auto;
}
.preview-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.preview-item-name{
    font-size: 2.4rem;
    font-weight: 600;
    margin: 1.8rem 0;
    position: relative;
}
.preview-item-name::after{
    position: absolute;
    content: "";
    bottom: -10px;
    width: 50px;
    height: 1.5px;
    background-color: rgba(48, 149, 250, 0.5);
    left: 50%;
    transform: translateX(-50%);
}
.preview-blk{
    padding: 1rem 0;
    margin-bottom: 1rem;
}
.preview-blk-title h3{
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 0.5px solid rgba(48, 149, 250, 0.5);
    padding-bottom: 0.5rem;
}
.preview-blk-title{
    margin-bottom: 1rem;
}
.preview-blk-list .preview-item{
    font-size: 1.5rem;
    margin-bottom: 0.2rem;
    opacity: 0.95;
}
.preview-cnt-r .preview-blk-title{
    color: var(--clr-dark);
}
.preview-cnt-r .preview-blk-list .preview-item{
    margin-top: 1.8rem;
}

.achievements-items.preview-blk-list .preview-item span:first-child,
.educations-items.preview-blk-list .preview-item span:first-child,
.experiences-items.preview-blk-list .preview-item span:first-child{
    display: block;
    font-weight: 600;
    margin-bottom: 1rem;
    background-color: rgba(246, 79, 23, 0.03);
}

.educations-items.preview-blk-list .preview-item span:nth-child(2),
.experiences-items.preview-blk-list .preview-item span:nth-child(2){
    font-weight: 600;
    margin-right: 1rem;
}

.educations-items.preview-blk-list .preview-item span:nth-child(3),
.experiences-items.preview-blk-list .preview-item span:nth-child(3){
    font-style: italic;
    margin-right: 1rem;
}

.educations-items.preview-blk-list .preview-item span:nth-child(4),
.educations-items.preview-blk-list .preview-item span:nth-child(5),
.experiences-items.preview-blk-list .preview-item span:nth-child(4),
.experiences-items.preview-blk-list .preview-item span:nth-child(5){
    margin-right: 1rem;
    background-color: var(--clr-green);
    color: var(--clr-white);
    padding: 0 1rem;
    border-radius: 0.6rem;
}

.educations-items.preview-blk-list .preview-item span:nth-child(6),
.experiences-items.preview-blk-list .preview-item span:nth-child(6){
    font-size: 13.5px;
    display: block;
    opacity: 0.8;
    margin-top: 1rem;
}
.projects-items.preview-blk-list .preview-item span{
    display: block;
}

@media screen and (min-width: 768px){
    .cols-3{
        grid-template-columns: repeat(3, 1fr);
        column-gap: 2rem;
    }
    .cols-2{
        grid-template-columns: repeat(2, 1fr);
        column-gap: 2rem;
    }
}

@media screen and (min-width: 992px){
    .cv-form-row{
        padding: 3rem 3rem 0rem 3rem;
    }
    .cols-3{
        grid-template-columns: repeat(3, 1fr);
    }
}

.print-btn-sc{
    margin: 2rem 0 6rem 0;
}

/* print section */
@media print{
    body *{
        visibility: hidden;
    }

    .non_print_area{
        display: none;
    }

    .print_area, .print_area *{
        visibility: visible;
    }

    .print_area{
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
    }
}
</style>
    <div class="content">
        <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="acceuil.php" class="logo">
                      <h4>
                        
                      Kha<span>Damni</span></h4>
                    </a>
        
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="acceuil.php" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#about"></a></li>
                      <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                      <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
                      <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                      <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                      <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                  </nav>
                </div>
              </div>
            </div>
        </header>
       

        <section id = "about-sc" class = "">
            <div class = "container">
                <div class = "about-cnt">
                    <form action="" class="cv-form" id = "cv-form">
                        <div class = "cv-form-blk">
                        <div class="cv-form-row-title">
    <h3>Section À propos</h3>
</div>
<div class="cv-form-row cv-form-row-about">
    <div class="cols-3">
        <div class="form-elem">
            <label for="" class="form-label">Prénom</label>
            <input name="firstname" type="text" class="form-control firstname" id="" onkeyup="generateCV()" placeholder="Ex. John">
            <span class="form-text"></span>
        </div>
        <div class="form-elem">
            <label for="" class="form-label">Deuxième prénom <span class="opt-text">(optionnel)</span></label>
            <input name="middlename" type="text" class="form-control middlename" id="" onkeyup="generateCV()" placeholder="Ex. Herbert">
            <span class="form-text"></span>
        </div>
        <div class="form-elem">
            <label for="" class="form-label">Nom</label>
            <input name="lastname" type="text" class="form-control lastname" id="" onkeyup="generateCV()" placeholder="Ex. Doe">
            <span class="form-text"></span>
        </div>
    </div>
</div>


<div class="cols-3">
    <div class="form-elem">
        <label for="" class="form-label">Votre image</label>
        <input name="image" type="file" class="form-control image" id="" accept="image/*" onchange="previewImage()">
    </div>
    <div class="form-elem">
        <label for="" class="form-label">Fonction</label>
        <input name="designation" type="text" class="form-control designation" id="" onkeyup="generateCV()" placeholder="Ex. Chef Comptable">
        <span class="form-text"></span>
    </div>
    <div class="form-elem">
        <label for="" class="form-label">Adresse</label>
        <input name="address" type="text" class="form-control address" id="" onkeyup="generateCV()" placeholder="Ex. Rue du Lac, 23">
        <span class="form-text"></span>
    </div>
</div>


<div class="cols-3">
    <div class="form-elem">
        <label for="" class="form-label">Email</label>
        <input name="email" type="text" class="form-control email" id="" onkeyup="generateCV()" placeholder="Ex. johndoe@gmail.com">
        <span class="form-text"></span>
    </div>
    <div class="form-elem">
        <label for="" class="form-label">Téléphone :</label>
        <input name="phoneno" type="text" class="form-control phoneno" id="" onkeyup="generateCV()" placeholder="+216 ">
        <span class="form-text"></span>
    </div>
    <div class="form-elem">
        <label for="" class="form-label">Résumé</label>
        <input name="summary" type="text" class="form-control summary" id="" onkeyup="generateCV()" placeholder="">
        <span class="form-text"></span>
    </div>
</div>


<div class="cv-form-blk">
    <div class="cv-form-row-title">
        <h3>Réalisations</h3>
    </div>

    <div class="row-separator repeater">
        <div class="repeater" data-repeater-list="group-a">
            <div data-repeater-item>
                <div class="cv-form-row cv-form-row-achievement">
                    <div class="cols-2">
                        <div class="form-elem">
                            <label for="" class="form-label">Titre</label>
                            <input name="achieve_title" type="text" class="form-control achieve_title" id="" onkeyup="generateCV()" placeholder="">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Description</label>
                            <input name="achieve_description" type="text" class="form-control achieve_description" id="" onkeyup="generateCV()" placeholder="">
                            <span class="form-text"></span>
                        </div>
                    </div>
                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                </div>
            </div>
        </div>
        <button type="button" data-repeater-create value="Ajouter" class="repeater-add-btn">+</button>
    </div>
</div>

<div class="cv-form-blk">
    <div class="cv-form-row-title">
        <h3>Expérience</h3>
    </div>

    <div class="row-separator repeater">
        <div class="repeater" data-repeater-list="group-b">
            <div data-repeater-item>
                <div class="cv-form-row cv-form-row-experience">
                    <div class="cols-3">
                        <div class="form-elem">
                            <label for="" class="form-label">Titre</label>
                            <input name="exp_title" type="text" class="form-control exp_title" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Entreprise / Organisation</label>
                            <input name="exp_organization" type="text" class="form-control exp_organization" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Lieu</label>
                            <input name="exp_location" type="text" class="form-control exp_location" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                    </div>

                    <div class="cols-3">
                        <div class="form-elem">
                            <label for="" class="form-label">Date de début</label>
                            <input name="exp_start_date" type="date" class="form-control exp_start_date" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Date de fin</label>
                            <input name="exp_end_date" type="date" class="form-control exp_end_date" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Description</label>
                            <input name="exp_description" type="text" class="form-control exp_description" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                    </div>

                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                </div>
            </div>
        </div>
        <button type="button" data-repeater-create value="Ajouter" class="repeater-add-btn">+</button>
    </div>
</div>


<div class="cv-form-blk">
    <div class="cv-form-row-title">
        <h3>Éducation</h3>
    </div>

    <div class="row-separator repeater">
        <div class="repeater" data-repeater-list="group-c">
            <div data-repeater-item>
                <div class="cv-form-row cv-form-row-experience">
                    <div class="cols-3">
                        <div class="form-elem">
                            <label for="" class="form-label">École</label>
                            <input name="edu_school" type="text" class="form-control edu_school" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Diplôme</label>
                            <input name="edu_degree" type="text" class="form-control edu_degree" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Ville</label>
                            <input name="edu_city" type="text" class="form-control edu_city" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                    </div>

                    <div class="cols-3">
                        <div class="form-elem">
                            <label for="" class="form-label">Date de début</label>
                            <input name="edu_start_date" type="date" class="form-control edu_start_date" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Date de fin</label>
                            <input name="edu_graduation_date" type="date" class="form-control edu_graduation_date" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Description</label>
                            <input name="edu_description" type="text" class="form-control edu_description" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                    </div>

                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                </div>
            </div>
        </div>
        <button type="button" data-repeater-create value="Ajouter" class="repeater-add-btn">+</button>
    </div>
</div>

<div class="cv-form-blk">
    <div class="cv-form-row-title">
        <h3>Projets</h3>
    </div>

    <div class="row-separator repeater">
        <div class="repeater" data-repeater-list="group-d">
            <div data-repeater-item>
                <div class="cv-form-row cv-form-row-experience">
                    <div class="cols-3">
                        <div class="form-elem">
                            <label for="" class="form-label">Nom du projet</label>
                            <input name="proj_title" type="text" class="form-control proj_title" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Lien du projet</label>
                            <input name="proj_link" type="text" class="form-control proj_link" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                        <div class="form-elem">
                            <label for="" class="form-label">Description</label>
                            <input name="proj_description" type="text" class="form-control proj_description" id="" onkeyup="generateCV()">
                            <span class="form-text"></span>
                        </div>
                    </div>
                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                </div>
            </div>
        </div>
        <button type="button" data-repeater-create value="Ajouter" class="repeater-add-btn">+</button>
    </div>
</div>

<div class="cv-form-blk">
    <div class="cv-form-row-title">
        <h3>Compétences</h3>
    </div>

    <div class="row-separator repeater">
        <div class="repeater" data-repeater-list="group-e">
            <div data-repeater-item>
                <div class="cv-form-row cv-form-row-skills">
                    <div class="form-elem">
                        <label for="" class="form-label">Compétence</label>
                        <input name="skill" type="text" class="form-control skill" id="" onkeyup="generateCV()">
                        <span class="form-text"></span>
                    </div>

                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                </div>
            </div>
        </div>
        <button type="button" data-repeater-create value="Ajouter" class="repeater-add-btn">+</button>
    </div>
</div>


<section id="preview-sc" class="print_area">
    <div class="container">
        <div class="preview-cnt">
            <div class="preview-cnt-l bg-green text-white">
                <div class="preview-blk">
                    <div class="preview-image">
                        <img src="" alt="" id="image_dsp">
                    </div>
                    <div class="preview-item preview-item-name">
                        <span class="preview-item-val fw-6" id="fullname_dsp"></span>
                    </div>
                    <div class="preview-item">
                        <span class="preview-item-val text-uppercase fw-6 ls-1" id="designation_dsp"></span>
                    </div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>A propos</h3>
                    </div>
                    <div class="preview-blk-list">
                        <div class="preview-item">
                            <span class="preview-item-val" id="phoneno_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="email_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="address_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="summary_dsp"></span>
                        </div>
                    </div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Compétences</h3>
                    </div>
                    <div class="skills-items preview-blk-list" id="skills_dsp">
                        <!-- skills list here -->
                    </div>
                </div>
            </div>

            <div class="preview-cnt-r bg-white">
                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>RÉALISATIONS</h3>
                    </div>
                    <div class="achievements-items preview-blk-list" id="achievements_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>educations</h3>
                    </div>
                    <div class="educations-items preview-blk-list" id="educations_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>experiences</h3>
                    </div>
                    <div class="experiences-items preview-blk-list" id="experiences_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>projects</h3>
                    </div>
                    <div class="projects-items preview-blk-list" id="projects_dsp"></div>
                </div>
            </div>
        </div>
    </div>
</section>

        <section class = "print-btn-sc">
            <div class = "container">
                <button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Print CV</button>
            </div>
        </section>

        <section class="">
    <div class="container">
        <button type="button" class="print-btn btn btn-primary"><a href="ajoutDemande.php" style="color: white; text-decoration: none;">Retour à la page précédente</a></button>
    </div>
</section>



        </div>
    
        
   

<script src="../assets/js/main.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/animation.js"></script>
<script src="../assets/js/imagesloaded.js"></script>
<script src="../assets/js/templatemo-custom.js"></script>        

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "../assets/js/script.js"></script>
        <!-- app js -->
        <script src="../assets/js/app.js"></script>
    </body>
</html>