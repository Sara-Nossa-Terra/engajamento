FROM composer:1.9

WORKDIR /opt/prontuario

# Copiando os diretórios para dentro do container
COPY . .
COPY .env.example .env

# Instalação
RUN apk update && apk add --no-cache make bash

RUN make install

RUN php artisan migrate --seed

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
