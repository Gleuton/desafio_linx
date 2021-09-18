## API de Catálogo

**Instalar e rodar aplicação:**
<br>
<br>
Dentro do diretório da raiz execute os comandos:

1. Para construir as imagens docker da aplicação:  
   ```docker-compose up -d```

2. Para instalar as dependências do projeto use:  
   ```docker-compose exec api_catalogo-php composer install```

3. Para criar as tabelas no banco de dados use:  
   ```docker-compose exec api_catalogo-php composer desafio-install```

4. Para importar os dados do arquivo catalog.json:  
   ```docker-compose exec api_catalogo-php composer import_data```

Documentação na rota raiz da API

## API de Recomendações
**Instalar e rodar aplicação:**
<br>
<br>
Dentro do diretório da raiz execute os comandos:

1. Para construir as imagens docker da aplicação:  
   ```docker-compose up -d```

2. Para instalar as dependências do projeto use:  
   ```docker-compose exec api_recomenda-php composer install```

3. Para criar as tabelas no banco de dados use:  
   ```docker-compose exec api_recomenda-php composer desafio-install```

Documentação na rota raiz da API

## Aplicação frontend
**Instalar e rodar aplicação:**
<br>
<br>
Dentro do diretório da raiz execute os comandos:
1. Para construir as imagens docker da aplicação:  
   ```docker-compose up -d```