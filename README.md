
# Configuração do Ambiente

### Passo a passo

Clone Repositório
```sh
git clone https://github.com/ricardovitryne/apijn2
```

Suba os containers
```sh
docker-compose up -d --build
```

Instale as dependências do projeto
```sh
docker-compose exec apijn2 composer install
```

Por fim, gere as tabelas e as seeds para testes
```sh
docker-compose exec apijn2 php artisan migrate --seed
```

Rota base da APi
```sh
localhost/api
```

### Endpoints

| Método  |  Endpoint  |Descrição |Observações
| ------------------- | ------------------- |-------------------|-------------------|
|  GET |  localhost/api/cliente | Lista todos os clientes|Collection com paginação. Exibe 15 clientes por página.|
|  POST |  localhost/api/cliente |Cadastra novo cliente|CPF é campo único|
|  PUT |  localhost/api/cliente/{id} |Edita um cliente|Informar no mínimo um campo para atualizar|
|  DELETE |  localhost/api/cliente/{id} |Remove um cliente| Soft delete|
|  GET |  localhost/api/cliente/{id} |Exibe um cliente|ID exibido é na verdade o ID real criptografado |
|  GET |  localhost/api/consulta/final-placa/{numero} |Exibe todos os clientes onde o último número da placa é igual ao informado|É aceito como parâmetro apenas 1 número de 0 a 9.|

### Exemplo de JSON para inserção e atualização:
```sh
{
  "name"		  : "Ricardo Gonçalves",
  "phone"	          : "(74) 9646-0989",
  "cpf"			  : "12345678912",
  "car_plate"	          : "APX-1300"
}
```



Acessar o projeto
[http://localhost](http://localhost)
