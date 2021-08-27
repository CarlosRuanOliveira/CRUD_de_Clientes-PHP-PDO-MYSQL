<main>
    <nav>
        <li class="btn"><a href="index.php">Voltar</a></li>
    </nav>
    <fieldset>
        <h1><?=TITLE?></h1>
        <!--Obrigatórios: cpf, nome, fone, email-->
        <form method="POST">
            <div>
                <label>CPF: </label>
                <input type="text" name="cpf" maxlength="11" value="<?=$obCliente->cpf?>" required>
            </div>

            <div>
                <label>Nome:</label>
                <input type="text" name="nome" maxlength="50" value="<?=$obCliente->nome?>" required>
            </div>
            
            <div>
                <label>Telefone: </label>
                <input type="text" name="fone" maxlength="14" value="<?=$obCliente->telefone?>" required>
            </div>

            <div>
                <label>Email: </label>
                <input type="text" name="email" maxlength="50" value="<?=$obCliente->email?>" required>
            </div>

            <div id="endereco">
                <label>UF e Cidade:</label>
                <select name="uf">
                    <option selected value="<?=$obCliente->uf?>"><?=$obCliente->uf?></option>
                    <option value="RO">RO</option>
                    <option value="AC">AC</option>
                    <option value="AM">AM</option>
                    <option value="RR">RR</option>
                    <option value="PA">PA</option>
                    <option value="AP">AP</option>
                    <option value="TO">TO</option>
                    <option value="MA">MA</option>
                    <option value="PI">PI</option>
                    <option value="CE">CE</option>
                    <option value="RN">RN</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="AL">AL</option>
                    <option value="SE">SE</option>
                    <option value="BA">BA</option>
                    <option value="MG">MG</option>
                    <option value="ES">ES</option>
                    <option value="RJ">RJ</option>
                    <option value="SP">SP</option>
                    <option value="PR">PR</option>
                    <option value="SC">SC</option>
                    <option value="RS">RS</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="GO">GO</option>
                    <option value="DF">DF</option>
                </select>
                <input type="text" name="cidade" maxlength="50" value="<?=$obCliente->cidade?>">
            </div>

            <div>
                <label>Nascimento:</label>
                <input type="date" id="input-data" name="nasc" value="<?=$obCliente->nascimento?>"><br>
            </div>

            <div id="radio">
                <label>Sexo: </label>
                <input  type="radio" value="masculino" name="sexo" id="masc" <?=$obCliente->sexo == 'masculino' ? 'checked':''?>>
                <label for="masc">Masculino</label>
                <input  type="radio" value="feminino" name="sexo" id="femi" <?=$obCliente->sexo == 'feminino' ? 'checked':''?>>
                <label for="femi">Feminino</label>
            </div>
                        
            <div>
                <input id="submit" class="btnGreen" type="submit" value="Enviar">
            </div>
        </form>
    </fieldset>
</main>