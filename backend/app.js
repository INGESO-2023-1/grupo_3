const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const db = require('./database');
const cors = require('cors');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

const users = new Map();
app.use(cors());
io.on('connection', (socket) => {
  console.log('Usuario conectado');

  socket.on('register', (username, password) => {
    const query = 'INSERT INTO users (username, password) VALUES (?, ?)';
    db.run(query, [username, password], function (err) {
      if (err) {
        console.error('Error al registrar al usuario', err);
        socket.emit('registerResult', { success: false });
      } else {
        console.log(`Usuario registrado con ID ${this.lastID}`);
        socket.emit('registerResult', { success: true });
      }
    });
  });

  socket.on('login', (username, password) => {
    const query = 'SELECT * FROM users WHERE username = ? AND password = ?';
    db.get(query, [username, password], (err, row) => {
      if (err) {
        console.error('Error al iniciar sesión', err);
        socket.emit('loginResult', { success: false });
      } else if (row) {
        users.set(socket.id, { username, status: 'online' });
        io.emit('users', Array.from(users.entries()));
        socket.emit('loginResult', { success: true });
      } else {
        socket.emit('loginResult', { success: false });
      }
    });
  });

  socket.on('disconnect', () => {
    users.delete(socket.id);
    io.emit('users', Array.from(users.entries()));
    console.log('Usuario desconectado');
  });
});

const PORT = process.env.PORT || 3002;

server.listen(PORT, () => {
  console.log(`Servidor escuchando en el puerto ${PORT}`);
});
