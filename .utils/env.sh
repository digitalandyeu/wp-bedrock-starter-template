#bin/bash

source .env

DEV_URL="http://wordpress.devs"
STG_URL="https://wp.digitalandy.eu"

function pill()
{
  wp language core update
  wp language plugin update --all
  wp language theme update --all
  wp media regenerate --yes --only-missing --skip-delete
  wp cache flush
  wp transient delete --all
}

function InstallWpCLIDeps() {
  wp package install aaemnnosttv/wp-cli-login-command
  wp package install aaemnnosttv/wp-cli-dotenv-command
  wp login install --activate
}