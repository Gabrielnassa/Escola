# Bambu Escola de Música e Arte: site

Site novo da Bambu (bambumusicaearte.com.br), feito do zero em **HTML, CSS e JS puros**, sem framework e sem biblioteca de componentes. Direção visual "caderno de pauta": papel de partitura e casa de bairro, com as cores do logo.

Para ver, abra `index.html` no navegador. Para publicar, basta subir a pasta inteira (menos `partes/` e `ferramentas/`, que são só de manutenção) em qualquer hospedagem de arquivos estáticos.

## Páginas

| Arquivo | O que é |
|---|---|
| `index.html` | Página inicial: hero, faixa de fatos, cursos como programa de recital, escola ou domicílio, inclusão, por que "Bambu", depoimentos, quem está por trás, blog, contato |
| `cursos.html` | Uma seção por curso: para quem é, como funciona, onde acontece, faixa etária, duração |
| `quem-somos.html` | Proposta, o nome, missão e visão, inclusão, equipe, foto da casa |
| `trabalhe-conosco.html` | Texto curto e formulário com upload de currículo em PDF |
| `blog.html` e `artigo-exemplo.html` | Listagem e modelo de leitura de um post (conteúdo de exemplo, marcado) |
| `404.html` | Página de erro |

## Onde mexer

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

## Regras que o site segue

- Texto corrido sempre em azul-noite sobre o papel. As cores vivas só aparecem como fundo, forma e detalhe.
- Sobre fundo colorido (faixa azul, bloco verde de inclusão), o texto é azul-noite. Links em tons escuros.
- Os números grandes dos cursos levam a cor do curso com um contorno azul-noite de 1px. Pelo critério WCAG 1.4.3, uma borda estreita na letra conta como a própria letra, então eles passam em contraste mesmo no amarelo. O axe-core não enxerga o contorno e aponta esses quatro números; são decorativos (`aria-hidden`), e a ordem já está na lista.
- Só duas animações no site inteiro: a linha magenta que risca "tempo" no título e as hastes de bambu, que crescem uma vez. As duas somem com `prefers-reduced-motion`. O cata-vento do logo gira devagar no hover.
- Caveat aparece no máximo 3 ou 4 vezes por página.
- Nada de dado inventado. Tudo o que falta está marcado na própria página com `[PREENCHER: …]` ou `[FOTO: …]`, em destaque amarelo.

## Conferido

- Larguras de 360, 768, 1024, 1280 e 1600 px, sem rolagem horizontal.
- Auditoria axe-core (WCAG 2.1 A/AA e boas práticas) em todas as páginas, em 360 e 1280 px: só sobram os quatro números decorativos explicados acima.
- Teclado: link "Pular para o conteúdo", foco visível azul-noite de 2px, menu do celular com Esc e foco preso dentro dele.
- Formulários: mensagens de erro ligadas aos campos, confirmação com o nome da pessoa.

## SEO local

- `<title>` e meta description por página; título da inicial: "Bambu | Escola de Música e Arte no Ipiranga, São Paulo".
- JSON-LD `MusicSchool` + `LocalBusiness` na inicial, com endereço, telefones, e-mail e redes.
- Open Graph em todas as páginas (a imagem `assets/fotos/og-fachada.jpg` ainda precisa ser criada a partir da foto real).
- `sitemap.xml`, `robots.txt` e um único `h1` por página.

## Pendências

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
