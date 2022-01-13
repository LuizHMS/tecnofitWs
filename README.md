Tecnologias utilizadas:
- SO: Windows 10
- XAMPP 8.1.1-2 ( PHP 8.1.1, MariaDB 10.4.22, Apache 2.4.52)
- Composer 
- Slim Framework 4 ("slim/psr7": "^1.5", "slim/slim": "4.\*")

De acordo com a documentação do SLIM FrameWork 4 (https://www.slimframework.com/docs/v4/start/web-servers.html), para que o framework funcione como um webservice, deve-se utilizar o seguinte comando dentro da pasta `/public/`: 
`php -S localhost:8888`

endpoints:
http://localhost:8888/movimentos traz as melhores marcas pessoais de todos os movimentos
http://localhost:8888/movimentos/NOME_MOVIMENTO
traz as melhores marcas pessoais dos movimentos com nome semelhante

Hierarquia de Pastas:
* public -> arquivos de configuração e inicialização dos serviços
* app/models -> Arquivos que tratam acessam o banco de dados.
* app/controllers -> Arquivos de Controllers, as requisições do end-point executam as funções presente nos mesmos
* app/classes -> Arquivos para tratar dados referentes a um serviço
* vendor -> arquivos do framework utilizado


###Instruções de instalação###
- Instale o Apache, PHP e banco de dados MySQL da distribuição que for mais conveniente.
- extraia o repositório em uma pasta que o apache tenha acesso `ex: htdocs/pasta_para_o_respositorio`
- pela linha de comando entre na pasta do repositório e em seguida entre na pasta public `cd htdocs/pasta_para_o_reepositorio/public`
- execute o comando para o PHP executar como serviço na pasta `public`: `php -S localhost:8888`
- no arquivo `/app/models/Model.php` altere a string de conexão de acordo com o seu Banco de Dados instalado
- no arquivo  `/app/models/MMovimento.php` altere o construct apontando para a Base de Dados criada.
- acesse os endpoints citados acima.



Autor: Luiz Henrique Motta de Souza
