# 🎫 Painel de Senhas

Sistema de gerenciamento de filas de atendimento desenvolvido com **Laravel**, utilizando **Redis**, **Queues** e **Laravel Reverb** para comunicação em tempo real entre clientes e painel de atendimento.

> Projeto desenvolvido com foco em boas práticas de arquitetura, separação de responsabilidades, processamento assíncrono e comunicação em tempo real utilizando o ecossistema Laravel.

---

## 🎥 Demonstração

<p align="center">
    <img src="./docs/github-demo.gif" alt="Demonstração do Painel de Senhas" width="900">
</p>

Durante a demonstração é possível visualizar o fluxo completo da aplicação:

- Geração de uma nova senha;
- Persistência no banco de dados;
- Chamada da senha;
- Processamento assíncrono utilizando Queue;
- Disparo do evento;
- Atualização automática do painel via Laravel Reverb.

---

# 📖 Sobre o projeto

O Painel de Senhas simula um sistema de gerenciamento de filas utilizado em clínicas, hospitais, repartições públicas e empresas.

O principal objetivo do projeto foi estudar como construir uma aplicação desacoplada utilizando os principais recursos do ecossistema Laravel, como:

- Services
- Events
- Broadcasting
- Queues
- Redis
- Laravel Reverb

A arquitetura foi organizada para manter a regra de negócio isolada da camada HTTP, facilitando manutenção, testes e evolução da aplicação.

---

# ✨ Funcionalidades

- ✅ Gerar senhas
- ✅ Listar senhas
- ✅ Chamar senhas
- ✅ Atualização em tempo real
- ✅ Processamento assíncrono utilizando Queue
- ✅ Broadcast de eventos
- ✅ Arquitetura baseada em Services
- ✅ Regras de negócio desacopladas dos Controllers

---

# 🛠️ Tecnologias

## Backend

- Laravel 13
- PHP 8.4
- MySQL
- Redis
- Laravel Reverb
- Laravel Echo
- Queue Worker

## Frontend

- Blade
- JavaScript
- Vite

> O frontend será migrado futuramente para Vue 3 e Pinia.

---

# 🏛️ Arquitetura

A aplicação foi organizada seguindo o princípio de responsabilidade única (SRP), onde cada camada possui apenas uma responsabilidade.

```text
Cliente
    │
    ▼
Controller
    │
    ▼
Service
    │
    ▼
Model
    │
    ▼
Banco de Dados
    │
    ▼
Event
    │
    ▼
Queue
    │
    ▼
Broadcast
    │
    ▼
Laravel Reverb
    │
    ▼
Laravel Echo
    │
    ▼
Atualização automática da interface
```

---

# 📂 Estrutura do projeto

```text
app
├── Events
├── Exceptions
├── Http
│   └── Controllers
├── Models
├── Providers
├── Services
│   └── V1
└── Jobs

routes
database
resources
```

---

# ⚙️ Fluxo da aplicação

Quando uma senha é chamada, o seguinte fluxo acontece:

1. O Controller recebe a requisição.
2. A regra de negócio é executada pela camada Service.
3. O status da senha é atualizado.
4. Um evento é disparado.
5. O evento é processado pela Queue.
6. O Laravel Reverb realiza o Broadcast.
7. O Laravel Echo recebe o evento.
8. A interface é atualizada automaticamente, sem necessidade de recarregar a página.

---

# 🔬 Desenvolvimento

Antes da implementação do frontend definitivo, foi criada uma interface de testes utilizando Blade e JavaScript para validar toda a comunicação em tempo real.

Essa etapa permitiu validar:

- ✔ Broadcast de eventos
- ✔ Processamento da fila
- ✔ Comunicação com Laravel Reverb
- ✔ Recebimento dos eventos pelo Laravel Echo

Essa abordagem reduziu a complexidade durante o desenvolvimento e garantiu que toda a infraestrutura de comunicação estivesse funcionando antes da implementação da interface definitiva.

---

# 🚀 API

| Método | Endpoint | Descrição |
|---------|----------|-----------|
| POST | `/api/v1/senhas` | Gera uma nova senha |
| GET | `/api/v1/senhas` | Lista as senhas |
| PATCH | `/api/v1/senhas/{senha}/chamar` | Chama uma senha |

---

# 🚀 Executando o projeto

Clone o repositório

```bash
git clone https://github.com/Boris-Zaidan/Painel-de-senhas.git

cd Painel-de-senhas
```

Instale as dependências

```bash
composer install

npm install
```

Configure o ambiente

```bash
cp .env.example .env

php artisan key:generate

php artisan migrate
```

Execute a aplicação

```bash
php artisan serve
```

Em outro terminal execute o Worker

```bash
php artisan queue:listen
```

Execute o servidor WebSocket

```bash
php artisan reverb:start
```

Execute o Vite

```bash
npm run dev
```

---

# 💡 Decisões Técnicas

Durante o desenvolvimento foram adotadas algumas decisões para tornar a aplicação mais organizada e escalável.

- Utilização de Services para concentrar toda a regra de negócio.
- Controllers responsáveis apenas por receber e responder requisições.
- Uso de Events para desacoplar ações da lógica principal.
- Processamento assíncrono utilizando Queues.
- Redis utilizado como driver das filas.
- Comunicação em tempo real através do Laravel Reverb.
- Separação clara entre regras de domínio e infraestrutura.

---

# 📌 Roadmap

## Backend

- [x] Geração de senhas
- [x] Listagem de senhas
- [x] Chamada de senhas
- [x] Comunicação em tempo real
- [ ] Histórico de chamadas
- [ ] Relatórios

## Segurança

- [ ] Autenticação
- [ ] Controle de permissões
- [ ] Níveis de acesso

## Frontend

- [ ] Migração para Vue 3
- [ ] Pinia
- [ ] Dashboard em tempo real

## Qualidade

- [ ] Testes Unitários
- [ ] Testes de Feature
- [ ] Docker
- [ ] CI/CD com GitHub Actions

---

# 👨‍💻 Autor

**Boris Zaidan**


---

GitHub:
https://github.com/Boris-Zaidan
