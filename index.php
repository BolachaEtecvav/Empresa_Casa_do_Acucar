<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Casa do Açúcar</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="front/styles/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="mb-auto">
        <nav id="navbar">
            <i class="float-md-start mb-0" id="nav_logo" ><img src="imagem/logo.png"></i>

            <ul id="nav_list">
                <li class="nav-item active">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Menu</a>
                </li>
            </ul>
            <button class="btn-default">
                Sobre nós
            </button>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"> </i>
            </button>

        </nav>
   
        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Menu</a>
                </li>
            </ul>
            <button class="btn-default">
                Sobre nós
            </button>
        </div>

    </header>

  <main id="content">
    <section id="home">

      <div id="shape"></div>

      <div id="cta">

        <h1 class="title">
          Bem-vindo à <br>
          <span>Casa do Açúcar!</span>
        </h1>
        <br>

        <p class="text">Na Casa do Açúcar, cada doce é feito com carinho, capricho e aquele toque especial que só 
        uma verdadeira doceria artesanal pode oferecer. Nosso compromisso é transformar momentos simples em experiências deliciosas com doces que derretem na boca.
        </p>
        <p class="text">Nossa missão é levar mais do que sabor, queremos adoçar o seu dia, e portanto você pode encomendar 
        doces personalizados para festas, eventos e presentes. Afinal, a vida fica muito mais feliz quando é adoçada com carinho.</p>

        <br>
        <div id="cta_buttons">
         <a href="#menu" class="btn-default"> Ver Menu</a> 
         <br>

        <div class="social-media-buttons">
          <a href="https://wa.me/551123456789">
            <i class="fa-brands fa-whatsapp"></i>
          </a>

          <a href="">
            <i class="fa-brands fa-instagram"></i>
          </a>

          <a href="">
            <i class="fa-brands fa-facebook"></i>
          </a>

        </div>


      </div>
    </section>

 <section id="menu">
            <h2 class="section-title">Menu</h2>
            <h3 class="section-subtitle">Comidas</h3>

            <div id="dishes">
                <div class="dish">
                    <img src="imagem/Tortinha_de_limao.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Tortinha de Limão
                    </h3>

                    <span class="dish-description">
                        Massa crocante, recheio cremoso de limão e cobertura delicada de merengue maçaricado.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$7,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/bolo_chocolate.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Bolo de Chocolate
                    </h3>

                    <span class="dish-description">
                        Fatias fofinhas de bolo de chocolate com cobertura cremosa que derrete na boca.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$10,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/brigadeiro.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Brigadeiro (unidade)
                    </h3>

                    <span class="dish-description">
                        O docinho brasileiro mais amado: massa macia, feita com leite condensado e cacau, enrolado no granulado com muito carinho.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4>À partir de R$2,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/cookie.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Cookie (unidade)
                    </h3>

                    <span class="dish-description">
                        Crocan­te por fora, macio por dentro, recheado com pedaços generosos de chocolate.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$8,00</h4>
                    </div>
                </div>
            </div>
            <br><br>
            <h3 class="section-subtitle">Bebidas</h3>

            <div id="dishes">
                <div class="dish">
                    <img src="imagem/milkshake.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Milkshake
                    </h3>

                    <span class="dish-description">
                        Bebida cremosa e gelada, feita com sorvete e calda de chocolate.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$25,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/Café.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Expresso (médio)
                    </h3>

                    <span class="dish-description">
                        O sabor intenso do café em sua forma mais pura, perfeito para dar energia e acompanhar um doce especial.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$5,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/cappuccino.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Cappuccino (médio)
                    </h3>

                    <span class="dish-description">
                        Café, leite vaporizado e espuma cremosa, com um toque de chocolate em pó para completar.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4>À partir de R$7,00</h4>
                    </div>
                </div>

                <div class="dish">
                    <img src="imagem/agua.jpg" class="dish-image" alt="">

                    <h3 class="dish-title">
                        Água (garrafa 500mL)
                    </h3>

                    <span class="dish-description">
                        Refrescante e essencial.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="dish-price">
                        <h4> À partir de R$4,00</h4>
                    </div>
                </div>
            </div>
        </section>
  </main>

  <footer>
    <img src="src/images/wave.svg" alt="">

    <div id="footer_items">
      <div class="social-media-buttons">
        <a href="https://wa.me/551123456789">
        <i class="fa-brands fa-whatsapp"></i>
        </a>

      <a href="">
        <i class="fa-brands fa-instagram"></i>
      </a>

      <a href="">
        <i class="fa-brands fa-facebook"></i>
      </a>
         </div>

        </div>

    </footer>
  
  <script src="src/javascript/script.js"></script>
</body>
</html>