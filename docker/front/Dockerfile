FROM node:18.16.1-alpine

WORKDIR /var/www/src

ENV TZ = 'Asia/Tokyo'
ENV LANG = 'C.UTF-8'

# update apk, install bash / git / vim
RUN apk update \
    && apk add \
    bash \
    git \
    vim
