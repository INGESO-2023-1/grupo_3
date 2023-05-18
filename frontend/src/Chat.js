// src/Chat.js
import React, { useState, useEffect } from 'react';

const Chat = ({ socket }) => {
  const [messages, setMessages] = useState([]);
  const [input, setInput] = useState('');

  useEffect(() => {
    socket.on('message', (message) => {
      setMessages((messages) => [...messages, message]);
    });
  }, [socket]);

  const handleSubmit = (e) => {
    e.preventDefault();
    socket.emit('message', input);
    setInput('');
  };

  return (
    <div>
      <h2>Chat</h2>
      <ul>
        {messages.map((message, i) => (
          <li key={i}>{message}</li>
        ))}
      </ul>
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          value={input}
          onChange={(e) => setInput(e.target.value)}
          required
        />
        <button type="submit">Enviar</button>
      </form>
    </div>
  );
};

export default Chat;
