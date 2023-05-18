import React, { useState } from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import io from 'socket.io-client';

import Login from './Login';
import Register from './Register';
import Chat from './Chat';

const socket = io('http://localhost:3001');

const App = () => {
  const [user, setUser] = useState(null);

  const handleLogin = async (username, password) => {
    // Lógica de inicio de sesión, verifica si el usuario está registrado.
    setUser({ username });
    return true; // Devuelve true si el inicio de sesión fue exitoso.
  };

  const handleRegister = async (username, password) => {
    // Lógica de registro, guarda al usuario en la base de datos.
    setUser({ username });
    return true; // Devuelve true si el registro fue exitoso.
  };

  return (
    <Router>
      <Routes>
        <Route exact path="/" element={<Login onLogin={handleLogin} />} />
        <Route path="/register" element={<Register onRegister={handleRegister} />} />
        <Route path="/chat" element={<Chat socket={socket} />} />
      </Routes>
    </Router>
  );
};

export default App;
