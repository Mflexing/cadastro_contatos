<?php 
// Inicia a sessão
session_start();
// Header
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Contato</h3>
        
        <!-- Exibe mensagens de sucesso ou erro -->
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="card-panel <?php echo $_SESSION['tipo_mensagem']; ?>">
                <?php echo $_SESSION['mensagem']; ?>
            </div>
            <?php
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo_mensagem']);
            endif;
            ?>

        <form action="php_action/create.php" method="POST" onsubmit="return validarFormulario()">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="endereco" id="endereco" required>
                <label for="endereco">Endereço</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="telefone" id="telefone" required
                       pattern="\(?\d{2}\)?\s?\d{4,5}-?\d{4}" 
                       title="Formato: (99) 99999-9999 ou 99999999999">
                <label for="telefone">Telefone</label>
            </div>

            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" class="btn green">Listar Contatos</a>
        </form>
    </div>
</div>

<script>
function validarFormulario() {
    const telefone = document.getElementById('telefone').value;
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    if (!regexTelefone.test(telefone)) {
        alert('Telefone inválido. Use o formato (99) 99999-9999 ou 99999999999.');
        return false;
    }
    return true;
}
</script>

<?php 
// Footer
include_once 'includes/footer.php';
?>