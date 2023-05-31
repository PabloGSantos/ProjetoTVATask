<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link disabled">login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tutorial de como se instala o pacote de autenticação laravel/ui') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <h1>Primeiro passo</h1>
                    {{ __('Primeiro abra cmd para baixar o laravel 8.4 dar o php -v baixar o git ir no cmd dar git-v baixar o composer: php composer-setup.php --install-dir=/usr/local/bin --filename=composer
                        depois abri o vs code abri a pasta que esta o laravel e  dar o comando no Terminal do vs code composer require laravel/ui') }}

                    <h1>Segundo passo</h1>
                    {{ __('Ainda no Terminal dar os comandos php artisan ui bootstrap --auth, php artisan migrate') }}

                    <h1>Terceiro passo</h1>
                    {{ __('Com o Terminal abreto dar mais dois comando npm install, npm run dev') }}

                    <h1>Quarto passo</h1>
                    {{ __('logo apos cria um data base no workbench BD_TVA1 depois abri o vs code ir na aba .env Mudar o nome do database= BD_TVA1 ainda na aba .env colocar a senha do baco de dados= acesso123 ') }}

                    <h1>Quinto passo</h1>
                    {{ __('ir na aba views layouts criar um arquivo tutorial.blade.php dar o cando ! para criar o arquivo html colocar o bootstrap dando o comando link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" ') }}

                    <h1>Ultimo passo</h1>
                    {{ __('abra o Terminal e der o comando php artisan serve') }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>