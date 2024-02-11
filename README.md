# rede-social-laravel

Acesso ao usuário administrador do projeto:
email: admin@admin.com.br
senha: 123456

Use o comando `php artisan migrate --seed` para criar o banco de dados com 5 usuários aleatórios mais o usuário admin e 2 posts para cada usuário.


Metas: 
- Acrescentar o comments factory ligado a um usuario e um post
- Dashboard admin mais bonito
- Mudar layout todo do site
- Acrescentar livewire para o site rederizar só oque precisa. exemplo: atualizar a página toda só para mostrar que foi adiciona um novo post
- Opção de fazer upload de fotos/vídeos junto com os textos do post e ter um preview
- Depois que tivermos várias fotos/vídeos em um post, acrecentar opção de galeria de fotos
- Acrescentar notificações de novos posts de usuario que a pessoa segue


No PostFormRequest a validação dos arquivos (media_path) não está funcionando, então comentei as validações de arquivos