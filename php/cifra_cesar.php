<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifra de César</title>
</head>
<body>
    <h2>Cifra de César - Criptografar e Descriptografar</h2>

    <!-- Formulário para o usuário inserir o texto e a chave -->
    <form method="POST">
        <label for="texto">Digite o texto:</label><br>
        <input type="text" name="texto" id="texto" required><br><br>

        <label for="shift">Digite a chave (deslocamento):</label><br>
        <input type="number" name="shift" id="shift" value="3" required><br><br>

        <input type="submit" value="Criptografar">
        <input type="submit" name="descriptografar" value="Descriptografar">
    </form>

    <br>

    <?php
    // Função para criptografar
    function encrypt($text, $shift) {
        $result = "";
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            // Processa apenas caracteres alfabéticos
            if (ctype_alpha($char)) {
                // Determina o deslocamento ASCII
                $ascii_offset = ctype_upper($char) ? 65 : 97;

                // Aplica a fórmula da cifra de César
                $char = chr((ord($char) - $ascii_offset + $shift) % 26 + $ascii_offset);
            }

            $result .= $char;
        }
        return $result;
    }

    // Função para descriptografar
    function decrypt($text, $shift) {
        // Para descriptografar, é só aplicar o deslocamento negativo
        return encrypt($text, -$shift);
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $texto = $_POST['texto'];  // Texto inserido pelo usuário
        $shift = $_POST['shift'];  // Chave (deslocamento) inserida pelo usuário

        // Se o usuário clicou no botão de Criptografar
        if (!isset($_POST['descriptografar'])) {
            $texto_criptografado = encrypt($texto, $shift);
            echo "<h3>Texto Original: $texto</h3>";
            echo "<h3>Texto Criptografado: $texto_criptografado</h3>";
        }

        // Se o usuário clicou no botão de Descriptografar
        if (isset($_POST['descriptografar'])) {
            $texto_descriptografado = decrypt($texto, $shift);
            echo "<h3>Texto Original: $texto</h3>";
            echo "<h3>Texto Descriptografado: $texto_descriptografado</h3>";
        }
    }

    //PARA EXECUTAR SIGA OS PASSOS:
    
    // Através do prompt de comando, navegue até a pasta onde está salvo o arquivo "cifra_cesar.php" utilizando o comando abaixo: 
    
    // cd + endereço da pasta aonde foi salvo o arquivo
    
    // Depois, digite "php -S localhost:8000" no prompt de comando. 
    // Após isso, acesse " http://localhost:8000/cifra_cesar.php " no navegador. Pronto!

    ?>
</body>
</html>

