🌍 Laravel Maps Integration
Uma aplicação desenvolvida com Laravel que conecta sistemas web modernos a uma API de mapas interativa, trazendo visualização dinâmica, cadastro de pontos e manipulação de dados diretamente no mapa.

✨ O que este projeto faz?
✔️ Integra Laravel com mapas interativos
✔️ Permite cadastrar, editar e excluir registros associados ao mapa
✔️ Visualização em tempo real de dados geográficos
✔️ Interface organizada e responsiva com Bootstrap 5
✔️ Uso de ícones com Font Awesome para melhor usabilidade

🛠️ Tecnologias Utilizadas
⚡ Laravel 10+ → Framework PHP robusto e moderno
🗺️ Leaflet.js / OpenStreetMap → Exibição e manipulação dos mapas
🎨 Bootstrap 5 → Layout responsivo e estilizado
🖼️ Font Awesome → Ícones intuitivos
🚀 Como rodar o projeto
# 1️⃣ Clonar o repositório
cd seu-projeto

# 2️⃣ Instalar as dependências
composer install
npm install && npm run dev

# 3️⃣ Configurar o ambiente
cp .env.example .env
php artisan key:generate

# 4️⃣ Rodar as migrações
php artisan migrate

# 5️⃣ Iniciar o servidor
php artisan serve
