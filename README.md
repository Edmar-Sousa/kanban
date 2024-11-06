<p align="center">
<img src="https://github.com/Edmar-Sousa/kanban/blob/master/public/images/logo-large.svg" width="400">
</p>

<p>Design fornecido pela equipe da <a href="https://github.com/Rocketseat">Rocketseat</a></p>

# Kanban
<p>Projeto Feito no boracodar, o projeto consiste em um app de tarefas como o Trello, nele é possível adicionar tarefas, marcar como concluída e excluir. Além da possibilidade de criar vários tasks boards .</p>


## Design
![gif com o design do projeto](https://github.com/Edmar-Sousa/kanban/blob/master/readme.gif)

## tecnologias
 - PHP
 - Laravel
 - Inertia
 - VueJs
 - Tailwind

## Como executar o projeto
```bash

# clone o projeto para sua maquina local
git clone https://github.com/Edmar-Sousa/kanban.git

# instale as dependêcias do projeto e atualize se necessário com composer e npm
composer update

# em seguida
npm install

# esse comando criar um atributo chamado APP_KEY no arquivo .env
php artisan key:generate

# O projeto esta configurado para usar o banco de dados SQLite
# Execute a criação das tabelas
php artisan migrate

# Execute as seeds
php artisan db:seed

# em um terminal execute o backend do projeto
php artisan serve

# em um outro terminal execute o front-end do projeto
npm run hot

```


## Author
- Edmar Sousa. <br><br>
[![linkedin](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/edmar-sousa-9666b0201/)
[![github](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Edmar-Sousa)
