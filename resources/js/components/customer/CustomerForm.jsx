import React, { useState } from 'react';
import { useDispatch } from 'react-redux';
import { addCustomer } from '../../Redux/actions';
import './CustomerForm.css';

const CustomerForm = () => {
  const [customer, setCustomer] = useState({ name: '', email: '' });
  const dispatch = useDispatch();

  const handleSubmit = (e) => {
    e.preventDefault();
    dispatch(addCustomer({ ...customer, id: Date.now() }));
    setCustomer({ name: '', email: '' });
  };

  return (
    <div className="customer-form">
      <h3>Ajouter un Client</h3>
      <form onSubmit={handleSubmit}>
        <label>Nom:</label>
        <input
          type="text"
          value={customer.name}
          onChange={(e) => setCustomer({ ...customer, name: e.target.value })}
        />
        <label>Email:</label>
        <input
          type="email"
          value={customer.email}
          onChange={(e) => setCustomer({ ...customer, email: e.target.value })}
        />
        <button type="submit">Ajouter Client</button>
      </form>
    </div>
  );
};

export default CustomerForm;
