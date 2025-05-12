SHELL := bash
.SHELLFLAGS := -eu -o pipefail -c
.DEFAULT_GOAL := help

OS := $(shell uname)

include .env
export

# docker run as current user in current directory
run-docker = docker-compose run -u `id -u`:`id -g` --rm

# COLORS
RED    := $(shell tput -Txterm setaf 1)
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
RESET  := $(shell tput -Txterm sgr0)

# CS-FIX
.PHONY: cs-fix
cs-fix: ## CS-Fixer tools
	bin/php-cs-fixer fix --diff --allow-risky=yes --config=.php-cs-fixer.dist.php

# PHPSTAN
.PHONY: phpstan
phpstan: ## PHP-Stan
	php -d memory_limit=-1 bin/phpstan analyse src -c phpstan.neon

# RECTOR
.PHONY: rector
rector: ## Rector
	php bin/rector process src
