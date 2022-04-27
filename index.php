<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory =  (new Factory())->withDatabaseUri('https://pj-integrador-d6221-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

$servicos = $database->getReference('servicos')->getSnapshot();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="./src/css/styles.css" />
  <link rel="stylesheet" href="./src/bootstrap/bootstrap-icons.css" />
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <!--FONTES-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;800&family=Roboto&display=swap" rel="stylesheet">
  <title>DUDA SANTIAGO BEAUTY</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGO
        <img src="" alt="...">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="height: 30px; width: 30px;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Inicio</a>
            <!--text-white-->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Serviços</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br /><br />

  <div id="home" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://cdn.britannica.com/35/222035-050-C68AD682/makeup-cosmetics.jpg" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="https://cdn.britannica.com/35/222035-050-C68AD682/makeup-cosmetics.jpg" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="https://cdn.britannica.com/35/222035-050-C68AD682/makeup-cosmetics.jpg" class="d-block w-100" alt="..." />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <!--SOBRE-->
  <div id="about" class="card mb-3" style="background: rgb(236,187,172);
  background: radial-gradient(circle, rgba(236,187,172,1) 35%, rgba(58,100,80,0.1741071428571429) 100%);">
    <br>
    <h1 class="title text-center">Bem vindo(a) ao meu site!!</h1>
    <br>
    <div class="row g-0 d-flex">
      <div class="col-md-4 d-flex align-items-center justify-content-center " style="margin-bottom: -50px; z-index: 10; width: max-content;">
        <img src="./src/img/duda.jpg" class="img-about" alt="..." style="border: 1px solid black; border-bottom: 0px; border-radius: 15px; box-shadow: 0 0 1em black; width: max-content;" />
      </div>

      <div class="about-text col-md-8">
        <div style="border: 1px solid rgba(0, 0, 0, 0.048); padding: 65px 30px 30px 30px; border-radius: 15px; border-top: 1px solid rgba(0, 0, 0, 0.048);">
          <p class="paragraph card-text text-center" style="max-width: 700px;">
            Comecei a trabalhar na área da beleza em 2018, apenas com
            maquiagem. Tempos depois me apaixonei também pelo mundo das
            sobrancelhas e atualmente tenho mais de 200 horas de cursos já
            concluídos, (fora pesquisas e estudos externos) e mais de 200
            alunas do Método Pure Brows. Meu principal objetivo é valorizar a
            beleza natural de mulheres, fazendo com que se sintam ainda mais
            incríveis!
          </p>

        </div>

      </div>
    </div>
  </div>
  </div>

  <br />

  <div id="services" class="services col text-center ">
    <h1 class="title text-center">Conheça nossos serviços</h1>
    <br><br>
    <div class="col">

      <?php $i = 0; ?>
      <?php foreach ($servicos->getValue() as $key => $servico) : ?>

        <?php
        if ($i % 2 == 0) { ?>

          <div class="grid-card">
            <img class="card-img" src="<?php echo $servico['imagem']; ?>" alt="<?php echo $servico['titulo']; ?>">
            <div class="card-text">
              <p class="paragraph text-center">
                <strong><?php echo $servico['titulo']; ?></strong><br>
                <?php echo $servico['descricao']; ?>
                <br>
                <span><?php echo $servico['preco']; ?></span>
              </p><br>
            </div>
          </div>

          <br><!--ESPAÇO ANTES DE CARREGAR a div do serviço-->

        <?php
        } else { ?>

          <div class="grid-card">
            <div class="card-text">
              <p class="paragraph text-center">
                <strong><?php echo $servico['titulo']; ?></strong><br>
                <?php echo $servico['descricao']; ?>
                <br>
                <span><?php echo $servico['preco']; ?></span>
              </p>
            </div>
            <img class="card-img" src="<?php echo $servico['imagem']; ?>" alt="<?php echo $servico['titulo']; ?>">
          </div>

          <br><!--ESPAÇO ANTES DE CARREGAR a div do serviço-->
          
        <?php
        }
        $i++ ?>

      <?php endforeach; ?>

      <!--
      <div class="grid-card">
        <img class="card-img" src="https://cursosbellarosa.com.br/wp-content/uploads/2021/05/VOLUME-HIBRIDO-OLHAR-DE-GATINHA.jpg" alt="">
        <div class="card-text">
          <p class="paragraph text-center">
            <strong>Design de cilios</strong><br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae perferendis, molestias numquam veniam minima vel deleniti dignissimos. Rem vero deleniti ducimus quae harum, officia debitis quia, odio vel id unde.
            <br>
            <span>R$34,00</span>
          </p><br>
        </div>
      </div>

      <div class="grid-card">
        <div class="card-text">
          <p class="paragraph text-center">
            <strong>Design de sombrancelhas</strong><br>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae perferendis, molestias numquam veniam minima vel deleniti dignissimos. Rem vero deleniti ducimus quae harum, officia debitis quia, odio vel id unde.
            <br>
            <span>R$34,00</span>
          </p>
        </div>
        <img class="card-img" src="https://cursosbellarosa.com.br/wp-content/uploads/2021/05/VOLUME-HIBRIDO-OLHAR-DE-GATINHA.jpg" alt="">
      </div>-->
    </div>
  </div>
  <br><br>

  <div class="container-localization d-flex text-center">
    <section>
      <strong class="subtitle text-justify">Venha nos fazer uma visita</strong>
      <p class="paragraph">Avenida Deputado Quintino Vargas<br>
        310, centro <br>
        Paracatu Shopping, sala 08
      </p>
      <div>
        <strong class="subtitle">Agende conosco</strong>
        <div class="midias">
          <!-- Facebook -->
          <a target="_blank" class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://api.whatsapp.com/send?phone=5538998400449" role="button" data-mdb-ripple-color="dark"><i class="fab bi-whatsapp"></i></a>

          <!-- Instagram -->
          <a target="_blank" class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://instagram.com/dudasantiago.beauty?igshid=NDA1YzNhOGU" role="button" data-mdb-ripple-color="dark"><i class="fab bi-instagram"></i></a>
        </div>
      </div>
    </section>
    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30486.77671007335!2d-46.87003871309739!3d-17.226205754930714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94a84a70a9265431%3A0x74490dcab238a661!2sellegance!5e0!3m2!1spt-BR!2sbr!4v1650068725002!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <br><br>
  <footer class="text-center ">
    <div class="paragraph text-center text-dark p-3" style="font-size: 14px;">
      Copyright © 2022 Duda Santiago Beauty - Todos os direitos reservados
      CNPJ: 42.486.976/0001-66
    </div>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>