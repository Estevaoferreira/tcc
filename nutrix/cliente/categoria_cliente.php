<!DOCTYPE html>
<html>
<head>
    <title>Restrições Alimentares</title>
    <link href="../estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to bottom, #00ff00, #ffff00);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        text-align: center;
    }

    h1 {
        color: #fff;
    }

    .category-cloud {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 20px;
    }

    .category-cloud .category {
        display: inline-block;
        padding: 5px 10px;
        margin: 5px;
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .category-cloud .category.selected {
        background-color: #80bdff;
        color: #fff;
    }

    #finishBtn {
        display: none;
        margin-top: 20px;
    }

    .category-cloud .category .plus-sign,
    .category-cloud .category .minus-sign {
        display: inline-block;
        width: 12px;
        height: 12px;
        margin-right: 5px;
        text-align: center;
        font-weight: bold;
    }

    .category-cloud .category .plus-sign {
        background-color: #000;
        color: #fff;
    }

    .category-cloud .category .minus-sign {
        background-color: #ff0000;
        color: #fff;
    }

    @media screen and (max-width: 650px) {
        h1 {
            font-size: 24px;
            color: red;
        }

        .category-cloud .category {
            font-size: 12px;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Restrições Alimentares</h1>
        <div class="category-cloud">
            <!-- Categoria em formato de nuvem de palavras -->
        </div>
        <button id="finishBtn" class="btn btn-primary">Finalizar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>