📒 Cadastro de Contatos

Este projeto é uma aplicação web desenvolvida em PHP que permite gerenciar contatos de forma eficiente. Com funcionalidades de CRUD (Criar, Ler, Atualizar e Excluir), os usuários podem manter um registro organizado de suas informações de contato.

🚀 Funcionalidades

✅ Adicionar Contatos: Permite a inserção de novos contatos com informações detalhadas.

✅ Visualizar Contatos: Exibe uma lista completa dos contatos cadastrados.

✅ Editar Contatos: Possibilita a atualização das informações de contatos existentes.

✅ Excluir Contatos: Permite remover contatos indesejados ou desatualizados.

🛠 Tecnologias Utilizadas

🔹 Frontend: HTML, CSS e JavaScript para a estrutura e estilo da interface.

🔹 Backend: PHP para o processamento e manipulação dos dados.

🔹 Banco de Dados: MySQL para armazenamento persistente das informações de contato.

📂 Estrutura do Projeto

📦 cadastro_contatos
├── 📄 index.php          # Página principal que exibe a lista de contatos
├── 📄 adicionar.php      # Página com o formulário para adicionar novos contatos
├── 📄 editar.php        # Página para editar as informações de um contato existente
├── 📁 php_action/       # Contém os scripts PHP responsáveis pelas operações de CRUD
├── 📁 includes/         # Diretório com arquivos auxiliares, como cabeçalhos e rodapés
└── 📄 crud_cadastro_contatos.sql  # Script SQL para criação da tabela no banco de dados

⚙️ Configuração e Execução

Para executar este projeto localmente, siga os passos abaixo:

1️⃣ Clone o repositório:

git clone https://github.com/Mflexing/cadastro_contatos.git

2️⃣ Configure o ambiente:

Certifique-se de ter um servidor web (como Apache) com suporte a PHP e um banco de dados MySQL.

Importe o arquivo crud_cadastro_contatos.sql no seu banco de dados para criar a tabela necessária.

Atualize as credenciais de acesso ao banco de dados nos arquivos PHP, se necessário.

3️⃣ Inicie o servidor:

Coloque os arquivos do projeto no diretório raiz do seu servidor web.

Acesse http://localhost/index.php no seu navegador para utilizar a aplicação.
