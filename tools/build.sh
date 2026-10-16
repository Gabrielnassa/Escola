#!/usr/bin/env bash
# Gera a prévia em HTML e o .zip do tema para enviar ao WordPress.
set -euo pipefail
cd "$(dirname "$0")/.."

for f in $(find wordpress -name '*.php'); do php -l "$f" >/dev/null; done
php tools/render-preview.php preview/index.html

mkdir -p dist
rm -f dist/bambu-musica-e-arte.zip
(cd wordpress && zip -rq ../dist/bambu-musica-e-arte.zip bambu-musica-e-arte -x '*.DS_Store')
echo "Tema empacotado em dist/bambu-musica-e-arte.zip"
