# Formulário de cadastro para evento online

Essa aplicação é composta por uma API REST em PHP 7 com o framework Slim na versão 3.
As dependências foram gerenciadas via composer

## Variáveis de ambiente

A aplicação suporta a adição de variáveis de ambiente através de arquivo de configuração.
crie um arquivo `.env` no diretório raiz da aplicação.
Opções suportadas:

DB_NAME - nome do banco de dados (mysql)\
DB_USER - nome do usuário para conexão com o banco de dados\
DB_PASSWORD - senha para conexão com o banco de dados\
DB_HOST - endereço do servidor de banco de dados\
DB_CHARSET - modelo de caracteres utilizado da aplicação. Padrão "utf8"\
SMTP_HOST - endereço de servidor SMTP\
SMTP_SENDER_MAIL - endereço do remetente SMTP\
SMTP_SENDER_NAME - nome de visualização para o remetente SMTP\
SMTP_USER - usuário de acesso ao servidor SMTP\
SMTP_PASSWORD - senha de acesso ao servidor SMTP