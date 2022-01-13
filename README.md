Tecnologias utilizadas:
- SO: Windows 10
- XAMPP 8.1.1-2 ( PHP 8.1.1, MariaDB 10.4.22, Apache 2.4.52)
- Composer 
- Slim Framework 4 ("slim/psr7": "^1.5", "slim/slim": "4.\*")



De acordo com a documentação do SLIM FrameWork 4 (https://www.slimframework.com/docs/v4/start/web-servers.html), para que o framework funcione como um webservice, deve-se utilizar o seguinte comando dentro da pasta /public/: 
php -S localhost:8888

endpoints:
http://localhost:8888/movimentos traz as melhores marcas pessoais de todos os movimentos
http://localhost:8888/movimentos/NOME_MOVIMENTO
traz as melhores marcas pessoais dos movimentos com nome semelhante

Hierarquia de Pastas:
* public -> arquivos de configuração e inicialização dos serviços
* app/model -> Arquivos que tratam acessam o banco de dados.
* app/controllers -> Arquivos de Controllers, as requisições do end-point executam as funções presente nos mesmos
* app/classes -> Arquivos para tratar dados referentes a um serviço
* vendor -> arquivos do framework utilizado

Autor: Luiz Henrique Motta de Souza
