<?php
    $mensagem='';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem='<div class="alert alertGreen" >Ação executada com sucesso</div>';
                break;
            
            case 'error':
                $mensagem='<div class="alert alertRed">Ação não executada</div>';
                break;
        }
    }
    $resultados = '';
    //echo '<pre>'; print_r($clientes); echo '</pre>'; exit;
    foreach ($clientes as $cliente) {
        $resultados .= '<tr>
                            <td>' . $cliente->clienteId . '</td>
                            <td>' . $cliente->cpf . '</td>
                            <td>' . $cliente->nome . '</td>
                            <td>' . $cliente->telefone . '</td>
                            <td>' . $cliente->email . '</td>
                            <td>' . $cliente->sexo . '</td>
                            <td>' . $cliente->uf . '</td>
                            <td>' . $cliente->cidade . '</td>
                            <td>' . ($cliente->nascimento ? date('d/m/Y', strtotime($cliente->nascimento)): "") . '</td>
                            <td>
                                <a href="editar.php?clienteId=' . $cliente->clienteId .'">
                                <button class="btnAcoes btnGreen">
                                    <img src="imagens/edit.png">
                                </button></a>
                                <a href="excluir.php?clienteId=' . $cliente->clienteId .'">
                                    <button class="btnAcoes btnRed">
                                    <img src="imagens/del.png">
                                    </button></a>
                            </td>
                        </tr>';
    }
    $resultados = strlen($resultados) ? $resultados :  '<tr>
                                                            <td colspan="10">
                                                                Nenhum cliente encontrado
                                                            </td>
                                                        </tr>'
?>
<main>
    <?=$mensagem?>
    <nav>
        <li class="btn"><a href="cadastro.php">Novo cliente</a></li>
    </nav>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>UF</th>
                <th>Cidade</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>
</main>