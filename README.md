
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

Acessar o projeto
[http://localhost](http://localhost)
