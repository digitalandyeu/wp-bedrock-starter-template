#bin/bash
source .utils/env.sh

LOGIN_URL="$WP_HOME/wp/wp-login.php"

echo "PHP version: $(php -v | head -n 1 | cut -d " " -f 2)"
echo "$LINE"
wp dotenv list | grep -E "WP_|DB_" | grep -v "WP_SITEURL"
echo "$LINE"
echo "ADMIN_LOGIN: $LOGIN_URL"
echo "ADMIN_USER_PASSWORD: root / root"
echo "️remove the root user before going to www ⚠️ ⚠️ ⚠️"

open "$WP_HOME" -a "Safari"
open "$LOGIN_URL" -a "Safari"