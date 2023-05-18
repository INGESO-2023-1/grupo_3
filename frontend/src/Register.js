// src/Register.js
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';


const Register = ({ onRegister }) => {
  const navigate = useNavigate();
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    const success = await onRegister(username, password);
    if (success) {
        navigate('/chat');

    } else {
      alert('Error en el registro. Inténtalo de nuevo.');
    }
  };

  return (
    <div>
      <h2>Registro</h2>
      <form onSubmit={handleSubmit}>
        <label>
          Nombre de usuario:
          <input
            type="text"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            required
          />
        </label>
        <br />
        <label>
          Contraseña:
          <input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </label>
        <br />
        <button type="submit">Registrarse</button>
      </form>
    </div>
  );
};

export default Register;
