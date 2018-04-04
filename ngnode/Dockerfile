FROM node:6

RUN mkdir -p /usr/src/app
COPY ./assets /usr/src/app

WORKDIR /usr/src/app
RUN npm install

CMD ["npm", "start"]