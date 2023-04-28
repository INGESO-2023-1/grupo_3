import React, { useState } from 'react';
import axios from 'axios';

const Register = () => {
    const [phoneNumber, setPhoneNumber] = useState('');
    const [name, setName] = useState('');
    const [services, setServices] = useState('');

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const newUser = {
                phoneNumber,
                profile: {
                    name,
                    services: services.split(','),
                },
            };

            const response = await axios.post('http://localhost:3001/api/users/register', newUser);
            console.log(response.data);
        } catch (err) {
            console.error(err);
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>
                Phone Number:
                <input
                    type="text"
                    value={phoneNumber}
                    onChange={(e) => setPhoneNumber(e.target.value)}
                />
            </label>
            <label>
                Name:
                <input type="text" value={name} onChange={(e) => setName(e.target.value)} />
            </label>
            <label>
                Services (comma-separated):
                <input
                    type="text"
                    value={services}
                    onChange={(e) => setServices(e.target.value)}
                />
            </label>
            <button type="submit">Register</button>
        </form>
    );
};

export default Register;
