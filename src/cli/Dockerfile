FROM rust:1.46-alpine

WORKDIR /usr/src/cli
COPY . .

RUN cargo install --path .

CMD ["scorpion"]
