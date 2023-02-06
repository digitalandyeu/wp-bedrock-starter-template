#bin/bash

wp db create
wp core install --url="$STG_URL" --skip-email --title="WP" --admin_user="root" --admin_password="root" --admin_email="spam@digitalandy.eu"

wp language core install cs_CZ uk en_GB
wp language plugin install --all cs_CZ uk en_GB
wp language theme install --all cs_CZ uk en_GB

wp theme activate theme
wp plugin activate --all

wp site switch-language cs_CZ
wp rewrite structure '/%category%/%postname%/'
wp option update timezone_string Europe/Prague
wp option update date_format 'F j, Y'
wp option update time_format 'H:i'
wp option update default_comment_status closed
wp option update default_ping_status closed
wp option update default_pingback_flag 0
wp option update show_comments_cookies_opt_in 0
wp option update link_manager_enabled 0
wp option update close_comments_for_old_posts 1
wp option update use_smilies 0
wp option update show_avatars 0
wp option update uploads_use_yearmonth_folders 0

wp jetpack module activate markdown
wp jetpack module activate verification-tools
wp jetpack module activate sitemaps
wp jetpack module activate copy-post

wp login install --activate