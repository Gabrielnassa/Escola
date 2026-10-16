# Bambu Música e Arte — novo site

Novo site da **Bambu Música e Arte**. A estrutura segue o layout institucional de escola do [Colégio Rosário](https://rosarionet.com.br/), com o conteúdo, os contatos e a identidade da Bambu.

| O quê | Onde |
|---|---|
| **Prévia completa em HTML** (abra no navegador para ver e apresentar) | `preview/index.html` |
| **Tema WordPress pronto para instalar** (.zip) | `dist/bambu-musica-e-arte.zip` |
| Código-fonte do tema | `wordpress/bambu-musica-e-arte/` |
| Scripts que geram a prévia e o .zip | `tools/` |

## Estrutura da página inicial

1. **Barra superior** (verde-escura): telefone, e-mail, endereço, redes sociais e o botão "Trabalhe conosco".
2. **Cabeçalho fixo**: logo, menu com submenu de cursos e o botão de destaque "Aula experimental".
3. **Banner rotativo** com 3 slides (troca sozinho, tem setas, bolinhas e aceita arrastar no celular).
4. **Acesso rápido** sobre o banner: aulas na escola, em domicílio, online e em grupo.
5. **Quem somos**: foto, texto, o símbolo do bambu e 3 destaques.
6. **Cursos**, no lugar das "etapas de formação": 9 cards.
7. **Valores**, faixa verde com o que o bambu ensina: flexibilidade, resiliência, crescimento constante e respeito ao tempo.
8. **Inclusão, musicoterapia e psicopedagogia.**
9. **Para escolas e profissionais**: consultoria e formação.
10. **Depoimentos.**
11. **Blog / novidades**: os 3 últimos posts.
12. **Faixa de chamada** para a aula experimental.
13. **Contato**: dados, formulário de agendamento e mapa do Google.
14. **Rodapé** em 4 colunas, mais o **botão flutuante do WhatsApp**.

O site funciona no computador, no tablet e no celular, onde o menu vira uma gaveta lateral.

## Como instalar no WordPress

1. Baixe `dist/bambu-musica-e-arte.zip`.
2. No painel do WordPress, vá em **Aparência → Temas → Adicionar novo → Enviar tema**, escolha o .zip e clique em **Instalar** e depois em **Ativar**.
3. Vá em **Configurações → Links permanentes** e clique em **Salvar** (isso ativa o endereço `/cursos/`).
4. Pronto: a página inicial já aparece completa, com o conteúdo padrão da Bambu.

> Dica: faça um backup do site atual antes de trocar o tema. Os posts e páginas que já existem (blog, Quem somos, Trabalhe conosco) continuam funcionando e passam a usar o novo visual.

### Personalizar textos, contatos e imagens

Vá em **Aparência → Personalizar → Bambu Música e Arte**. Lá você troca:

- **Contato e redes sociais**: telefones, WhatsApp, mensagem automática do WhatsApp, e-mail, endereço, horário, Instagram, Facebook e YouTube.
- **Banner rotativo**: título, texto, botão, link e imagem de cada um dos 3 slides. Deixe o título vazio para esconder um slide.
- **Quem somos**, **Inclusão e musicoterapia** e **Chamada para aula experimental**: textos, fotos e destaques.
- **Formulário e mapa**: e-mail que recebe as mensagens, shortcode de outro formulário (Contact Form 7, WPForms…) e se o mapa aparece.
- **Rodapé**: texto sobre a escola.

O **logo** se troca em **Personalizar → Identidade do site → Logo**. Enquanto nenhum logo for enviado, o tema usa um logo de bambu feito em SVG.

### Cursos e depoimentos

O tema adiciona dois menus no painel:

- **Cursos**: cada curso tem título, resumo (é o texto do card), ícone, etiqueta (ex.: "Individual") e ordem. Quando o primeiro curso é cadastrado, a lista padrão some e passam a aparecer só os cursos cadastrados. Cada curso também ganha uma página própria.
- **Depoimentos**: o título é o nome da pessoa, o texto vai no editor e há um campo para "Curso ou relação" (ex.: "Aluna de piano"). **A seção de depoimentos só aparece no site quando houver depoimentos cadastrados.**

A seção **Blog** mostra os 3 posts mais recentes e só aparece se houver posts publicados.

### Menu

Até que um menu seja criado, o tema mostra um menu padrão: Início, Quem somos, Cursos, Musicoterapia, Para escolas, Blog e Contato. Para usar o seu, vá em **Aparência → Menus**, crie o menu e marque **Menu principal**. Para os itens que rolam a página inicial, use links personalizados como `/#cursos`, `/#inclusao`, `/#escolas` e `/#contato`.

## Antes de publicar: confira

- **Fotos**: a prévia usa fotos de banco de imagens (Unsplash) só como exemplo. Troque pelas fotos reais da escola no Personalizar; as do Instagram funcionam bem. Se uma imagem não carregar, aparece um fundo verde no lugar.
- **Lista de instrumentos**: o site atual fala em "aulas de instrumento ou canto". Os cards de Piano, Violão, Canto e Bateria são uma sugestão; ajuste conforme os cursos oferecidos de verdade.
- **Depoimentos da prévia**: são textos ilustrativos, inspirados no depoimento que já existe no site atual. No WordPress eles não aparecem: cadastre depoimentos reais.
- **Posts da prévia**: também são exemplos. No WordPress aparecem os posts reais do blog.
- **Horário de atendimento**: está "Segunda a sábado · horários sob consulta". Coloque o horário correto.
- **Cores**: o tema usa uma paleta verde-bambu com destaque amarelo. Para ajustar à marca, altere as variáveis no começo de `assets/css/main.css` (`--green-600`, `--lime`, `--accent`…).

## Atualizar a prévia depois de mudar o tema

A prévia é gerada com os próprios arquivos do tema, então ela sempre fica igual ao WordPress. Precisa ter PHP e `zip` instalados:

```bash
./tools/build.sh
```

O script confere a sintaxe dos arquivos PHP, gera de novo `preview/index.html` e `dist/bambu-musica-e-arte.zip`.
