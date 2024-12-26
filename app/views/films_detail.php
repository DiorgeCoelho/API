<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie['title'] ?> - Detalhes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Cabeçalho -->
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <h1 class="card-title display-5 text-decoration-none text-dark text-primary fw-semibold"><?= $movie['title'] ?></h1>
                <p class="text-muted"><em>Nº Episódio:  </em><?= $movie['episode_id'] ?></p>
            </div>
        </div>

        <!-- Informações Detalhadas -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Sinopse</th>
                        <td><?= $movie['opening_crawl'] ?></td>
                    </tr>
                    <tr>
                        <th>Data de Lançamento</th>
                        <td><?= $movie['release_date'] ?></td>
                    </tr>
                    <tr>
                        <th>Diretor(a)</th>
                        <td><?= $movie['director'] ?></td>
                    </tr>
                    <tr>
                        <th>Produtor(es)</th>
                        <td><?= $movie['producer'] ?></td>
                    </tr>
                    <tr>
                        <th>Idade do Filme</th>
                        <td> <?= $age->y ?> anos, <?= $age->m ?> meses, <?= $age->d ?> dias</td>
                    </tr>
                </tbody>
            </table>
        </div>

      <!-- Lista de Personagens -->
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tbody>
        <th>Personagens</th>
            <tr>
                <!-- <td> -->
                    <td class="list-unstyled mb-0">
                        <?php foreach ($movie['characters_names'] as $character): ?>
                            <li><?= $character ?></li>
                        <?php endforeach; ?>
                    </td>
                <!-- </td> -->
            </tr>
        </tbody>
    </table>
</div>

<!-- Botão Voltar -->
<div class="text-center mt-4">
    <a href="/" class="btn btn-primary btn-lg">Voltar ao Catálogo</a>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
