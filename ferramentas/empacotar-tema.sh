#!/usr/bin/env bash
# Gera dist/bambu-caderno.zip, pronto para enviar em Aparência → Temas → Adicionar novo → Enviar tema.
set -euo pipefail
cd "$(dirname "$0")/.."

for f in $(find wordpress/bambu-caderno -name '*.php'); do php -l "$f" > /dev/null; done
python3 -c "import json; json.load(open('wordpress/bambu-caderno/theme.json'))"

mkdir -p dist
rm -f dist/bambu-caderno.zip
(cd wordpress && zip -rq ../dist/bambu-caderno.zip bambu-caderno -x '*.DS_Store')
echo "Tema empacotado em dist/bambu-caderno.zip ($(du -h dist/bambu-caderno.zip | cut -f1))"
