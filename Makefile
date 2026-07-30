# Default envs
ENV_FILES = env/.env

include $(wildcard $(ENV_FILES))

APP_ENV?=development
APP_IP_ADDRESS?=0.0.0.0
APP_IP_PORT?=8000
APP_PROJECT_NAME?=project

# Service

test:
	echo $(APP_NAME)


pre-commit-run:
	pre-commit run --all-files

# Docker

dc-start-app:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/app.yml --env-file ./env/.env build --progress=plain
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/app.yml --env-file ./env/.env up --force-recreate $(ARGS)

dc-stop-app:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/app.yml --env-file ./env/.env down

dc-start-services:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/services.yml --env-file ./env/.env up --build --force-recreate $(ARGS)

dc-stop-services:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/services.yml --env-file ./env/.env down

dc-start-dev-services:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/services.yml -f ./docker/compose/services-local.yml --env-file ./env/.env up --build --force-recreate $(ARGS)

dc-stop-dev-services:
	docker compose -p $(APP_PROJECT_NAME) -f ./docker/compose/services.yml -f ./docker/compose/services-local.yml --env-file ./env/.env down

# Images
img-build:
	docker buildx build --target build -t $(APP_NAME):$(APP_VERSION) --progress=plain -f docker/images/py/Dockerfile .

img-push:
	docker image push $(APP_NAME):$(APP_VERSION)

img-build-base:
	docker buildx build --target base -t harbor.dev.iitrust.ru/trust-services/images/python:latest -f docker/images/py/Dockerfile .

img-push-base:
	docker image push harbor.dev.iitrust.ru/trust-services/images/python:latest

