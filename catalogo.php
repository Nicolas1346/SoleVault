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

require_once 'conexao.php';

$sql = $sql = "SELECT * FROM produtos
        WHERE (nome LIKE :pesquisa OR marca LIKE :pesquisa)
        AND (:categoria = '' OR categoria = :categoria)
        AND (:tamanho = '' OR tamanho = :tamanho)
        AND (:marcas = '' OR marca = :marcas)";

$consulta = $pdo->prepare($sql);

$consulta->execute([
    'pesquisa' => "%$pesquisa%",
    'categoria' => $categoria,
    'tamanho' => $tamanho,
    'marcas' => $marcas
]);

$produtos = $consulta->fetchAll(PDO::FETCH_ASSOC);

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
                value="<?php echo htmlspecialchars($pesquisa) ?>"
            >

            <button>Pesquisar</button>

            <label for="categoria">Categoria:</label>

            <select id="categoria" name="categoria">
                <option value="">Todos</option>
                <option value="tenis"  <?php if ($categoria == 'tenis') echo 'selected'; ?>>Tenis</option>
                <option value="roupas" <?php if ($categoria == 'roupas') echo 'selected'; ?>>Roupas</option>
            </select>

            <label for="tamanho">Tamanho:</label>

            <select id="tamanho" name="tamanho">
                <option value="">Todos</option>
                <option value="36/39" <?php if ($tamanho == '36/39') echo 'selected'; ?>> Tamanho 36/39</option> 
                <option value="32/35"  <?php if ($tamanho == '32/35') echo 'selected'; ?>> Tamanho 32/35</option>
                <option value="M" <?php if ($tamanho == 'M') echo 'selected'; ?>> M </option>
            </select>

            <label for="marcas">Marcas:</label>

            <select id="marcas" name="marcas">
                <option value="">Todos</option>
                <option value="Blacknine" <?php if ($marcas == 'Blacknine') echo 'selected'; ?>>Blacknine</option>
                <option value="Hocks" <?php if ($marcas == 'Hocks') echo 'selected'; ?>>Hocks</option>
            </select>

        </form>

        <section>

            <h2>Produtos Disponíveis</h2>

            <?php foreach ($produtos as $produto): ?>

                <article class="produto">

                    <h3><?php echo $produto['nome']; ?></h3>

                    <img
                        src="<?php echo $produto['imagem']; ?>"
                        alt="<?php echo $produto['nome']; ?>"
                    >

                    <p>Marca: <?php echo $produto['marca']; ?></p>

                    <p>Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>

                    <p>Tamanho: <?php echo $produto['tamanho']; ?></p>

                </article>

            <?php endforeach; ?>

        </section>

    </main>

</body>
</html>
