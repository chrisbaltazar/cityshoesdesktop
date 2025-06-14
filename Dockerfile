FROM bitnami/php-fpm:8.3.14

USER root

RUN apt-get update && apt-get install -y build-essential curl bash && rm -rf /var/lib/apt/lists/*

# Install curl & bash if missing (Bitnami usually has them)
RUN install_packages curl bash

# Install nvm & Node 22
ENV NVM_DIR=/root/.nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash && \
    . "$NVM_DIR/nvm.sh" && \
    nvm install 22 && \
    nvm use 22 && \
    nvm alias default 22

# Make nvm available for future shells
ENV NODE_VERSION=22
ENV PATH=$NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

WORKDIR /cityshoes
