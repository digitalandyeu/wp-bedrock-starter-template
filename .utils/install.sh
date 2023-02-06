#bin/bash
[ -f .env ] || ln -s .env.example "$PWD"/.env
source .utils/env.sh

# If all is installed exit
wp core is-installed || pill && exit 0

# First install
. .utils/install-default.sh