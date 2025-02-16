<?php 
// Conexão
include_once 'php_action/db_connect.php';
// Setup
include_once 'php_action/setup.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Contatos</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>    
                    <th>Endereço:</th>
                    <th>Telefone:</th>
                    <th>Ações:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM contatos";
                $resultado = mysqli_query($connect, $sql);

                if (mysqli_num_rows($resultado) > 0):
                    while ($dados = mysqli_fetch_array($resultado)):
                        // Validação e sanitização dos dados
                        $nome = !empty($dados['nome']) ? htmlspecialchars($dados['nome']) : 'Não informado';
                        $email = !empty($dados['email']) ? htmlspecialchars($dados['email']) : 'Não informado';
                        $endereco = !empty($dados['endereco']) ? htmlspecialchars($dados['endereco']) : 'Não informado';
                        $telefone = !empty($dados['telefone']) ? htmlspecialchars($dados['telefone']) : 'Não informado';
                ?>
                <tr>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $endereco; ?></td>
                    <td><?php echo $telefone; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>

                <!-- Modal Structure -->
                <div id="modal<?php echo $dados['id']; ?>" class="modal">
                    <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir o contato?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="php_action/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="5">Nenhum contato encontrado.</td>
                </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Contato</a>
    </div>
</div>

<?php 
// Footer
include_once 'includes/footer.php';
?>