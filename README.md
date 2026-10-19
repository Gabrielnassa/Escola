# Bambu Escola de Música e Arte: site

Site novo da Bambu (bambumusicaearte.com.br). Direção visual "caderno de pauta": papel de partitura e casa de bairro, com as cores do logo. Existe em duas formas, com o mesmo visual e os mesmos textos:

| O quê | Onde |
|---|---|
| **Tema para WordPress** (.zip para enviar no painel) | `dist/bambu-caderno.zip` |
| Código do tema | `wordpress/bambu-caderno/` |
| Site em HTML puro (abre direto no navegador; é o que está no GitHub Pages) | `index.html` e as outras páginas na raiz |

## Tema para WordPress

Um tema de blocos: cada seção do site é feita de blocos comuns do WordPress, então dá para mudar textos, links, cores e fotos pelo editor visual, sem mexer em código.

### Instalar

1. **Faça um backup do site atual** (o plugin da hospedagem ou o UpdraftPlus resolvem).
2. Baixe `dist/bambu-caderno.zip` (no GitHub: abra o arquivo e clique em *Download raw file*).
3. No painel: **Aparência → Temas → Adicionar novo → Enviar tema**, escolha o .zip, **Instalar** e depois **Ativar**.
4. Precisa do WordPress 6.6 ou mais novo.

A página inicial já aparece completa assim que o tema é ativado. O site antigo continua salvo: se precisar, é só reativar o tema anterior.

### Editar

Tudo fica em **Aparência → Editor**:

- **Página inicial**: Editor → Modelos → *Página inicial*. Clique em qualquer texto para mudar. As seções (topo, cursos, depoimentos…) podem ser movidas, duplicadas ou apagadas.
- **Fotos**: clique numa foto provisória (os quadros "[FOTO: …]"), depois em **Substituir → Abrir biblioteca de mídia** e escolha a foto. As fotos do site antigo já estão na sua biblioteca de mídia. Na barra lateral, em *Estilos*, dá para escolher se a foto fica inclinada para um lado, para o outro ou reta.
- **Logo**: clique no logo do cabeçalho e escolha o arquivo do logo. Se o site antigo já tinha um logo definido, ele pode aparecer sozinho. Sem logo escolhido, o site mostra um logo provisório desenhado em SVG (no editor aparece um quadro vazio nesse lugar).
- **Cabeçalho, menu e rodapé**: Editor → Padrões → *Partes do modelo*. O menu se edita clicando nele.
- **Cores e fontes do site todo**: Editor → **Estilos**. A paleta tem as cores do logo; mudar uma cor ali muda o site inteiro.
- **Textos com destaque**: no editor de texto, o botão **Linha magenta** sublinha uma palavra com a linha do logo, e **[PREENCHER]** marca em amarelo o que ainda falta completar.

### Páginas Cursos, Quem somos e Trabalhe conosco

O tema traz o conteúdo pronto dessas páginas como padrões de blocos:

1. Abra a página (ou crie uma nova) no editor de blocos. Se ela foi feita com o Elementor, clique antes em *Voltar ao editor do WordPress*.
2. Apague o conteúdo antigo, clique em **+ → Padrões → Bambu: páginas** e escolha a página. Numa página nova, o WordPress já oferece esses padrões ao abrir.
3. Publique. O tema usa sozinho o modelo certo (sem título repetido e com as seções de largura total).

Para o menu e os links funcionarem sem ajuste, use os endereços `/cursos/`, `/quem-somos/` e `/trabalhe-conosco/`. A página de posts definida em **Configurações → Leitura** vira o blog, e a seção "Do blog" da página inicial mostra os 3 posts mais recentes de verdade.

### Formulários

- O formulário de contato (página inicial) e o de currículo (Trabalhe conosco) entram com o bloco **Shortcode**: `[bambu_contato]` e `[bambu_trabalhe]`.
- Cada mensagem fica guardada no painel, em **Mensagens do site**, mesmo se o e-mail falhar. Os currículos em PDF ficam na pasta de uploads, com nome difícil de adivinhar.
- O e-mail que recebe as mensagens se escolhe em **Configurações → Geral → E-mail dos formulários do site** (vazio = e-mail do administrador).
- Se os e-mails não chegarem, instale o plugin **WP Mail SMTP**: muitas hospedagens bloqueiam o envio direto.
- Prefere o Contact Form 7 ou o WPForms? Troque o shortcode no bloco pelo do plugin.

### SEO

O tema coloca o título "Bambu | Escola de Música e Arte no Ipiranga, São Paulo" e a descrição na página inicial, além dos dados da escola para o Google (endereço, telefones, redes). Se você usa Yoast, Rank Math ou parecido, título, descrição e Open Graph ficam com o plugin; os dados da escola continuam vindo do tema.

### Conferido

- Os 655 blocos dos templates e padrões foram validados com a biblioteca de blocos atual do WordPress: o editor abre tudo sem o aviso de "conteúdo inesperado".
- O tema foi testado num WordPress 6.6 rodando de verdade, com páginas e posts. Comparei com o site em HTML em 360, 768 e 1280 px, sem rolagem horizontal e sem erros de JavaScript. Testei o menu do celular, o envio dos dois formulários e a auditoria de acessibilidade (axe).
- Diferenças conhecidas em relação ao HTML puro:
  - O bloco Navegação não aceita o endereço e os telefones dentro do menu aberto do celular; o botão do WhatsApp aparece lá.
  - Os números dos cursos e os bilhetes em letra de mão são lidos pelo leitor de tela, porque os blocos não aceitam `aria-hidden`.

### Atualizar o .zip depois de mudar o tema

```bash
./ferramentas/empacotar-tema.sh
```

## Site em HTML puro

### Páginas

| Arquivo | O que é |
|---|---|
| `index.html` | Página inicial: hero, faixa de fatos, cursos como programa de recital, escola ou domicílio, inclusão, por que "Bambu", depoimentos, quem está por trás, blog, contato |
| `cursos.html` | Uma seção por curso: para quem é, como funciona, onde acontece, faixa etária, duração |
| `quem-somos.html` | Proposta, o nome, missão e visão, inclusão, equipe, foto da casa |
| `trabalhe-conosco.html` | Texto curto e formulário com upload de currículo em PDF |
| `blog.html` e `artigo-exemplo.html` | Listagem e modelo de leitura de um post (conteúdo de exemplo, marcado) |
| `404.html` | Página de erro |

### Onde mexer

- **Cores, fontes e medidas**: variáveis no começo de `assets/css/site.css`. A cor de cada curso também está lá (`--c-individuais`, `--c-grupo`…).
- **Topo e rodapé**: ficam em `partes/topo.html` e `partes/rodape.html`. Depois de editar, rode:

  ```bash
  node ferramentas/montar.mjs
  ```

  O script copia as partes para dentro de todas as páginas (entre os comentários `<!-- parte:… -->`) e marca o item do menu da página atual. As páginas continuam sendo HTML comum: o resto delas se edita direto.
- **Fotos**: veja `assets/fotos/LEIA-ME.md`. Cada lugar de foto tem a tag `<img>` pronta num comentário.
- **Formulários**: o atributo `data-endpoint` dos dois `<form>` recebe o endereço que vai receber as mensagens (Formspree, Getform, um script no servidor…). O de "Trabalhe conosco" precisa aceitar arquivo. Enquanto estiver vazio, o formulário funciona em modo de demonstração: valida, mostra a confirmação e avisa na tela que nada foi enviado.
- **WhatsApp**: todos os links usam `https://wa.me/5511940793838?text=…` com mensagem pronta. Cada curso tem a sua ("Olá! Quero saber mais sobre…").
- **Logo e cata-vento**: o cata-vento e o "BAMBU" do cabeçalho foram redesenhados em SVG a partir da descrição do logo, porque o arquivo original não chegou. Troque pelo vetor oficial em `partes/topo.html` (símbolo `#catavento`) e em `assets/img/catavento.svg` (que também é o favicon e o marcador das listas).

### Regras que o site segue

- Texto corrido sempre em azul-noite sobre o papel. As cores vivas só aparecem como fundo, forma e detalhe.
- Sobre fundo colorido (faixa azul, bloco verde de inclusão), o texto é azul-noite. Links em tons escuros.
- Os números grandes dos cursos levam a cor do curso com um contorno azul-noite de 1px. Pelo critério WCAG 1.4.3, uma borda estreita na letra conta como a própria letra, então eles passam em contraste mesmo no amarelo. O axe-core não enxerga o contorno e aponta esses quatro números; são decorativos (`aria-hidden`), e a ordem já está na lista.
- Só duas animações no site inteiro: a linha magenta que risca "tempo" no título e as hastes de bambu, que crescem uma vez. As duas somem com `prefers-reduced-motion`. O cata-vento do logo gira devagar no hover.
- Caveat aparece no máximo 3 ou 4 vezes por página.
- Nada de dado inventado. Tudo o que falta está marcado na própria página com `[PREENCHER: …]` ou `[FOTO: …]`, em destaque amarelo.

### Conferido

- Larguras de 360, 768, 1024, 1280 e 1600 px, sem rolagem horizontal.
- Auditoria axe-core (WCAG 2.1 A/AA e boas práticas) em todas as páginas, em 360 e 1280 px: só sobram os quatro números decorativos explicados acima.
- Teclado: link "Pular para o conteúdo", foco visível azul-noite de 2px, menu do celular com Esc e foco preso dentro dele.
- Formulários: mensagens de erro ligadas aos campos, confirmação com o nome da pessoa.

### SEO local

- `<title>` e meta description por página; título da inicial: "Bambu | Escola de Música e Arte no Ipiranga, São Paulo".
- JSON-LD `MusicSchool` + `LocalBusiness` na inicial, com endereço, telefones, e-mail e redes.
- Open Graph em todas as páginas (a imagem `assets/fotos/og-fachada.jpg` ainda precisa ser criada a partir da foto real).
- `sitemap.xml`, `robots.txt` e um único `h1` por página.

### Pendências

Estão todas visíveis nas páginas. Resumo:

**Conteúdo**
- Os 4 depoimentos (Luciana Amorim, Leonidas, Luciana mãe da Júlia, Simone mãe do Pietro), com o contexto de cada um.
- Nomes dos fundadores e história da escola.
- Horário de atendimento, CNPJ, bairros atendidos a domicílio.
- Cursos: instrumentos oferecidos, faixas etárias, duração e frequência, formato e local da musicoterapia, da consultoria e dos cursos para profissionais.
- Equipe: nome, instrumento e formação de cada professor.
- Blog: posts reais (os atuais são exemplos marcados).
- Endereço que recebe os formulários (`data-endpoint`).

**Arquivos**
- Logo oficial (vetor) e `assets/img/logo.png` para o JSON-LD.
- Fotos listadas em `assets/fotos/LEIA-ME.md` e a imagem de compartilhamento `og-fachada.jpg`.
