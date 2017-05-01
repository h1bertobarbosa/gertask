=========

**Observações**
* Questão 1: Pode ser acessado pela url http://localhost/exercicio1/100
* Questão 2: O código esta em app/exercicio2.php
* Questão 3: O código esta em app/exercicio3
* Questão 4: As urls da api são:
 - Cadastro POST http://localhost/api/tarefa
 - Alteração PUT http://localhost/api/tarefa/{id}
 - Alteração DELETE http://localhost/api/tarefa/{id}
 - Para acesso a interface: http://localhost/tarefa/
 * Os testes estão na pasta tests
 
**Pré-requisitos**
* [Docker Compose para Linux](https://docs.docker.com/compose/install/)
* [Docker ToolBox para Windows ou Mac](https://www.docker.com/products/docker-toolbox )


**Primeiro passos**

* Clonar o Projeto
```sh
$ git clone git@github.com:h1bertobarbosa/gertask.git
```

* Faça uma cópia do arquivo .env.example para .env
```sh
$ cp ./var/www/gertask/.env.example ./var/www/gertask/.env
```


**Levantando ambiente para desenvolvimento**
```sh
$ docker-compose run -p 80:80 --rm development
```
* Você estará dentro da máquina virtual pronto para trabalhar
* Seus dados do git são compartilhados na máquina virtual
* Para acessar o sistema, entre com navegador no endereço [http://localhost](http://localhost)
* Dentro do container executar o composer install para fazer o download das bibliotecas necessárias
