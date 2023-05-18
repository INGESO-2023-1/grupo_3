// backend/server.js
const express = require('express');
const http = require('http');
const socketIO = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIO(server);

io.on('connection', (socket) => {
  console.log('Usuario conectado');
  
  socket.on('message', (message) => {
    console.log(`Mensaje recibido: ${message}`);
    io.emit('message', message);
  });

  socket.on('disconnect', () => {
    console.log('Usuario desconectado');
  });
});

server.listen(3001, () => {
  console.log('Servidor corriendo en el puerto 3001');
});
