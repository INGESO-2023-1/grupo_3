const express = require('express');
const http = require('http');
const { Server } = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

const users = new Map();

io.on('connection', (socket) => {
  console.log('Usuario conectado');

  socket.on('login', (username) => {
    users.set(socket.id, { username, status: 'online' });
    io.emit('users', Array.from(users.entries()));
  });

  socket.on('disconnect', () => {
    users.delete(socket.id);
    io.emit('users', Array.from(users.entries()));
    console.log('Usuario desconectado');
  });
});

const PORT = process.env.PORT || 3001;

server.listen(PORT, () => {
  console.log(`Servidor escuchando en el puerto ${PORT}`);
});
