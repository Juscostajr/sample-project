FROM node:lts-alpine
LABEL author="Juscelino Fernandes da Costa Junior"
RUN npm install -g http-server
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
EXPOSE 80
CMD http-server dist -p 80
