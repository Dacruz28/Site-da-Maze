<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contato Maze</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
            padding: 30px;
            color: #333;
        }

        header {
    text-align: center;
    margin-bottom: 30px;
    height: 50px;
    background-color: #49CCCC;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}


        .logo img {
            max-height: 60px;
        }

        h1 {
    color: #333;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600;
}


        h2{
            color: #fff;
            font-size: 25px;
            width: 100%;
            text-align: center;
            padding-top: 5px;
        }
        strong{
            color: #49CCCC;
        }


        .info {
    border-left: 4px solid #49CCCC;
    padding-left: 15px;
    background-color: #fdfdfd;
}


        .info p strong {
            color: #000;
        }

        footer {
            margin-top: 40px;
            font-size: 13px;
            text-align: center;
            color: #999;
        }

@media (max-width: 480px) {
    .container {
        padding: 20px;
    }

    h1, h2 {
        font-size: 20px;
    }
}


    </style>
</head>
<body>
    <div class="container">
        <header>
                <h2>Maze</h2>
        </header>    

        <h1>Nova mensagem de contato</h1>

        <div class="info">
            <p><strong>Nome:</strong> {{ $dados['name'] }}</p>
            <p><strong>E-mail:</strong> {{ $dados['email'] }}</p>
            <p><strong>Assunto:</strong> {{ $dados['assunto'] }}</p>
            <p><strong>Mensagem:</strong><br>{{ $dados['msg'] }}</p>
        </div>

        <footer>
            © {{ date('Y') }} Maze. Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
