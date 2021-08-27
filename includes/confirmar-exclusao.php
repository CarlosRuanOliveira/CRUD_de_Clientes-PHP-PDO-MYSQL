<main>
    <nav>
        <li class="btn"><a href="index.php">Voltar</a></li>
    </nav>
    <fieldset>
        <h1>Excluir cliente</h1>
        <form method="POST">
            <div>
                <p>Você deseja realmente excluir o cliente <strong><?=$obCliente->nome?></strong>?</p>
            </div>
            <br>
            <div>
                <button type="button" id="btnCancel" class="btnGreen"><a href="index.php">Cancelar</a></button>
                <input id="btnDel" class="btnRed" name="excluir" type="submit" value="Excluir">
            </div>
        </form>
    </fieldset>
</main>