# Gerenciamento de sessões de cinema

## O projeto foi desenvolvido para aula de Banco de Dados II do curso de TADS da UDESC e tem como objetivo permitir que o usuário possa gerenciar as sessões de um cinema

## Funcionamento

O sistema permite visualizar as sessões ativas bem como criar sessões, editá-las, visualizá-las e excluí-las, as sessões estão diretamente ligadas com as tabelas de salas e de filmes. Também é possível gerenciar os filmes, permitindo a visualização dos filmes que estão em cartaz, a edição, a exclusão e a criação de novos filmes, a tabela de filmes está diretamente relacionada com as tabelas de países, diretores e gêneros. Por fim, a aplicação permite criar salas de cinema e visualizar as existentes.

## Como rodar a aplicação no computador?

# ->Para rodar o servidor do PHP utilizamos o [XAMPP](https://www.apachefriends.org/pt_br/index.html), é necessário incluir os arquivos deste projeto na pasta htdocs do XAMPP (É importante abrir o XAMPP e ligar o Apache, caso contrário o PHP nao funciona);
# ->É necessário instalar o [Composer](https://getcomposer.org/download/) que é o gerenciador de dependências do PHP;
## ->É necessário alterar o arquivo php.ini, liberando as extensões mbstring e sodium (para libera-lás apenas precisa remover o ponto e virgula que tem antes do nome de cada uma no arquivo php.ini);
## ->Para o [Firebase](firebase.google.com), disponibilizamos o arquivo JSON do banco, é necessário criar um RealTime Database no Firebase e importar este arquivo JSON, desta forma você terá a estrutura deste banco;
## ->O arquivo dbcon.php contém o link de conexão do banco de dados, é importante você substituir para o link que foi gerado quando você criou o seu banco no Firebase, essa informação fica logo acima da estrutura de dados;
## ->Após estas etapas feitas é necessário digitar na barra de navegação: localhost/(nome da pasta do projeto no htdocs);



## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [PHP](https://www.php.net)
- [HTML](https://html.spec.whatwg.org/multipage/)
- [Bootstrap](https://getbootstrap.com)
- [Firebase](firebase.google.com)
