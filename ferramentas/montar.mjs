// Copia o topo e o rodapé de partes/ para dentro de cada página .html da raiz.
//
// Uso: node ferramentas/montar.mjs
//
// Cada página marca onde entra cada parte com um par de comentários:
//   <!-- parte:topo --> ... <!-- /parte:topo -->
// Tudo entre os marcadores é substituído; o resto da página não é tocado.
// Assim as páginas continuam sendo HTML puro, que abre direto no navegador.
//
// Duas trocas por página:
//   {{inicio}}  vira "" na página inicial e "index.html" nas outras,
//               para que "#contato" role a página inicial sem recarregar.
//   data-nav="x" ganha aria-current="page" quando <body data-pagina="x">.

import { readFileSync, writeFileSync, readdirSync } from "node:fs";
import { join, dirname } from "node:path";
import { fileURLToPath } from "node:url";

const raiz = join(dirname(fileURLToPath(import.meta.url)), "..");
const partes = Object.fromEntries(
  readdirSync(join(raiz, "partes"))
    .filter((f) => f.endsWith(".html"))
    .map((f) => [f.replace(/\.html$/, ""), readFileSync(join(raiz, "partes", f), "utf8").trim()])
);

const paginas = readdirSync(raiz).filter((f) => f.endsWith(".html"));
let alteradas = 0;

for (const arquivo of paginas) {
  const caminho = join(raiz, arquivo);
  const original = readFileSync(caminho, "utf8");
  const pagina = (original.match(/<body[^>]*data-pagina="([^"]+)"/) || [])[1] || "";
  const inicio = arquivo === "index.html" ? "" : "index.html";

  const montada = original.replace(
    /<!-- parte:([\w-]+) -->[\s\S]*?<!-- \/parte:\1 -->/g,
    (trecho, nome) => {
      if (!partes[nome]) throw new Error(`${arquivo}: parte "${nome}" não existe em partes/`);
      const conteudo = partes[nome]
        .replaceAll("{{inicio}}", inicio)
        .replace(/data-nav="([^"]+)"/g, (m, nav) => (nav === pagina ? `${m} aria-current="page"` : m));
      return `<!-- parte:${nome} -->\n${conteudo}\n<!-- /parte:${nome} -->`;
    }
  );

  if (montada !== original) {
    writeFileSync(caminho, montada);
    alteradas++;
  }
}

console.log(`${paginas.length} páginas conferidas, ${alteradas} atualizadas.`);
