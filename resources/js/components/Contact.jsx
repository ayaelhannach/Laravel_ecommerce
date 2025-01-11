import React, { useState } from 'react';

const Contact = () => {
    const [form, setForm] = useState({
        name: '',
        email: '',
        message: ''
    });

    const handleChange = (e) => {
        setForm({
            ...form,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(form);
    };

    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                name="name"
                placeholder="Votre nom"
                value={form.name}
                onChange={handleChange}
            />
            <input
                type="email"
                name="email"
                placeholder="Votre email"
                value={form.email}
                onChange={handleChange}
            />
            <textarea
                name="message"
                placeholder="Votre message"
                value={form.message}
                onChange={handleChange}
            />
            <button type="submit">Envoyer</button>
        </form>
    );
};

export default Contact;
