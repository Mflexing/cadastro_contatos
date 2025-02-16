<?php 
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';

// Select
if (isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM contatos WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Cliente</h3>
        <form action="php_action/update.php" method="POST" onsubmit="return validarFormulario()">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?php echo $dados['email']; ?>" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="endereco" id="endereco" value="<?php echo $dados['endereco']; ?>" required>
                <label for="endereco">Endereço</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="telefone" id="telefone" value="<?php echo $dados['telefone']; ?>" required
                       pattern="\(?\d{2}\)?\s?\d{4,5}-?\d{4}" 
                       title="Formato: (99) 99999-9999 ou 99999999999">
                <label for="telefone">Telefone</label>
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
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