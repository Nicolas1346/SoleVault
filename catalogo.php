
<?php

$pesquisa = '';

if (isset($_GET['buscar'])) {
    $pesquisa = $_GET['buscar'];
}

$categoria = '';

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
}

$tamanho = '';

if (isset($_GET['tamanho'])) {
    $tamanho = $_GET['tamanho'];
}

$marcas = '';

if (isset($_GET['marcas'])) {
    $marcas = $_GET['marcas'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | SoleVault</title>

    <link rel="stylesheet" href="css/catalogo.css">
</head>

<body>

    <header>
        <h1>Catálogo de Produtos</h1>
    </header>

    <main>

        <form method="GET">

            <input
                type="text"
                name="buscar"
                placeholder="Buscar por nome ou marca..."
            >

            <button>Pesquisar</button>

            <label for="categoria">Categoria:</label>

            <select id="categoria" name="categoria">
                <option value="">Todas</option>
                <option value="tenis">Tenis</option>
                <option value="roupas">Roupas</option>
            </select>

            <label for="tamanho">Tamanho:</label>

            <select id="tamanho" name="tamanho">
                <option value="">Todos</option>
                <option value="39">Tamanho 39</option>
                <option value="38">Tamanho 38</option>
                <option value="37">Tamanho 37</option>
                <option value="36">Tamanho 36</option>
                <option value="35">Tamanho 35</option>
            </select>

            <label for="marcas">Marcas:</label>

            <select id="marcas" name="marcas">
                <option value="">Todos</option>
                <option value="BAW Clothing">BAW Clothing</option>
                <option value="Off-White">Off-White</option>
                <option value="Y-3">Y-3</option>
                <option value="Thug Nine">Thug Nine</option>
            </select>

        </form>

        <section>

            <h2>Produtos Disponíveis</h2>

                <?php if (
                    ($pesquisa == '' ||
                    stripos('Hocks', $pesquisa) !== false 
                )
                &&
                (
                    $categoria == '' ||
                    $categoria == 'tenis'
                )
            ): ?>

                <article class="produto">

                    <h3>Tênis</h3>

                    <img
                        src="https://s.hocks.com.br/gallery/tenis-hocks-puff-brilhante-04-1407010629.jpg?format=webp"
                        alt="Tênis Hocks Bold"
                    >

                    <p>Tênis Hocks Puff - Brilhante<p>
                    <p>Marca: Hocks</p>
                    <p>Preço: 379,90</p>
                    <p>Tamanho: 39</p>

                </article>

                <?php endif;?>

                <br>
                <br>

                    <?php 
                    if (
                        ($pesquisa == '' || 
                        stripos('Camisa', $pesquisa) !== false
                    )
                       &&
                (
                    $categoria == '' ||
                    $categoria == 'roupas'
                )
            ): ?>

                <article class="produto">

                <h3>Camisa</h3>

                    <img
                        src="https://blacknine.cdn.magazord.com.br/img/2025/08/produto/12120/frente-zoom-2025-08-16t202633-702.png?ims=fit-in/425x635/filters:fill(white)"
                        alt="Camisa From Bom Retiro"
                    >

                    <p>Camisa Oversized streetwear Jesus Christ</p>
                    <p>Marca: Blacknine</p>
                    <p>Preço: 96,90</p>
                    <p>M</p>
                </article>
                    <?php endif;?>

            </section>

    </main>

</body>
</html>