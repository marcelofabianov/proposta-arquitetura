#!/bin/bash

# -------------------------------------------------------------------------------------------------- #
#  docker
# -------------------------------------------------------------------------------------------------- #
alias app.dc="docker compose"
alias app.up="app.dc up -d"
alias app.down="app.dc down"
alias app.restart="app.dc restart"
alias app.stop="app.dc stop"
alias app.start="app.dc start"
alias app.logs="app.dc logs -f"
alias app.exec="app.dc exec -it app"
alias app.zsh="app.exec zsh"
# -------------------------------------------------------------------------------------------------- #
# php
# -------------------------------------------------------------------------------------------------- #
alias app.php="app.exec php"
alias app.composer="app.exec composer"
alias app.server="app.php -S 0.0.0.0:8000 public/index.php"
alias app.migrate="app.composer run migration:up"
alias app.migrate:down="app.composer run migration:down"
# -------------------------------------------------------------------------------------------------- #
# lint
# -------------------------------------------------------------------------------------------------- #
alias app.check="app.php ./vendor/bin/psalm --show-info=true"
alias app.lint="app.php ./vendor/bin/pint"
# -------------------------------------------------------------------------------------------------- #
# test
# -------------------------------------------------------------------------------------------------- #
alias app.test="app.php ./vendor/bin/pest"
# -------------------------------------------------------------------------------------------------- #
